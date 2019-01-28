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

namespace B2W\SkyHub\Model\Transformer\Sales\Order\Address;

use B2W\SkyHub\Model\Map\Attribute;
use B2W\SkyHub\Model\Map\Sales\Order\Address\Map;
use B2W\SkyHub\Model\Transformer\EntityToDbAbstract;

class EntityToDb extends EntityToDbAbstract
{
    protected function _getMapInstance()
    {
        return new Map();
    }

    protected function _setValue(Attribute $attribute, $value, $post)
    {
        if (!$attribute->getWordpress()) {
            return '';
        }

        $attr = str_replace('{{ADDR_TYPE}}', '_' . $this->_data->getType(), $attribute->getWordpress());
        $attribute->setWordpress($attr);

        return parent::_setValue($attribute, $value, $post);
    }

    protected function _getEntityValue(Attribute $attribute)
    {
        $method = $this->_helper()->getGetterMethodName($this->_data, $attribute->getSkyhub());

        if (!$method) {
            return '';
        }

        return $this->_data->$method();
    }
}
