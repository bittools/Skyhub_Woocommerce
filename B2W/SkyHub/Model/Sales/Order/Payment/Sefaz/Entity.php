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

namespace B2W\SkyHub\Model\Sales\Order\Payment\Sefaz;


/**
 * Class Entity
 * @package B2W\SkyHub\Model\Sales\Order\Payment\Sefaz
 */
class Entity implements \B2W\SkyHub\Contracts\Sales\Order\Payment\Sefaz\Entity
{
    /**
     * @var string
     */
    protected $_typeIntegration     = null;
    /**
     * @var string
     */
    protected $_paymentIndicator    = null;
    /**
     * @var string
     */
    protected $_namePayment         = null;
    /**
     * @var string
     */
    protected $_nameCardIssuer      = null;
    /**
     * @var string
     */
    protected $_idPayment           = null;
    /**
     * @var string
     */
    protected $_idCardIssuer        = null;

    /**
     * @return string
     */
    public function getTypeIntegration()
    {
        return $this->_typeIntegration;
    }

    /**
     * @param string $typeIntegration
     */
    public function setTypeIntegration($typeIntegration)
    {
        $this->_typeIntegration = $typeIntegration;
    }

    /**
     * @return string
     */
    public function getPaymentIndicator()
    {
        return $this->_paymentIndicator;
    }

    /**
     * @param string $paymentIndicator
     */
    public function setPaymentIndicator($paymentIndicator)
    {
        $this->_paymentIndicator = $paymentIndicator;
    }

    /**
     * @return string
     */
    public function getNamePayment()
    {
        return $this->_namePayment;
    }

    /**
     * @param string $namePayment
     */
    public function setNamePayment($namePayment)
    {
        $this->_namePayment = $namePayment;
    }

    /**
     * @return string
     */
    public function getNameCardIssuer()
    {
        return $this->_nameCardIssuer;
    }

    /**
     * @param string $nameCardIssuer
     */
    public function setNameCardIssuer($nameCardIssuer)
    {
        $this->_nameCardIssuer = $nameCardIssuer;
    }

    /**
     * @return string
     */
    public function getIdPayment()
    {
        return $this->_idPayment;
    }

    /**
     * @param string $idPayment
     */
    public function setIdPayment($idPayment)
    {
        $this->_idPayment = $idPayment;
    }

    /**
     * @return string
     */
    public function getIdCardIssuer()
    {
        return $this->_idCardIssuer;
    }

    /**
     * @param string $idCardIssuer
     */
    public function setIdCardIssuer($idCardIssuer)
    {
        $this->_idCardIssuer = $idCardIssuer;
    }
}