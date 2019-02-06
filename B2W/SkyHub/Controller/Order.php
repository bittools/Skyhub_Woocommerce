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

namespace B2W\SkyHub\Controller;

use B2W\SkyHub\Contract\Entity\OrderEntityInterface;
use B2W\SkyHub\Model\Map\Order\StatusMap;
use B2W\SkyHub\Model\Queue\Message\OrderShippMessage;

/**
 * Class Order
 * @package B2W\SkyHub\Controller
 */
class Order
{
    /**
     * @param $orderId
     * @param $statusFrom
     * @param $statusTo
     * @param $wcOrder
     * @return $this
     * @throws \B2W\SkyHub\Exception\Data\RepositoryNotFound
     * @throws \B2W\SkyHub\Exception\Exception
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     */
    public function update($orderId, $statusFrom, $statusTo, $wcOrder)
    {
        $skyhubAction = null;

        $map = new StatusMap();

        foreach ($map->map() as $attribute) {
            if ($attribute->getWordpress() == 'wc-' . $statusTo) {
                $skyhubAction = $attribute->getSkyhub();
                break;
            }
        }

        /** @var OrderEntityInterface $order */
        $order = \App::repository(\App::REPOSITORY_ORDER)->one($orderId);

        $methodName = '_' . $skyhubAction;
        if (method_exists($this, $methodName)) {
            $this->$methodName($order);
        }

        return $this;
    }

    /**
     * @param OrderEntityInterface $order
     * @return $this
     * @throws \B2W\SkyHub\Exception\Data\RepositoryNotFound
     * @throws \B2W\SkyHub\Exception\Exception
     */
    protected function _shipped(OrderEntityInterface $order)
    {
        $message = new OrderShippMessage($order->getId());
        \App::repository(\App::REPOSITORY_QUEUE)->add($message);
        return $this;
    }
}
