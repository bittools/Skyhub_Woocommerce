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

namespace B2W\SkyHub\Model\Resource;

use B2W\SkyHub\Contracts\Resource\Collection;

/**
 * Class CollectionAbstract
 * @package B2W\SkyHub\Data
 */
abstract class CollectionAbstract implements Collection
{
    /**
     * @var int
     */
    protected $_size = 0;
    /**
     * @var array
     */
    protected $_items       = array();
    /**
     * @var int
     */
    protected $_position    = 0;

    /**
     * @param $item
     * @return $this|mixed
     */
    public function addItem($item)
    {
        $this->_items[] = $item;
        $this->_size ++;
        return $this;
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return $this->_items[$this->_position];
    }

    /**
     * @return void
     */
    public function next()
    {
        ++$this->_position;
    }

    /**
     * @return int|mixed
     */
    public function key()
    {
        return $this->_position;
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return isset($this->_items[$this->_position]);
    }

    /**
     * @return void
     */
    public function rewind()
    {
        $this->_position = 0;
    }

    /**
     * @param $key
     * @param $value
     * @return bool|mixed
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     */
    public function getItemByKey($key, $value)
    {
        foreach ($this->_items as $item) {
            $method = \App::helper('app')->getGetterMethodName($item, $key);

            if (!$method) {
                continue;
            }

            if ($item->$method() == $value) {
                return $item;
            }
        }

        return false;
    }

    /**
     * @return int
     */
    public function size()
    {
        return $this->_size;
    }

    /**
     * @return bool|mixed
     */
    public function first()
    {
        foreach ($this->_items as $item) {
            return $item;
        }

        return false;
    }
}
