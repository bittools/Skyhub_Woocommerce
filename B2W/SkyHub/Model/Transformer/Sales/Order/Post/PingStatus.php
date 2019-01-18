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

namespace B2W\SkyHub\Model\Transformer\Sales\Order\Post;

use B2W\SkyHub\Contracts\Sales\Order\Entity;
use B2W\SkyHub\Model\TransformerAbstract;

class PingStatus extends TransformerAbstract
{
    static public function convert(Entity $order)
    {
        /** @var  $instance */
        $instance = static::_instantiate();
        return $instance->_convert($order);
    }

    protected function _convert(Entity $order)
    {
        return array('ping_status' => 'closed');
    }
}
