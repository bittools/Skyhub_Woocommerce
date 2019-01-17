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

namespace B2W\SkyHub\Model\Transformer\Post\Catalog\Product;

use B2W\SkyHub\Model\Transformer\PostAbstract;

/**
 * Class Variation
 * @package B2W\SkyHub\Model\Transformer\Post\Catalog\Product
 */
class Variation extends PostAbstract
{
    /**
     * @return $this|mixed
     */
    protected function _init()
    {
        $map    = array(
            'ID'            => 'id',
            '_sku'          => 'sku',
            '_stock'        => 'qty',
            '_price'        => 'price'
        );

        foreach ($map as $post => $entity) {
            $this->_addMap($post, $entity);
        }

        return $this;
    }
}