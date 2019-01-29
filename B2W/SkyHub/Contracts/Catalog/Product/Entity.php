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

namespace B2W\SkyHub\Contracts\Catalog\Product;

use B2W\SkyHub\Model\Resource\Catalog\Category\Collection;

/**
 * Interface Entity
 * @package B2W\SkyHub\Contracts\Catalog\Product
 */
interface Entity
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param $id
     * @return mixed
     */
    public function setId($id);

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
    public function getName();

    /**
     * @param $name
     * @return mixed
     */
    public function setName($name);

    /**
     * @return mixed
     */
    public function getDescription();

    /**
     * @param $description
     * @return mixed
     */
    public function setDescription($description);

    /**
     * @return mixed
     */
    public function getStatus();

    /**
     * @param $status
     * @return mixed
     */
    public function setStatus($status);

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
    public function getPrice();

    /**
     * @param $price
     * @return mixed
     */
    public function setPrice($price);

    /**
     * @return mixed
     */
    public function getPromotionalPrice();//not required

    /**
     * @param $promotionalPrice
     * @return mixed
     */
    public function setPromotionalPrice($promotionalPrice);//not required

    /**
     * @return mixed
     */
    public function getCost();

    /**
     * @param $cost
     * @return mixed
     */
    public function setCost($cost);

    /**
     * @return mixed
     */
    public function getWeight();

    /**
     * @param $weight
     * @return mixed
     */
    public function setWeight($weight);

    /**
     * @return mixed
     */
    public function getHeight();

    /**
     * @param $height
     * @return mixed
     */
    public function setHeight($height);

    /**
     * @return mixed
     */
    public function getWidth();

    /**
     * @param $width
     * @return mixed
     */
    public function setWidth($width);

    /**
     * @return mixed
     */
    public function getLength();

    /**
     * @param $length
     * @return mixed
     */
    public function setLength($length);

    /**
     * @return mixed
     */
    public function getBrand();//not required

    /**
     * @param $brand
     * @return mixed
     */
    public function setBrand($brand);//not required

    /**
     * @return mixed
     */
    public function getEan();//not required

    /**
     * @param $ean
     * @return mixed
     */
    public function setEan($ean);//not required

    /**
     * @return mixed
     */
    public function getNbm();//not required

    /**
     * @param $nbm
     * @return mixed
     */
    public function setNbm($nbm);//not required

    /**
     * @return mixed
     */
    public function getCategories();

    /**
     * @param Collection $categories
     * @return mixed
     */
    public function setCategories(Collection $categories);

    /**
     * @return mixed
     */
    public function getImages();

    /**
     * @param $images
     * @return mixed
     */
    public function setImages($images);

    /**
     * @return mixed
     */
    public function getSpecifications();

    /**
     * @param $specifications
     * @return mixed
     */
    public function setSpecifications($specifications);

    /**
     * @return mixed
     */
    public function getVariations();

    /**
     * @param $variations
     * @return mixed
     */
    public function setVariations($variations);

    /**
     * @return mixed
     */
    public function getVariationAttributes();

    /**
     * @param $collection
     * @return mixed
     */
    public function setVariationAttributes($collection);

    /**
     * @param null $key
     * @return mixed
     */
    public function getAdditional($key = null);

    /**
     * @param $key
     * @param null $value
     * @return mixed
     */
    public function setAdditional($key, $value = null);
}
