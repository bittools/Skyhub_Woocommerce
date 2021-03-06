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

namespace B2W\SkyHub\Contract\Repository;

use B2W\SkyHub\Contract\Entity\OrderEntityInterface;

/**
 * Interface OrderApiRepositoryInterface
 * @package B2W\SkyHub\Contract\Repository
 */
interface OrderApiRepositoryInterface
{
    /**
     * @return mixed
     */
    public function queue();

    /**
     * @param $id
     * @return mixed
     */
    public function one($id);

    /**
     * Acknowledge order in queue
     *
     * @param OrderEntityInterface $order
     * @return mixed
     */
    public function ack(OrderEntityInterface $order);

    /**
     * @param OrderEntityInterface $order
     * @return mixed
     */
    public function shipp(OrderEntityInterface $order);

    /**
     * @param OrderEntityInterface $order
     * @return mixed
     */
    public function delivery(OrderEntityInterface $order);

    /**
     * @param OrderEntityInterface $order
     * @return mixed
     */
    public function cancel(OrderEntityInterface $order);
}
