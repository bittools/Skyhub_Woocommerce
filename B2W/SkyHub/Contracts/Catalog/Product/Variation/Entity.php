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

namespace B2W\SkyHub\Contracts\Catalog\Product\Variation;

/**
 * Interface Entity
 * @package B2W\SkyHub\Contracts\Catalog\Product\Variation
 */
interface Entity
{
    /**
     * @param \B2W\SkyHub\Contracts\Catalog\Product\Entity $product
     * @return mixed
     */
    public function setParent(\B2W\SkyHub\Contracts\Catalog\Product\Entity $product);

    /**
     * @return mixed
     */
    public function getParent();
    /**
     * @return mixed
     */
    public function getSku();

    /**
     * @param $sku
     * @return mixed
     */
    public function setSku($sku);

    /**
     * @return mixed
     */
    public function getQty();

    /**
     * @param $qty
     * @return mixed
     */
    public function setQty($qty);

    /**
     * @return mixed
     */
    public function getEan();

    /**
     * @param $ean
     * @return mixed
     */
    public function setEan($ean);

    /**
     * @return mixed
     */
    public function getImages();

    /**
     * @return mixed
     */
    public function getSpecifications();
}
