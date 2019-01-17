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

namespace B2W\SkyHub\Model\Transformer;

use B2W\SkyHub\Helper\App;
use B2W\SkyHub\Model\TransformerAbstract;

/**
 * Class ToCustomerAbstract
 * @package B2W\SkyHub\Model\Transformer
 */
abstract class ToCustomerAbstract extends TransformerAbstract
{
    /**
     * @var string
     */
    protected $_entity      = '';
    /**
     * @var null
     */
    protected $_customer    = null;

    /**
     * @param \B2W\SkyHub\Contracts\Sales\Order\Customer\Entity $customer
     * @return $this
     */
    public function setCustomer(\B2W\SkyHub\Contracts\Sales\Order\Customer\Entity $customer)
    {
        $this->_customer = $customer;
        return $this;
    }

    /**
     * @return \B2W\SkyHub\Contracts\Sales\Order\Customer\Entity
     */
    public function getCustomer()
    {
        return $this->_customer;
    }

    /**
     * @return $this
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     */
    protected function _convert()
    {
        //default table attributes
        foreach (\App::config('sales/order/customer/skyhub') as $config) {

            if (isset($config['entity']) && $config['entity'] != $this->_entity) {
                continue;
            }

            $this->_setValue($config);
        }

        return $this;
    }

    /**
     * @param $localAttr
     * @return string
     */
    protected function _fromString($localAttr)
    {
        $value = $this->_getEntityData($localAttr);
        return $value;
    }

    /**
     * @param $config
     * @return string
     */
    protected function _fromArray($config)
    {
        $value      = array();
        $localAttr  = $config['default_local'];

        foreach ($localAttr as $item) {
            $val = $this->_fromString($item);

            if ($val) {
                $value[] = $val;
            }
        }

        return implode(' ', $value);
    }

    /**
     * @param $config
     * @return bool
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     */
    protected function _setValue($config)
    {
        $object = $this->getCustomer();
        $attr   = $config['code'];
        $value  = $this->_getValue($config);
        $method = $this->_getMethodName($this->getCustomer(), $attr);

        if (!$method) {
            return false;
        }

        return $object->$method($value);
    }

    /**
     * @param $config
     * @return mixed|string
     */
    protected function _getValue($config)
    {
        if (is_string($config['default_local'])) {
            return $this->_fromString($config['default_local']);
        }

        if (is_array($config['default_local'])) {
            return $this->_fromArray($config);
        }

        return '';
    }

    /**
     * @param $class
     * @param $attr
     * @return bool|string
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     */
    protected function _getMethodName($class, $attr)
    {
        /** @var App $helper */
        $helper = \App::helper('app');
        return $helper->getSetterMethodName($class, $attr);
    }

    /**
     * @param $localAttr
     * @return string
     */
    abstract protected function _getEntityData($localAttr);
}