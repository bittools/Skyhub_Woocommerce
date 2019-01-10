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

namespace B2W\SkyHub\Model\Sales\Order\Shipment\Track;


class Entity implements \B2W\SkyHub\Contracts\Sales\Order\Shipment\Track\Entity
{
    /** @var string */
    protected $_code    = null;
    /** @var string */
    protected $_carrier = null;
    /** @var string */
    protected $_method  = null;

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
    public function getCarrier()
    {
        return $this->_carrier;
    }

    /**
     * @param string $carrier
     */
    public function setCarrier($carrier)
    {
        $this->_carrier = $carrier;
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
}
