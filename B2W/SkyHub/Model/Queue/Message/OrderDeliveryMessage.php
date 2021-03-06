<?php
/**
 * BSeller - B2W Companhia Digital
 *
 * DISCLAIMER
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @copyright     Copyright (c) 2019 B2W Companhia Digital. (http://www.bseller.com.br/)
 * Access https://ajuda.skyhub.com.br/hc/pt-br/requests/new for questions and other requests.
 */

namespace B2W\SkyHub\Model\Queue\Message;

use B2W\SkyHub\Model\Queue\MessageAbstract;

/**
 * Class OrderShippMessage
 * @package B2W\SkyHub\Model\Queue\Order
 */
class OrderDeliveryMessage extends MessageAbstract
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
        return 'delivery';
    }
}
