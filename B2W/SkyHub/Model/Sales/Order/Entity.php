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

namespace B2W\SkyHub\Model\Sales\Order;

class Entity implements \B2W\SkyHub\Contracts\Sales\Order\Entity
{
    /** @var string */
    protected $_id                      = null;
    /** @var string */
    protected $_code                    = null;
    /** @var string */
    protected $_channel                 = null;
    /** @var \DateTime */
    protected $_placedAt                = null;
    /** @var \DateTime */
    protected $_updatedAt               = null;
    /** @var float */
    protected $_totalOrdered            = null;
    /** @var float */
    protected $_interest                = null; //juros do pedido
    /** @var float */
    protected $_shippingCost            = null;
    /** @var string */
    protected $_shippingMethod          = null;
    /** @var \DateTime */
    protected $_estimatedDelivery       = null;
    /** @var \B2W\SkyHub\Model\Sales\Order\Address\Entity */
    protected $_shippingAddress         = null;
    /** @var \B2W\SkyHub\Model\Sales\Order\Address\Entity */
    protected $_billingAddress          = null;
    /** @var \B2W\SkyHub\Model\Customer\Entity */
    protected $_customer                = null;
    /** @var \B2W\SkyHub\Model\Sales\Order\Item\Collection */
    protected $_items                   = null;
    /** @var \B2W\SkyHub\Model\Sales\Order\Status\Entity */
    protected $_status                  = null;
    /** @var \B2W\SkyHub\Model\Sales\Order\Invoice\Collection */
    protected $_invoices                = null;
    /** @var \B2W\SkyHub\Model\Sales\Order\Shipment\Collection */
    protected $_shipments               = null;
    /** @var string */
    protected $_syncStatus              = null;
    /** @var string */
    protected $_calculationType         = null; //Tipo de Calculo do Frete , Exemplo B2WENTREGA
    /** @var string */
    protected $_shippingCarrier         = null;
    /** @var array */
    protected $_tags                    = null; //Campo informa se pedido pode conter fraude
    /** @var \B2W\SkyHub\Model\Sales\Order\Payment\Entity */
    protected $_payments                = null;
    /** @var \DateTime */
    protected $_estimatedDeliveryShift  = null;

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
    public function getCode()
    {
        return $this->_code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->_code = $code;
    }

    /**
     * @return string
     */
    public function getChannel()
    {
        return $this->_channel;
    }

    /**
     * @param string $channel
     */
    public function setChannel($channel)
    {
        $this->_channel = $channel;
    }

    /**
     * @return \DateTime
     */
    public function getPlacedAt()
    {
        return $this->_placedAt;
    }

    /**
     * @param \DateTime $placedAt
     */
    public function setPlacedAt($placedAt)
    {
        $this->_placedAt = $placedAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->_updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->_updatedAt = $updatedAt;
    }

    /**
     * @return float
     */
    public function getTotalOrdered()
    {
        return $this->_totalOrdered;
    }

    /**
     * @param float $totalOrdered
     */
    public function setTotalOrdered($totalOrdered)
    {
        $this->_totalOrdered = $totalOrdered;
    }

    /**
     * @return float
     */
    public function getInterest()
    {
        return $this->_interest;
    }

    /**
     * @param float $interest
     */
    public function setInterest($interest)
    {
        $this->_interest = $interest;
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
     * @return string
     */
    public function getShippingMethod()
    {
        return $this->_shippingMethod;
    }

    /**
     * @param string $shippingMethod
     */
    public function setShippingMethod($shippingMethod)
    {
        $this->_shippingMethod = $shippingMethod;
    }

    /**
     * @return \DateTime
     */
    public function getEstimatedDelivery()
    {
        return $this->_estimatedDelivery;
    }

    /**
     * @param \DateTime $estimatedDelivery
     */
    public function setEstimatedDelivery($estimatedDelivery)
    {
        $this->_estimatedDelivery = $estimatedDelivery;
    }

    /**
     * @return Address\Entity
     */
    public function getShippingAddress()
    {
        return $this->_shippingAddress;
    }

    /**
     * @param Address\Entity $shippingAddress
     */
    public function setShippingAddress($shippingAddress)
    {
        $this->_shippingAddress = $shippingAddress;
    }

    /**
     * @return Address\Entity
     */
    public function getBillingAddress()
    {
        return $this->_billingAddress;
    }

    /**
     * @param Address\Entity $billingAddress
     */
    public function setBillingAddress($billingAddress)
    {
        $this->_billingAddress = $billingAddress;
    }

    /**
     * @return \B2W\SkyHub\Model\Customer\Entity
     */
    public function getCustomer()
    {
        return $this->_customer;
    }

    /**
     * @param \B2W\SkyHub\Model\Customer\Entity $customer
     */
    public function setCustomer($customer)
    {
        $this->_customer = $customer;
    }

    /**
     * @return Item\Collection
     */
    public function getItems()
    {
        return $this->_items;
    }

    /**
     * @param Item\Collection $items
     */
    public function setItems($items)
    {
        $this->_items = $items;
    }

    /**
     * @return Status\Entity
     */
    public function getStatus()
    {
        return $this->_status;
    }

    /**
     * @param Status\Entity $status
     */
    public function setStatus($status)
    {
        $this->_status = $status;
    }

    /**
     * @return Invoice\Collection
     */
    public function getInvoices()
    {
        return $this->_invoices;
    }

    /**
     * @param Invoice\Collection $invoices
     */
    public function setInvoices($invoices)
    {
        $this->_invoices = $invoices;
    }

    /**
     * @return Shipment\Collection
     */
    public function getShipments()
    {
        return $this->_shipments;
    }

    /**
     * @param Shipment\Collection $shipments
     */
    public function setShipments($shipments)
    {
        $this->_shipments = $shipments;
    }

    /**
     * @return string
     */
    public function getSyncStatus()
    {
        return $this->_syncStatus;
    }

    /**
     * @param string $syncStatus
     */
    public function setSyncStatus($syncStatus)
    {
        $this->_syncStatus = $syncStatus;
    }

    /**
     * @return string
     */
    public function getCalculationType()
    {
        return $this->_calculationType;
    }

    /**
     * @param string $calculationType
     */
    public function setCalculationType($calculationType)
    {
        $this->_calculationType = $calculationType;
    }

    /**
     * @return string
     */
    public function getShippingCarrier()
    {
        return $this->_shippingCarrier;
    }

    /**
     * @param string $shippingCarrier
     */
    public function setShippingCarrier($shippingCarrier)
    {
        $this->_shippingCarrier = $shippingCarrier;
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return $this->_tags;
    }

    /**
     * @param array $tags
     */
    public function setTags($tags)
    {
        $this->_tags = $tags;
    }

    public function save()
    {
        // TODO: Implement save() method.
    }
}
