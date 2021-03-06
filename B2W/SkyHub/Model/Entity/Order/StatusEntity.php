<?php
/**
 * BSeller - B2W Companhia Digital
 *
 * DISCLAIMER
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @copyright     Copyright (c) 2017 B2W Companhia Digital. (http://www.bseller.com.br/)
 * Access https://ajuda.skyhub.com.br/hc/pt-br/requests/new for questions and other requests.
 */

namespace B2W\SkyHub\Model\Entity\Order;

use B2W\SkyHub\Model\Entity\EntityAbstract;

/**
 * Class StatusEntity
 * @package B2W\SkyHub\Model\Entity
 */
class StatusEntity extends EntityAbstract implements \B2W\SkyHub\Contract\Entity\Order\StatusEntityInterface
{
    /** @var string */
    protected $_code    = null;
    /** @var string */
    protected $_label   = null;
    /** @var string */
    protected $_type    = null;

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->_code;
    }

    /**
     * @param $code
     * @return $this|string
     */
    public function setCode($code)
    {
        $this->_code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->_label;
    }

    /**
     * @param $label
     * @return $this|string
     */
    public function setLabel($label)
    {
        $this->_label = $label;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @param $type
     * @return $this|string
     */
    public function setType($type)
    {
        $this->_type = $type;
        return $this;
    }
}
