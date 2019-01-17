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

namespace B2W\SkyHub\Model\Transformer\Api\Sales\Order\Invoice;

use B2W\SkyHub\Model\Transformer\Api\Sales\CollectionAbstract;

/**
 * Class Collection
 * @package B2W\SkyHub\Model\Transformer\Api\Sales\Order\Invoice
 */
class Collection extends CollectionAbstract
{
    /**
     * @return \B2W\SkyHub\Model\Sales\Order\Invoice\Collection|mixed
     */
    protected function _getCollection()
    {
        return new \B2W\SkyHub\Model\Sales\Order\Invoice\Collection();
    }

    /**
     * @return mixed|string
     */
    protected function _getTransformerName()
    {
        return \B2W\SkyHub\Model\Transformer\Api\Sales\Order\Invoice::class;
    }
}
