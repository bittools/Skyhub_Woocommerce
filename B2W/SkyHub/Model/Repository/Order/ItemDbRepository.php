<?php
/**
 * BSeller - B2W Companhia Digital
 *
 * DISCLAIMER
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @copyright     Copyright (c) 2017 B2W Companhia Digital. (http://www.bseller.com.br/)
 * @author        Luiz Tucillo <luiz.tucillo@e-smart.com.br>
 */

namespace B2W\SkyHub\Model\Repository\Order;

use B2W\SkyHub\Contract\Entity\Order\ItemEntityInterface;
use B2W\SkyHub\Contract\Entity\OrderEntityInterface;
use B2W\SkyHub\Contract\Repository\Order\ItemRepositoryInterface;
use B2W\SkyHub\Model\Resource\Collection;
use B2W\SkyHub\Model\Resource\Select;
use B2W\SkyHub\Model\Transformer\Handler\Post;
use B2W\SkyHub\Model\Transformer\Order\Item\EntityToDb;

/**
 * Class ItemDbRepository
 * @package B2W\SkyHub\Model\Repository\Order
 */
class ItemDbRepository implements ItemRepositoryInterface
{
    const TABLE_ITEM      = 'woocommerce_order_items';
    const TABLE_ITEM_META = 'woocommerce_order_itemmeta';

    /**
     * @param \B2W\SkyHub\Contract\Entity\OrderEntityInterface|\WP_Post $order
     * @return Collection
     * @throws \B2W\SkyHub\Exception\Data\RepositoryNotFound
     */
    public function load($order)
    {
        return $this->_collection($order);
    }

    /**
     * @param $order
     * @return Collection
     * @throws \B2W\SkyHub\Exception\Data\RepositoryNotFound
     */
    public function shippingItem($order)
    {
        return $this->_collection($order, 'shipping');
    }

    /**
     * @param ItemEntityInterface $item
     * @return mixed|void
     * @throws \B2W\SkyHub\Exception\Data\TransformerNotFound
     * @throws \Exception
     */
    public function save(ItemEntityInterface $item)
    {
        global $wpdb;

        /** @var EntityToDb $transformer */
        $transformer = \App::transformer('order/item/entity_to_db');
        $transformer->setEntity($item);

        /** @var Post $postItem */
        $postItem = $transformer->convert();

        $itemResult = $wpdb->insert(
            $wpdb->prefix . self::TABLE_ITEM,
            $postItem->post()
        );

        if ($itemResult === false) {
            $error = $wpdb->last_error;
            throw new \B2W\SkyHub\Exception\Exception($error);
        }

        $orderItemId = $wpdb->insert_id;

        foreach ($postItem->meta() as $k => $v) {
            $itemResult = $wpdb->insert(
                $wpdb->prefix . self::TABLE_ITEM_META,
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
    }

    /**
     * @param $order
     * @param string $orderItemType
     * @return Collection
     * @throws \B2W\SkyHub\Exception\Data\RepositoryNotFound
     */
    protected function _collection($order, $orderItemType = 'line_item')
    {
        global $wpdb;

        $orderItemType = sanitize_text_field($orderItemType);

        $id = $order instanceof OrderEntityInterface
            ? $order->getId()
            : $order->ID;

        $select = new Select();
        $select->column('*');
        $select->from('woocommerce_order_items', 'main_table');
        $select->join(
            'woocommerce_order_itemmeta',
            "main_table.order_item_id = itemmeta.order_item_id",
            'itemmeta'
        );
        $select->where('main_table.order_id = ' . $id);
        $select->where("main_table.order_item_type = '$orderItemType'");

        $items = array();

        foreach ($wpdb->get_results($select) as $item) {

            $items[$item->order_item_id]['order_item_id']   = $item->order_item_id;
            $items[$item->order_item_id]['order_item_name'] = $item->order_item_name;
            $items[$item->order_item_id][$item->meta_key]   = $item->meta_value;
        }

        $collection = new Collection();

        foreach ($items as $item) {

            $qty    = isset($item['qty']) && $item['qty'] > 0 ? $item['qty'] : 1;
            $price = isset($item['_line_subtotal']) ? $item['_line_subtotal'] / $qty : 0;

            $obj    = new \B2W\SkyHub\Model\Entity\Order\ItemEntity();
            $obj->setId($item['order_item_id']);
            $obj->setName($item['order_item_name']);
            $obj->setQty($qty);
            $obj->setOriginalPrice($price);

            if (isset($item['_product_id']) && !empty($item['_product_id'])) {
                $obj->setProduct(\App::repository(\App::REPOSITORY_PRODUCT)->one($item['_product_id']));
            }

            $obj->setShippingCost(isset($item['cost']) ? $item['cost'] : null);
            $obj->setSpecialPrice($price);
            $obj->setOrderItemType($item['order_item_type']);

            $collection->addItem($obj);
        }

        return $collection;
    }
}
