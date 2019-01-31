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
use B2W\SkyHub\Model\Map\MapAbstract;
use B2W\SkyHub\Model\Transformer\Handler\Post;

/**
 * Class EntityToDbAbstract
 * @package B2W\SkyHub\Model\Transformer
 */
abstract class EntityToDbAbstract
{
    /**
     *
     */
    const MAP_KEY = 'entity_to_db';

    /**
     * @var null
     */
    protected $_entity     = null;
    /**
     * @var null
     */
    protected $_map = null;
    /**
     * @var null
     */
    protected $_attribute = null;
    /**
     * @var null
     */
    protected $_data = null;

    /**
     * @return mixed
     */
    abstract protected function _getMapInstance();

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
     * @param $data
     * @return $this
     */
    public function setData($data)
    {
        $this->_data = $data;
        return $this;
    }

    /**
     * @param $entity
     * @return $this
     */
    public function setEntity($entity)
    {
        $this->_entity = $entity;
        return $this;
    }

    /**
     * @return null
     */
    public function getEntity()
    {
        return $this->_entity;
    }

    /**
     * @return MapAbstract
     */
    protected function _getMap()
    {
        if (empty($this->_map)) {
            $this->_map = $this->_getMapInstance();
        }

        return $this->_map;
    }

    /**
     * @return string
     */
    protected function _getTableName()
    {
        return 'posts';
    }

    /**
     * @return Post
     * @throws \B2W\SkyHub\Exception\Data\TransformerNotFound
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     * @throws \Exception
     */
    public function convert()
    {
        $this->_validate();

        $post = new Post();
        $post->setTableName($this->_getTableName());

        /** @var MapAttribute $attribute */
        foreach ($this->_getMap()->map() as $attribute) {

            if ($attribute->getMapper(self::MAP_KEY)) {
                $this->_fromMapper($attribute, $post);
                continue;
            }

            $this->_setValue($attribute, $this->_getEntityValue($attribute), $post);
        }

        return $post;
    }

    /**
     * @throws \Exception
     */
    protected function _validate()
    {
        if (!$this->getEntity()) {
            throw new \Exception(get_class($this) . ': Entity cant be empty');
        }
    }


    /**
     * @param MapAttribute $attribute
     * @param Post $post
     * @return $this
     * @throws \B2W\SkyHub\Exception\Data\TransformerNotFound
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     */
    protected function _fromMapper(MapAttribute $attribute, Post $post)
    {
        if (!class_exists($attribute->getMapper(self::MAP_KEY))) {
            return '';
        }

        $name   = $attribute->getMapper(self::MAP_KEY);
        /** @var EntityToDbAbstract $mapper */
        $mapper = new $name();
        $mapper->setAttribute($attribute);
        $mapper->setEntity($this->getEntity());
        $mapper->setData($this->_getEntityValue($attribute));
        $result = $mapper->convert();

        if ($result instanceof Post) {
            $post->merge($result);
            return $this;
        }

        $this->_setValue($attribute, $result, $post);

        return $this;
    }

    /**
     * @param MapAttribute $attribute
     * @return string
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     */
    protected function _getEntityValue(MapAttribute $attribute)
    {
        $method = $this->_helper()->getGetterMethodName($this->getEntity(), $attribute->getSkyhub());

        if (!$method) {
            return '';
        }

        return $this->getEntity()->$method();
    }

    /**
     * @return \B2W\SkyHub\Helper\App;
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     */
    protected function _helper()
    {
        return \App::helper('app');
    }

    /**
     * @param MapAttribute $attribute
     * @param $value
     * @return $this|string
     * @throws \B2W\SkyHub\Exception\Data\TransformerNotFound
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     */
    protected function _setValue(MapAttribute $attribute, $value, Post $post)
    {
        if (!$attribute->getWordpress()) {
            return '';
        }

        if (is_object($value)) {
            $class = \App::transformer($this->_helper()->underscore(get_class($value) . '/to_string'));
            $value = $class->convert($value);
        }

        $post->addData($attribute->getWordpress(), $value);

        return $this;
    }
}