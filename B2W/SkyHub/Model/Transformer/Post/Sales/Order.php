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

namespace B2W\SkyHub\Model\Transformer\Post\Sales;

use B2W\SkyHub\Model\Sales\Order\Entity;
use B2W\SkyHub\Model\Sales\Order\Map;
use B2W\SkyHub\Model\Transformer\PostAbstract;

class Order extends PostAbstract
{
    protected function _init()
    {
        $map = new Map();

        foreach ($map->map() as $item) {
            $this->_addMap($item['local'], $item['skyhub']);
        }

        return $this;
    }

    /**
     * @param $post
     * @param Entity $entity
     * @return PostAbstract
     */
    protected function _afterConvert($post, $entity)
    {
        $wpStatus   = $entity->getAdditionalData('post_status');
        $status     = new \B2W\SkyHub\Model\Sales\Order\Status\Entity();

        \B2W\SkyHub\Model\Transformer\Sales\Order\Status::convert($status, $wpStatus);

        $entity->setStatus($status);

        return $this;
    }
}