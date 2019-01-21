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

use B2W\SkyHub\Contracts\Sales\Order\Address\Entity;
use B2W\SkyHub\Model\TransformerAbstract;

class AddressIndex extends TransformerAbstract
{
    protected $_fields = array(
        'street',
        'number',
        'neighborhood',
        'city',
        'state',
        'postcode',
        'country',
        'email',
        'phone',
        'secondary_phone'
    );

    static public function convert(Entity $address)
    {
        /** @var  $instance */
        $instance = static::_instantiate();
        return $instance->_convert($address);
    }

    protected function _convert(Entity $address)
    {
        $result = array();
        $result[] = $address->getAdditionalData('name');
        $result[] = $address->getAdditionalData('email');

        foreach ($this->_fields as $field) {
            $method = \App::helper('app')->getGetterMethodName($address, $field);
            if (!$method) {
                continue;
            }

            $result[] = $address->$method();
        }

        return array(
            'meta_input'   => array(
                '_' . $address->getType() . '_address_index' => implode(' ', $result)
            )
        );
    }
}
