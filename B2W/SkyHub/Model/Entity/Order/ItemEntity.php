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

namespace B2W\SkyHub\Model\Entity\Order;

/**
 * Class ItemEntity
 * @package B2W\SkyHub\Model\Entity\Order
 */
class ItemEntity implements \B2W\SkyHub\Contract\Entity\Order\ItemEntityInterface
{
    /** @var string */
    protected $_id              = null;
    /** @var \B2W\SkyHub\Contract\Entity\ProductEntityInterface */
    protected $_product         = null;
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
     * @var null
     */
    protected $_orderId = null;

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
     * @return mixed|null
     */
    public function getOrderId()
    {
        return $this->_orderId;
    }

    /**
     * @param $id
     * @return $this|mixed
     */
    public function setOrderId($id)
    {
        $this->_orderId = $id;
        return $this;
    }


    /**
     * @return \B2W\SkyHub\Contract\Entity\ProductEntityInterface
     */
    public function getProduct()
    {
        return $this->_product;
    }

    /**
     * @param \B2W\SkyHub\Contract\Entity\ProductEntityInterface $product
     */
    public function setProduct(\B2W\SkyHub\Contract\Entity\ProductEntityInterface $product)
    {
        $this->_product = $product;
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

    /**
     * @return mixed|void
     * @throws \B2W\SkyHub\Exception\Data\RepositoryNotFound
     */
    public function save()
    {
        \App::repository(\App::REPOSITORY_ORDER_ITEM)->save($this);
    }
}