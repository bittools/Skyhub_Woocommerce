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

namespace B2W\SkyHub\Model\Sales\Order\Item;

class Entity implements \B2W\SkyHub\Contracts\Sales\Order\Item\Entity
{
    /** @var string */
    protected $_id              = null; //sku - se possuir variação, é o sku da variação
    /** @var string */
    protected $_productId       = null;
    /** @var string */
    protected $_name            = null;
    /** @var int */
    protected $_qty             = null;
    /** @var float */
    protected $_originalPrice   = null;
    /** @var float */
    protected $_specialPrice    = null;
    /** @var float */
    protected $_shippingCost    = null;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @return string
     */
    public function getProductId()
    {
        return $this->_productId;
    }

    /**
     * @param string $productId
     */
    public function setProductId($productId)
    {
        $this->_productId = $productId;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->_name = $name;
    }

    /**
     * @return int
     */
    public function getQty()
    {
        return $this->_qty;
    }

    /**
     * @param int $qty
     */
    public function setQty($qty)
    {
        $this->_qty = $qty;
    }

    /**
     * @return float
     */
    public function getOriginalPrice()
    {
        return $this->_originalPrice;
    }

    /**
     * @param float $originalPrice
     */
    public function setOriginalPrice($originalPrice)
    {
        $this->_originalPrice = $originalPrice;
    }

    /**
     * @return float
     */
    public function getSpecialPrice()
    {
        return $this->_specialPrice;
    }

    /**
     * @param float $specialPrice
     */
    public function setSpecialPrice($specialPrice)
    {
        $this->_specialPrice = $specialPrice;
    }

    /**
     * @return float
     */
    public function getShippingCost()
    {
        return $this->_shippingCost;
    }

    /**
     * @param float $shippingCost
     */
    public function setShippingCost($shippingCost)
    {
        $this->_shippingCost = $shippingCost;
    }
}