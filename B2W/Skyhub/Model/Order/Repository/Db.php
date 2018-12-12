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

namespace B2W\Skyhub\Model\Order\Repository;

use B2W\Skyhub\Model\Order\Collection;
use B2W\Skyhub\Model\Order\Entity;

/**
 * Class Db
 * @package B2W\Skyhub\Model\Order\Repository
 */
class Db implements \B2W\Skyhub\Contracts\Data\Repository
{
    /**
     * @return \B2W\Skyhub\Contracts\Data\Collection|Collection
     */
    public static function all()
    {
        $defaultFilter = array(
            'post_status'   => array('wc-cancelled'),
            'post_type'     => Entity::POST_TYPE
        );

        $posts = get_posts($defaultFilter);

        $collection = new Collection();

        foreach ($posts as $post) {
            $order = self::one($post);
            $collection->addItem($order);
        }

        return $collection;
    }

    /**
     * @param $id
     * @return Entity
     */
    public static function one($id)
    {
        if ($id instanceof \WP_Post) {
            $post = $id;
        } else {
            $post = get_post($id);
        }

        $order = new Entity();
        $order->setId($post->ID);

        return $order;
    }
}