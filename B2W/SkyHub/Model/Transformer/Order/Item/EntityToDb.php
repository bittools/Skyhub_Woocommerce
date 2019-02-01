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

namespace B2W\SkyHub\Model\Transformer\Order\Item;

use B2W\SkyHub\Model\Map\MapAttribute;
use B2W\SkyHub\Model\Map\Order\ItemMap;
use B2W\SkyHub\Model\Transformer\EntityToDbAbstract;

/**
 * Class DbToEntity
 * @package B2W\SkyHub\Model\Transformer\Order\Item
 */
/** @method \B2W\SkyHub\Model\Entity\OrderEntity getEntity() */
class EntityToDb extends EntityToDbAbstract
{
    /**
     * @return ItemMap|mixed
     */
    protected function _getMapInstance()
    {
        return new ItemMap();
    }

    /**
     * @return string
     */
    protected function _getTableName()
    {
        return 'woocommerce_order_items';
    }

    /**
     * @param MapAttribute $attribute
     * @return string
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     */
    protected function _getEntityValue(MapAttribute $attribute)
    {
        $method = $this->_helper()->getGetterMethodName($this->getEntity(), $attribute->getSkyhub());

        if (!$method) {
            return '';
        }

        return $this->getEntity()->$method();
    }
}
