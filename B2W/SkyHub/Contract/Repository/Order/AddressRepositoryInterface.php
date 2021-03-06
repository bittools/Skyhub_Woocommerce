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

namespace B2W\SkyHub\Contract\Repository\Order;

use B2W\SkyHub\Contract\Entity\OrderEntityInterface;

/**
 * Interface AddressRepositoryInterface
 * @package B2W\SkyHub\Contract\Order
 */
interface AddressRepositoryInterface
{
    /**
     *
     */
    const TYPE_BILLING  = 'billing';
    /**
     *
     */
    const TYPE_SHIPPING = 'shipping';

    /**
     * @param OrderEntityInterface $order
     * @param string $type
     * @return \B2W\SkyHub\Contract\Entity\Order\AddressEntityInterface
     */
    public function load(OrderEntityInterface $order, $type = 'billing');

    /**
     * @param OrderEntityInterface $order
     * @return \B2W\SkyHub\Contract\Entity\Order\AddressEntityInterface
     */
    public function billing(OrderEntityInterface $order);

    /**
     * @param OrderEntityInterface $order
     * @return \B2W\SkyHub\Contract\Entity\Order\AddressEntityInterface
     */
    public function shipping(OrderEntityInterface $order);
}
