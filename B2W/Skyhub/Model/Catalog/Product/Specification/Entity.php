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

namespace B2W\Skyhub\Model\Catalog\Product\Specification;

/**
 * Class Entity
 * @package B2W\Skyhub\Model\Catalog\Product
 */
class Entity implements \B2W\Skyhub\Contracts\Catalog\Product\Specification\Entity
{
    protected $_attribute = null;
    protected $_value = null;

    /**
     * @return null
     */
    public function getAttribute()
    {
        return $this->_attribute;
    }

    /**
     * @param \B2W\Skyhub\Contracts\Catalog\Product\Attribute\Entity $attribute
     * @return mixed|void
     */
    public function setAttribute(\B2W\Skyhub\Contracts\Catalog\Product\Attribute\Entity $attribute)
    {
        $this->_attribute = $attribute;
        return $this;
    }

    /**
     * @return null
     */
    public function getValue()
    {
        return $this->_value;
    }

    /**
     * @param $value
     * @return $this|mixed
     */
    public function setValue($value)
    {
        $this->_value = $value;
        return $this;
    }
}
