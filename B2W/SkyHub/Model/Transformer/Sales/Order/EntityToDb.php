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

namespace B2W\SkyHub\Model\Transformer\Sales\Order;

use B2W\SkyHub\Model\Map\Sales\Order\Map;
use B2W\SkyHub\Model\Transformer\EntityToDbAbstract;

/**
 * Class EntityToDb
 * @package B2W\SkyHub\Model\Transformer\Sales\Order
 */
class EntityToDb extends EntityToDbAbstract
{
    /**
     * @return Map|mixed
     */
    protected function _getMapInstance()
    {
        return new Map();
    }
}
