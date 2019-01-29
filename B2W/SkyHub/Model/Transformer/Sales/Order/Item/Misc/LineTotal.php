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

namespace B2W\SkyHub\Model\Transformer\Sales\Order\Item\Misc;


use B2W\SkyHub\Model\Sales\Order\Item\Entity;
use B2W\SkyHub\Model\Transformer\EntityToDbAbstract;

/** @method Entity getEntity() */
class LineTotal extends EntityToDbAbstract
{
    /**
     * @return mixed|null
     */
    protected function _getMapInstance()
    {
        return null;
    }

    /**
     * @return \B2W\SkyHub\Model\Transformer\Handler\Post|mixed
     */
    public function convert()
    {
        return $this->getEntity()->getOriginalPrice() * $this->getEntity()->getQty();
    }
}
