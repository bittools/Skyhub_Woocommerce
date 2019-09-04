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

namespace B2W\SkyHub\Model\Transformer\Order\Shipment;

use B2W\SkyHub\Model\Entity\Order\ShipmentEntity;
use B2W\SkyHub\Model\Map\Order\ShipmentMap;
use B2W\SkyHub\Model\Transformer\DbToEntityAbstract;

class DbToEntity extends DbToEntityAbstract
{
    protected function _getAttributeMap()
    {
        $map = new ShipmentMap();
        return $map->map();
    }

    /**
     * @return ShipmentEntity|null
     */
    protected function _getEntityInstance()
    {
        return new ShipmentEntity();
    }
}
