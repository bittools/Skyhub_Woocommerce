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

namespace B2W\SkyHub\Helper;

/**
 * Class App
 * @package B2W\SkyHub\Helper
 */
class App
{
    /**
     * @var array
     */
    protected $_underscoreCache = array();
    /**
     * @param $class
     * @param $attr
     * @return mixed
     */
    public function getSetterMethodName($class, $attr)
    {
        $name = 'set' . implode('', array_map('ucfirst', explode('_', $attr)));

        if (method_exists($class, $name)) {
            return $name;
        }

        return false;
    }

    /**
     * @param $class
     * @param $attr
     * @return bool|string
     */
    public function getGetterMethodName($class, $attr)
    {
        $name = 'get' . implode('', array_map('ucfirst', explode('_', $attr)));

        if (method_exists($class, $name)) {
            return $name;
        }

        return false;
    }

    /**
     * @param $name
     * @return mixed|string
     */
    public function underscore($name)
    {
        if (isset($this->_underscoreCache[$name])) {
            return $this->_underscoreCache[$name];
        }

        $result = strtolower(preg_replace('/(.)([A-Z])/', "$1_$2", $name));
        $this->_underscoreCache[$name] = $result;
        return $result;
    }
}
