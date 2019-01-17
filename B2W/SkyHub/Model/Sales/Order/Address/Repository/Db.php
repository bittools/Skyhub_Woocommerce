<?php

namespace B2W\SkyHub\Model\Sales\Order\Address\Repository;

use B2W\SkyHub\Contracts\Resource\Sales\Order\Address\Repository;
use B2W\SkyHub\Contracts\Sales\Order\Entity;
use B2W\SkyHub\Model\Resource\RepositoryAbstract;

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

class Db extends RepositoryAbstract implements Repository
{
    /**
     * @param Entity $order
     * @param string $type
     * @return \B2W\SkyHub\Contracts\Sales\Order\Address\Entity|\B2W\SkyHub\Model\Sales\Order\Address\Entity
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     */
    public function get(Entity $order, $type)
    {
        $address = new \B2W\SkyHub\Model\Sales\Order\Address\Entity();

        \B2W\SkyHub\Model\Transformer\Sales\Order\Address::convert($order, $address, $type);

        return $address;
    }

    /**
     * @param Entity $order
     * @return \B2W\SkyHub\Contracts\Sales\Order\Address\Entity|\B2W\SkyHub\Model\Sales\Order\Address\Entity
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     */
    public function billing(Entity $order)
    {
        return $this->get($order, self::TYPE_BILLING);
    }

    /**
     * @param Entity $order
     * @return \B2W\SkyHub\Contracts\Sales\Order\Address\Entity|\B2W\SkyHub\Model\Sales\Order\Address\Entity
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     */
    public function shipping(Entity $order)
    {
        return $this->get($order, self::TYPE_SHIPPING);
    }
}
