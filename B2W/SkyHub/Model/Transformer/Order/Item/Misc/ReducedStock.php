<?php
/**
 * BSeller - B2W Companhia Digital
 *
 * DISCLAIMER
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @copyright     Copyright (c) 2017 B2W Companhia Digital. (http://www.bseller.com.br/)
 * Access https://ajuda.skyhub.com.br/hc/pt-br/requests/new for questions and other requests.
 */

namespace B2W\SkyHub\Model\Transformer\Order\Item\Misc;

use B2W\SkyHub\Model\Entity\Order\ItemEntity;
use B2W\SkyHub\Model\Transformer\EntityToDbAbstract;

/** @method ItemEntity getEntity() */
class ReducedStock extends EntityToDbAbstract
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
        return $this->getEntity()->getQty();
    }
}
