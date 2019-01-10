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

namespace B2W\SkyHub\Model\Sales\Order\Payment;

class Entity implements \B2W\SkyHub\Contracts\Sales\Order\Payment\Entity
{
    /** @var float */
    protected $_value           = null;
    /** @var \DateTime */
    protected $_transactionDate = null;
    /** @var string */
    protected $_status          = null;
    /** @var \B2W\SkyHub\Model\Sales\Order\Payment\Sefaz\Entity */
    protected $_sefaz           = null;
    /** @var string */
    protected $_parcels         = null;
    /** @var string */
    protected $_method          = null;
    /** @var string */
    protected $_description     = null;
    /** @var string */
    protected $_cardIssuer      = null;
    /** @var string */
    protected $_autorizationId  = null;

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->_value;
    }

    /**
     * @param float $value
     */
    public function setValue($value)
    {
        $this->_value = $value;
    }

    /**
     * @return \DateTime
     */
    public function getTransactionDate()
    {
        return $this->_transactionDate;
    }

    /**
     * @param \DateTime $transactionDate
     */
    public function setTransactionDate($transactionDate)
    {
        $this->_transactionDate = $transactionDate;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->_status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->_status = $status;
    }

    /**
     * @return Sefaz\Entity
     */
    public function getSefaz()
    {
        return $this->_sefaz;
    }

    /**
     * @param Sefaz\Entity $sefaz
     */
    public function setSefaz(\B2W\SkyHub\Model\Sales\Order\Payment\Sefaz\Entity $sefaz)
    {
        $this->_sefaz = $sefaz;
    }

    /**
     * @return string
     */
    public function getParcels()
    {
        return $this->_parcels;
    }

    /**
     * @param string $parcels
     */
    public function setParcels($parcels)
    {
        $this->_parcels = $parcels;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->_method;
    }

    /**
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->_method = $method;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->_description = $description;
    }

    /**
     * @return string
     */
    public function getCardIssuer()
    {
        return $this->_cardIssuer;
    }

    /**
     * @param string $cardIssuer
     */
    public function setCardIssuer($cardIssuer)
    {
        $this->_cardIssuer = $cardIssuer;
    }

    /**
     * @return string
     */
    public function getAutorizationId()
    {
        return $this->_autorizationId;
    }

    /**
     * @param string $autorizationId
     */
    public function setAutorizationId($autorizationId)
    {
        $this->_autorizationId = $autorizationId;
    }
}
