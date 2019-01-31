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

namespace B2W\SkyHub\Contract\Repository\Order;

/**
 * Interface StatusApiRepositoryInterface
 * @package B2W\SkyHub\Contract\Order
 */
interface StatusApiRepositoryInterface
{
    /**
     * @return mixed
     */
    public function all();
}