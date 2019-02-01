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


use B2W\SkyHub\Model\Map\MapAttribute;

/**
 * Class ApiToEntityAbstract
 * @package B2W\SkyHub\Model\Transformer
 */
abstract class ApiToEntityAbstract
{
    /**
     *
     */
    const MAP_KEY = 'api_to_entity';

    /**
     * @var null
     */
    protected $_entity = null;
    /**
     * @var null
     */
    protected $_map = null;
    /**
     * @var \SkyHub\Api\Handler\Response\HandlerDefault
     */
    protected $_response    = null;
    /**
     * @var MapAttribute|null
     */
    protected $_attribute = null;

    /**
     * @return mixed
     */
    abstract protected function _getEntityInstance();

    /**
     * @return mixed
     */
    abstract protected function _getMapInstance();

    /**
     * @param \SkyHub\Api\Handler\Response\HandlerDefault|array $response
     * @return $this
     */
    public function setResponse($response)
    {
        $this->_response = $response;
        return $this;
    }

    /**
     * @param MapAttribute $attribute
     * @return $this
     */
    public function setAttribute(MapAttribute $attribute)
    {
        $this->_attribute = $attribute;
        return $this;
    }

    /**
     * @return mixed|null
     */
    protected function _getEntity()
    {
        if (is_null($this->_entity)) {
            $this->_entity = $this->_getEntityInstance();
        }

        return $this->_entity;
    }

    /**
     * @return mixed|null
     */
    protected function _getMap()
    {
        if (is_null($this->_map)) {
            $this->_map = $this->_getMapInstance();
        }

        return $this->_map;
    }

    /**
     * @return mixed|null
     * @throws \Exception
     */
    public function convert()
    {
        $this->_validate();

        /** @var MapAttribute $attribute */
        foreach ($this->_getMap()->map() as $attribute) {
            $value = $attribute->getMapper(self::MAP_KEY)
                ? $this->_fromMapper($attribute)
                : $this->_getApiValue($attribute, $this->_prepareData());

            $this->_setValue($attribute, $value);
        }

        return $this->_getEntity();
    }

    /**
     * @return array
     */
    protected function _prepareData($data = null)
    {
        $data = $data ?: $this->_response;
        return is_array($data) ? $data : $data->toArray();
    }

    /**
     * @throws \Exception
     */
    protected function _validate()
    {
        if (!$this->_getEntity()) {
            throw new \Exception(get_class($this) . ': Entity cant be empty');
        }

        if (is_null($this->_response)) {
            throw new \Exception(get_class($this) . ': API Response cant be empty');
        }
    }

    /**
     * @param MapAttribute $attribute
     * @return mixed|null|string
     * @throws \Exception
     */
    protected function _fromMapper(MapAttribute $attribute)
    {
        if (!class_exists($attribute->getMapper(self::MAP_KEY))) {
            return '';
        }

        $data       = $this->_prepareData();
        $response   = isset($data[$attribute->getSkyhub()]) ? $data[$attribute->getSkyhub()] : $data;
        $name       = $attribute->getMapper(self::MAP_KEY);

        /** @var ApiToEntityAbstract $mapper */
        $mapper = new $name();
        $mapper->setResponse($response);
        $mapper->setAttribute($attribute);

        return $mapper->convert();
    }

    /**
     * @param MapAttribute $attribute
     * @param array $data
     * @return string
     */
    protected function _getApiValue(MapAttribute $attribute, array $data)
    {
        if (!array_key_exists($attribute->getSkyhub(), $data)) {
            return '';
        }

        return $data[$attribute->getSkyhub()];
    }

    /**
     * @param MapAttribute $attribute
     * @param $value
     * @return $this
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     */
    protected function _setValue(MapAttribute $attribute, $value)
    {
        if (!$value) {
            return $this;
        }

        $method = $this->_helper()->getSetterMethodName($this->_getEntity(), $attribute->getSkyhub());

        if (!$method) {
            return $this;
        }

        $this->_getEntity()->$method($value);

        return $this;
    }

    /**
     * @return mixed
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     */
    protected function _helper()
    {
        return \App::helper('app');
    }
}
