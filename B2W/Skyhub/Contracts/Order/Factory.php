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

namespace B2W\Skyhub\Contracts\Order;


interface Factory
{
    /** Returns all orders (filtered or not)
     * @param array $filter
     * @return \B2W\Skyhub\Contracts\Order\Collection $collection
     */
    static public function all($filter = array());

    /**
     * Return single order filtered by id
     *
     * @param $id
     * @return \B2W\Skyhub\Contracts\Order $order
     */
    static public function one($id);
}