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

namespace B2W\SkyHub\Model\Transformer\Order\Payment;

use B2W\SkyHub\Model\Map\MapAttribute;
use B2W\SkyHub\Model\Map\Order\PaymentMap;
use B2W\SkyHub\Model\Transformer\EntityToDbAbstract;

/**
 * Class EntityToDb
 * @package B2W\SkyHub\Model\Transformer\Order\Payment
 */
class EntityToDb extends EntityToDbAbstract
{
    /**
     * @return PaymentMap|mixed
     */
    protected function _getMapInstance()
    {
        return new PaymentMap();
    }

    /**
     * @param MapAttribute $attribute
     * @return string
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     */
    protected function _getEntityValue(MapAttribute $attribute)
    {
        $method = $this->_helper()->getGetterMethodName($this->_data, $attribute->getSkyhub());

        if (!$method) {
            return '';
        }

       return $this->_data->$method();
    }
}