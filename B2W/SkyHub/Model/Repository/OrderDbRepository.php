<?php
/**
 * BSeller - B2W Companhia Digital
 *
 * DISCLAIMER
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @copyright     Copyright (c) 2017 B2W Companhia Digital. (http://www.bseller.com.br/)
 * Access https://ajuda.skyhub.com.br/hc/pt-br/requests/new for questions and other requests.
 */

namespace B2W\SkyHub\Model\Repository;

use B2W\SkyHub\Contract\Entity\OrderEntityInterface;
use B2W\SkyHub\Contract\Repository\OrderDbRepositoryInterface;
use B2W\SkyHub\Model\Repository\Order\ItemDbRepository;
use B2W\SkyHub\Model\Resource\Collection;
use B2W\SkyHub\Model\Resource\Select;
use B2W\SkyHub\Model\Transformer\Handler\Post;
use B2W\SkyHub\Model\Transformer\Order\EntityToDb;
use B2W\SkyHub\Model\Validation\OrderEntityValidator;
use B2W\SkyHub\Exception\Exception;

/**
 * Class OrderDbRepository
 * @package B2W\SkyHub\Model\Repository
 */
class OrderDbRepository implements OrderDbRepositoryInterface
{
    const INSTOCK = 'instock';
    const OUTOFSTOCK = 'outofstock';

    /**
     * @param array $filters
     * @return \B2W\SkyHub\Contract\Resource\Collection|Collection
     * @throws \Exception
     */
    public function find($filters)
    {
        $defaultFilter = array(
            'post_type' => OrderEntityInterface::POST_TYPE
        );

        foreach ($filters as $k => $v) {
            $defaultFilter[$k] = $v;
        }

        $posts = get_posts($defaultFilter);

        $collection = new Collection();

        foreach ($posts as $post) {
            $order = $this->one($post);
            $collection->addItem($order);
        }

        return $collection;
    }

    /**
     * @param $post
     * @return \B2W\SkyHub\Model\Entity\OrderEntity|mixed|null
     * @throws \Exception
     */
    public function one($post)
    {
        if (!$post instanceof \WP_Post) {
            $post = get_post($post);
        }

        $order = new \B2W\SkyHub\Model\Entity\OrderEntity();

        if ($post->post_type != OrderEntityInterface::POST_TYPE) {
            return $order;
        }

        $transformer = new \B2W\SkyHub\Model\Transformer\Order\DbToEntity();
        $transformer->setPost($post);
        $order = $transformer->convert();

        return $order;
    }

    /**
     * @param $code
     * @return \B2W\SkyHub\Model\Entity\OrderEntity|bool|mixed|null
     * @throws \Exception
     */
    public function code($code)
    {
        global $wpdb;

        //check if exists order with same ID
        $select = new Select();
        $select->from('postmeta');
        $select->where("meta_key = '_order_key'");
        $select->where("meta_value = '$code'");

        foreach ($wpdb->get_results($select) as $result) {
            return $this->one($result->post_id);
        }

        return false;
    }

    /**
     * @param OrderEntityInterface $order
     * @return $this|mixed
     * @throws \B2W\SkyHub\Exception\Data\TransformerNotFound
     * @throws \Exception
     */
    public function save(OrderEntityInterface $order)
    {
        global $wpdb;

        $isNew = $order->getId() ? false : true;

        //VALIDATE
        new OrderEntityValidator($order);

        // begin transaction
        $wpdb->query('START TRANSACTION');

        $transformer = new EntityToDb();
        $transformer->setEntity($order);

        /** @var Post $post */
        $post = $transformer->convert();

        //result = orderId when theres npo error
        $orderId = wp_insert_post($post->result(), true);

        /** @var WP_Error $orderId */
        if (is_wp_error($orderId)) {
            throw new \B2W\SkyHub\Exception\Exception($orderId->get_error_message());
        }

        if ($isNew) {
            $order->setId($orderId);
        }

        //save itens if order is new
        if ($isNew) {
            try {
                $this->_saveItems($order);
            } catch (\Exception $e) {
                $wpdb->query('ROLLBACK');
                throw $e;
            }

            //set stock levels
            wc_reduce_stock_levels($order->getId());

            try {
                $this->_saveShipping($order);
            } catch (\Exception $e) {
                $wpdb->query('ROLLBACK');
                throw $e;
            }
        }

        add_action('woocommerce_after_register_post_type', Array($order, 'emailNewOrder'));
        do_action('woocommerce_after_register_post_type');
        $wpdb->query('COMMIT');

        return $this;
    }

    protected function validateStockItems(\B2W\SkyHub\Model\Entity\Order\ItemEntity $item)
    {
        $itemId = $item->getProduct()->getId();
        $stockStatus = get_metadata('post', $itemId, '_stock_status');
        $stockQtd = get_metadata('post', $itemId, '_stock');

        if (!$stockStatus) {
            throw new \B2W\SkyHub\Exception\Exception(__("Product {$item->getId()} out of stock"));
        }

        if ($stockStatus[0] == self::OUTOFSTOCK) {
            throw new \B2W\SkyHub\Exception\Exception(__("Product {$item->getId()} out of stock"));
        }

        if ($stockQtd[0]) {
            if ($stockQtd[0] < $item->getQty()) {
                throw new \B2W\SkyHub\Exception\Exception(__("Product {$item->getId()} out of stock"));
            }
        }
    }

    /**
     * @param OrderEntityInterface $order
     * @return $this
     * @throws \B2W\SkyHub\Exception\Data\RepositoryNotFound
     */
    protected function _saveItems(OrderEntityInterface $order)
    {
        /** @var \B2W\SkyHub\Model\Entity\Order\ItemEntity $item */
        foreach ($order->getItems() as $item) {
            $this->validateStockItems($item);

            $item->setOrderId($order->getId());
            $item->save();
        }

        return $this;
    }

    /**
     * @param OrderEntityInterface $order
     * @return $this
     * @throws \Exception
     */
    protected function _saveShipping(OrderEntityInterface $order)
    {
        global $wpdb;

        $post = new Post();
        $post->setTableName('woocommerce_order_items');
        $post->addData('order_item_name', $order->getShippingMethod());
        $post->addData('order_item_type', 'shipping');
        $post->addData('order_id', $order->getId());
        /** TODO MAPP SHIPPING */
        $post->addData('method_id', strtolower(str_replace(' ', '', $order->getShippingMethod())));
        $post->addData('instance_id', 1);
        $post->addData('cost', $order->getShippingCost());
        $post->addData('total_tax', 0);
        $post->addData('taxes', 0);

        $itemResult = $wpdb->insert(
            $wpdb->prefix . ItemDbRepository::TABLE_ITEM,
            $post->post()
        );

        if ($itemResult === false) {
            $error = $wpdb->last_error;
            throw new \B2W\SkyHub\Exception\Exception($error);
        }

        $orderItemId = $wpdb->insert_id;

        foreach ($post->meta() as $k => $v) {
            $itemResult = $wpdb->insert(
                $wpdb->prefix . ItemDbRepository::TABLE_ITEM_META,
                array(
                    'order_item_id' => $orderItemId,
                    'meta_key'      => $k,
                    'meta_value'    => $v
                )
            );

            if ($itemResult === false) {
                $error = $wpdb->last_error;
                throw new \B2W\SkyHub\Exception\Exception($error);
            }
        }

        return $this;
    }
}
