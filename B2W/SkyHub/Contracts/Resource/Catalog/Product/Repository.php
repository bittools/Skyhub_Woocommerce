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

namespace B2W\SkyHub\Contracts\Resource\Catalog\Product;

use B2W\SkyHub\Contracts\Catalog\Product\Entity;

/**
 * Interface Repository
 * @package B2W\SkyHub\Contracts\Resource\Catalog\Product
 */
interface Repository
{
    /**
     * @param array $filter
     * @return mixed
     */
    public function find($filter = array());

    /**
     * @param int|\WP_Post $post
     * @return mixed
     */
    public function one($post);
    /**
     * @param $sku
     * @return Entity
     */
    public function sku($sku);
}
