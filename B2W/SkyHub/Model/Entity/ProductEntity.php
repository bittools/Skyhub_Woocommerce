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

namespace B2W\SkyHub\Model\Entity;


use B2W\SkyHub\Model\Resource\Collection;

class ProductEntity extends EntityAbstract implements \B2W\SkyHub\Contract\Entity\ProductEntityInterface
{
    /**
     * @var
     */
    protected $_id;

    /**
     * @var
     */
    protected $_sku;

    /**
     * @var
     */
    protected $_name;

    /**
     * @var
     */
    protected $_description;

    /**
     * @var
     */
    protected $_status;

    /**
     * @var
     */
    protected $_qty;

    /**
     * @var
     */
    protected $_price;

    /**
     * @var
     */
    protected $_promotionalPrice;

    /**
     * @var
     */
    protected $_cost;

    /**
     * @var
     */
    protected $_weight;

    /**
     * @var
     */
    protected $_height;

    /**
     * @var
     */
    protected $_width;

    /**
     * @var
     */
    protected $_length;

    /**
     * @var
     */
    protected $_brand;

    /**
     * @var
     */
    protected $_ean;

    /**
     * @var
     */
    protected $_nbm;

    /**
     * @var
     */
    protected $_categories;
    /**
     * @var array
     */
    protected $_additional = array();

    /**
     * @var
     */
    protected $_images;
    /**
     * @var Collection
     */
    protected $_specifications;
    /**
     * @var
     */
    protected $_variations;
    /**
     * @var Collection
     */
    protected $_variationAttributes;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getSku()
    {
        return $this->_sku;
    }

    /**
     * @param mixed $sku
     */
    public function setSku($sku)
    {
        $this->_sku = $sku;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->_name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->_description = $description;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->_status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->_status = $status == 'publish' ? 1 : 0;
    }

    /**
     * @return mixed
     */
    public function getQty()
    {
        return $this->_qty;
    }

    /**
     * @param mixed $qty
     */
    public function setQty($qty)
    {
        $this->_qty = $qty;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->_price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->_price = $price;
    }

    /**
     * @return mixed
     */
    public function getPromotionalPrice()
    {
        return $this->_promotionalPrice;
    }

    /**
     * @param mixed $promotionalPrice
     */
    public function setPromotionalPrice($promotionalPrice)
    {
        $this->_promotionalPrice = $promotionalPrice;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->_cost;
    }

    /**
     * @param mixed $cost
     */
    public function setCost($cost)
    {
        $this->_cost = $cost;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->_weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        $this->_weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->_height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->_height = $height;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->_width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->_width = $width;
    }

    /**
     * @return mixed
     */
    public function getLength()
    {
        return $this->_length;
    }

    /**
     * @param mixed $length
     */
    public function setLength($length)
    {
        $this->_length = $length;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->_brand;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand)
    {
        $this->_brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getEan()
    {
        return $this->_ean;
    }

    /**
     * @param mixed $ean
     */
    public function setEan($ean)
    {
        $this->_ean = $ean;
    }

    /**
     * @return mixed
     */
    public function getNbm()
    {
        return $this->_nbm;
    }

    /**
     * @param mixed $nbm
     */
    public function setNbm($nbm)
    {
        $this->_nbm = $nbm;
    }

    /**
     * @return Collection
     * @throws \Exception
     */
    public function getCategories()
    {
        return $this->_categories;
    }

    /**
     * @param Collection $categories
     * @return $this
     */
    public function setCategories(Collection $categories)
    {
        $this->_categories = $categories;
        return $this;
    }

    /**
     * @return array
     */
    public function getImages()
    {
        return $this->_images;
    }

    /**
     * @param $images
     * @return $this|mixed
     */
    public function setImages($images)
    {
        $this->_images = $images;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getSpecifications()
    {
        return $this->_specifications;
    }

    /**
     * @param $specifications
     * @return $this|mixed
     */
    public function setSpecifications($specifications)
    {
        $this->_specifications = $specifications;
        return $this;
    }

    /**
     * @return Collection
     * @throws \Exception
     */
    public function getVariations()
    {
        return $this->_variations;
    }

    /**
     * @param $variations
     * @return $this|mixed
     */
    public function setVariations($variations)
    {
        $this->_variations = $variations;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getVariationAttributes()
    {
        return $this->_variationAttributes;
    }

    /**
     * @param $collection
     * @return $this
     */
    public function setVariationAttributes($collection)
    {
        $this->_variationAttributes = $collection;
        return $this;
    }

    /**
     * @param null $key
     * @return array|mixed|string
     */
    public function getAdditional($key = null)
    {
        if (!$key) {
            return $this->_additional;
        }

        return isset($this->_additional[$key]) ? $this->_additional[$key] : '';
    }

    /**
     * @param $key
     * @param null $value
     * @return $this|mixed
     */
    public function setAdditional($key, $value = null)
    {
        if (is_array($key)) {
            $this->_additional = $key;
            return $this;
        }

        $this->_additional[$key] = $value;

        return $this;
    }
}