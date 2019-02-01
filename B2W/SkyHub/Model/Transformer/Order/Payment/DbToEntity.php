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

use B2W\SkyHub\Model\Entity\Order\PaymentEntity;
use B2W\SkyHub\Model\Map\Order\PaymentMap;
use B2W\SkyHub\Model\Transformer\DbToEntityAbstract;

/**
 * Class DbToEntity
 * @package B2W\SkyHub\Model\Transformer\Order\Payment
 */
class DbToEntity extends DbToEntityAbstract
{
    /**
     * @return \B2W\SkyHub\Model\Resource\Collection|mixed
     */
    protected function _getAttributeMap()
    {
        $map = new PaymentMap();
        return $map->map();
    }

    /**
     * @return PaymentEntity|null
     */
    protected function _getEntityInstance()
    {
        return new PaymentEntity();
    }
}
