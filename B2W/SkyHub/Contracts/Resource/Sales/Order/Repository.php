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

namespace B2W\SkyHub\Contracts\Resource\Sales\Order;

use B2W\SkyHub\Contracts\Resource\Collection;
use B2W\SkyHub\Contracts\Sales\Order\Entity;

/**
 * Interface Repository
 * @package B2W\SkyHub\Contracts\Resource\Sales\Order
 */
interface Repository
{
    /**
     * @param Entity $order
     * @return mixed
     */
    public function get(Entity $order);
}
