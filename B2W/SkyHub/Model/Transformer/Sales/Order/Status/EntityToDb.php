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

namespace B2W\SkyHub\Model\Transformer\Sales\Order\Status;

use B2W\SkyHub\Model\Sales\Order\Status\Entity;
use B2W\SkyHub\Model\Transformer\EntityToDbAbstract;
use B2W\SkyHub\Model\Transformer\PostToEntityAbstract;

/**
 * Class PostToEntity
 * @package B2W\SkyHub\Model\Transformer\Sales\Order\Item
 */
class EntityToDb extends EntityToDbAbstract
{
    /**
     * @return mixed|null
     */
    protected function _getMapInstance()
    {
        return null;
    }

    /**
     * @return EntityToDbAbstract|string
     */
    public function convert()
    {
        /** @var Entity $status */
        $status = $this->_data;
        return $status->getCode();
    }
}
