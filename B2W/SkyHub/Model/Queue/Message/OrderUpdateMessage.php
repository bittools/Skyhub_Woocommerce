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

namespace B2W\SkyHub\Model\Queue\Message;

use B2W\SkyHub\Model\Queue\MessageAbstract;

/**
 * Class OrderUpdateMessage
 * @package B2W\SkyHub\Model\Queue\Order
 */
class OrderUpdateMessage extends MessageAbstract
{
    /**
     * @return string
     */
    protected function _getType()
    {
        return 'order_update';
    }

    /**
     * @return mixed|string
     */
    protected function _getModelName()
    {
        return \B2W\SkyHub\Model\Queue\Worker\OrderUpdateWorker::class;
    }

    /**
     * @return mixed|string
     */
    protected function _getMethodName()
    {
        return 'run';
    }
}
