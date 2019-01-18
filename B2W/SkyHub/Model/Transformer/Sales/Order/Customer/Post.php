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

namespace B2W\SkyHub\Model\Transformer\Sales\Order\Customer;

use B2W\SkyHub\Helper\App;
use B2W\SkyHub\Model\Sales\Order\Customer\Entity;
use B2W\SkyHub\Model\Sales\Order\Customer\Map;
use B2W\SkyHub\Model\TransformerAbstract;

class Post extends TransformerAbstract
{
    static public function convert(Entity $address)
    {
        /** @var  $instance */
        $instance = static::_instantiate();
        return $instance->_convert($address);
    }

    protected function _convert(Entity $address)
    {
        $return = array();
        $map    = new Map();
        /** @var App $helper */
        $helper = \App::helper('app');

        foreach ($map->map() as $attr) {

            if (empty($attr['local'])) {
                continue;
            }

            if (is_array($attr['local'])) {
                continue;
            }

            $method = $helper->getGetterMethodName($address, $attr['skyhub']);
            $return['meta_input'][$attr['local']] = $address->$method();
        }

        return $return;
    }
}
