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

namespace B2W\Skyhub\Contracts;

/**
 * Interface Order
 * @package B2W\Skyhub\Contracts
 */
interface Order
{
    /**
     * Return items collection
     *
     * @return \B2W\Skyhub\Contracts\Order\Item\Collection $items
     */
    public function items();

    /**
     * Returns shipment for order
     * @return \B2W\Skyhub\Contracts\Order\Shipment;
     */
    public function shipment();

    /**
     * Sets data for order
     *
     * @param string|array $key
     * @param null\string $value
     * @return $this
     */
    public function setData($key, $value = null);

    /**
     * Save order
     *
     * @return $this
     */
    public function save();
}