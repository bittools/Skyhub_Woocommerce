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

namespace B2W\Skyhub\Model\Catalog\Product\Attribute;

use B2W\Skyhub\Contracts\Catalog\Product\Attribute\Option;

/**
 * Class Entity
 * @package B2W\Skyhub\Model\Catalog\Product\Attribute
 */
class Entity implements \B2W\Skyhub\Contracts\Catalog\Product\Attribute\Entity
{
    protected $_id;
    protected $_code;
    protected $_label;
    /**
     * @var \B2W\Skyhub\Model\Catalog\Product\Attribute\Option\Collection
     */
    protected $_options = null;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     * @return Entity
     */
    public function setId($id)
    {
        $this->_id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->_code;
    }

    /**
     * @param mixed $code
     * @return Entity
     */
    public function setCode($code)
    {
        $this->_code = $code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->_label;
    }

    /**
     * @param mixed $label
     * @return Entity
     */
    public function setLabel($label)
    {
        $this->_label = $label;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOptions()
    {
        return $this->_options;
    }

    /**
     * @param Option\Entity $option
     * @return $this
     */
    public function addOption(Option\Entity $option)
    {
        if (is_null($this->_options)) {
            $this->_options = new \B2W\Skyhub\Model\Catalog\Product\Attribute\Option\Collection();
        }

        $this->_options->addItem($option);

        return $this;
    }
}