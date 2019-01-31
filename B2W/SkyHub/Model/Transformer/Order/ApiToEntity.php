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

namespace B2W\SkyHub\Model\Transformer\Order;

use B2W\SkyHub\Model\Map\OrderMap;
use B2W\SkyHub\Model\Transformer\ApiToEntityAbstract;
use B2W\SkyHub\Model\Validation\OrderEntityValidator;

/**
 * Class ApiToEntity
 * @package B2W\SkyHub\Model\Transformer\Order
 */
class ApiToEntity extends ApiToEntityAbstract
{
    /**
     * @return OrderEntityValidator|mixed
     */
    protected function _getEntityInstance()
    {
        return new OrderEntityValidator();
    }

    /**
     * @return OrderMap|mixed
     */
    protected function _getMapInstance()
    {
        return new OrderMap();
    }
}