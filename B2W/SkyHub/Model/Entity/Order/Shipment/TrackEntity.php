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

namespace B2W\SkyHub\Model\Entity\Order\Shipment;

use B2W\SkyHub\Model\Entity\EntityAbstract;

/**
 * Class TrackEntity
 * @package B2W\SkyHub\Model\Entity\Order\Shipment
 */
class TrackEntity extends EntityAbstract implements \B2W\SkyHub\Contract\Entity\Order\Shipment\TrackEntityInterface
{
    /** @var String */
    protected $_code    = null;

    /** @var String */
    protected $_carrier = null;

    /** @var String */
    protected $_method  = null;

    /** @var String */
    protected $_url = null;

    /**
     * @return String
     */
    public function getCode()
    {
        return $this->_code;
    }

    /**
     * @param String $code
     */
    public function setCode($code)
    {
        $this->_code = $code;
    }

    /**
     * @return String
     */
    public function getCarrier()
    {
        return $this->_carrier;
    }

    /**
     * @param String $carrier
     */
    public function setCarrier($carrier)
    {
        $this->_carrier = $carrier;
    }

    /**
     * @return String
     */
    public function getMethod()
    {
        return $this->_method;
    }

    /**
     * @param String $method
     */
    public function setMethod($method)
    {
        $this->_method = $method;
    }

    /**
     * Get the value of _url
     * @param String $method
     */ 
    public function getUrl()
    {
        return $this->_url;
    }

    /**
     * Set the value of _url
     */ 
    public function setUrl($_url)
    {
        $this->_url = $_url;;
    }
}
