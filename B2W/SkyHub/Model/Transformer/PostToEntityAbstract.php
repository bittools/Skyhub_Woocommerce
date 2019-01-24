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

use B2W\SkyHub\Model\Map\Attribute;

/**
 * Class PostToEntityAbstract
 * @package B2W\SkyHub\Model\Transformer
 */
abstract class PostToEntityAbstract
{
    /** @var \WP_Post */
    protected $_post            = null;
    /**
     * @var null
     */
    protected $_entity          = null;
    /**
     * @var null
     */
    protected $_parentEntity    = null;
    /**
     * @var null
     */
    protected $_meta            = null;
    /**
     * @var Attribute
     */
    protected $_attribute       = null;
    /**
     * @var PostToEntityAbstract
     */
    protected $_referenceClass  = null;

    /**
     * @return PostToEntityAbstract
     */
    public function getReferenceClass()
    {
        return $this->_referenceClass;
    }

    /**
     * @param PostToEntityAbstract $referenceClass
     */
    public function setReferenceClass($referenceClass)
    {
        $this->_referenceClass = $referenceClass;
    }

    /**
     * @return mixed
     */
    abstract protected function _getAttributeMap();

    /**
     * @param $post
     * @return $this
     */
    public function setPost($post)
    {
        $this->_post = $post;
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
     * @return $this
     */
    protected function _afterConvert()
    {
        return $this;
    }

    /**
     * @return null
     */
    protected function _getEntity()
    {
        if (is_null($this->_entity)) {
            $this->_entity = $this->_getEntityInstance();
        }

        return $this->_entity;
    }

    /**
     * @param $entity
     * @return $this
     */
    public function setParentEntity($entity)
    {
        $this->_parentEntity = $entity;
        return $this;
    }

    /**
     * @param $meta
     * @return $this
     */
    public function setMeta($meta)
    {
        $this->_meta = $meta;
        return $this;
    }

    /**
     * @param $attribute
     * @return $this
     */
    public function setAttribute(Attribute $attribute)
    {
        $this->_attribute = $attribute;
        return $this;
    }

    /**
     * @return null
     */
    public function getParentEntity()
    {
        return $this->_parentEntity;
    }

    /**
     * @return null
     */
    protected function _getEntityInstance()
    {
        return null;
    }

    /**
     * @return \B2W\SkyHub\Helper\App
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     */
    protected function _helper()
    {
        return \App::helper('app');
    }

    /**
     * @return null
     * @throws \Exception
     */
    public function convert()
    {
        $this->_validate();

        /** @var Attribute $attribute */
        foreach ($this->_getAttributeMap() as $attribute) {

            $value = $attribute->getMapper('post_to_entity')
                ? $this->_fromMapper($attribute)
                : $this->_getPostValue($attribute);

            $this->_setValue($attribute, $value);
        }

        $entity = $this->_entity;

        $this->_reset();

        return $entity;
    }

    /**
     * @return $this
     */
    protected function _reset()
    {
        $this->_post            = null;
        $this->_entity          = null;
        $this->_parentEntity    = null;
        $this->_meta            = null;
        $this->_attribute       = null;
        $this->_referenceClass  = null;

        return $this;
    }

    /**
     * @return $this
     * @throws \Exception
     */
    protected function _validate()
    {
        if (!$this->_getEntity()) {
            throw new \Exception(get_class($this) . ': Entity cant be empty');
        }

        if (is_null($this->_post)) {
            throw new \Exception(get_class($this) . ': Post cant be empty');
        }

        if (is_null($this->_meta)) {
            $this->_meta = get_post_meta($this->_post->ID);
        }

        return $this;
    }

    /**
     * @param Attribute $attribute
     * @return mixed
     * @throws \Exception
     */
    protected function _fromMapper(Attribute $attribute)
    {
        if (!class_exists($attribute->getMapper('post_to_entity'))) {
            return '';
        }

        /** @var PostToEntityAbstract $mapper */
        $name   = $attribute->getMapper('post_to_entity');
        $mapper = new $name();
        $mapper->setPost($this->_post);
        $mapper->setMeta($this->_meta);
        $mapper->setReferenceClass($this);
        $mapper->setParentEntity($this->_entity);
        $mapper->setAttribute($attribute);
        return $mapper->convert();
    }

    /**
     * @param Attribute $attribute
     * @return $this
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     */
    protected function _setValue(Attribute $attribute, $value)
    {
        if (!$attribute->getSkyhub() || !$value) {
            return $this;
        }

        $method = $this->_helper()->getSetterMethodName($this->_entity, $attribute->getSkyhub());

        if (!$method) {
            return $this;
        }

        $this->_entity->$method($value);
    }

    /**
     * @param Attribute $attribute
     * @return mixed|null
     */
    protected function _getPostValue(Attribute $attribute)
    {
        $post       = $this->_post->to_array();
        $postAttr   = $attribute->getWordpress();

        if (isset($post[$postAttr])) {
            return $post[$postAttr];
        }

        if (isset($this->_meta[$postAttr])) {
            return current($this->_meta[$postAttr]);
        }

        return null;
    }
}
