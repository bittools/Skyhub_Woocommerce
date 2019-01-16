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

namespace B2W\SkyHub\Model;


abstract class MapAbstract
{
    protected $_option  = null;
    protected $_map     = null;
    protected $_config  = null;

    /**
     * @return array
     */
    public function map()
    {
        if (is_null($this->_map)) {
            $options = get_option($this->_option, null);

            if (is_null($options)) {
                $options = serialize($this->_createDefaultAttributeMap());
                add_option($this->_option, $options);
            }

            $this->_map = unserialize($options);
        }

        return $this->_map;
    }

    /**
     * @param $skyhubAttributeCode
     * @return bool|string
     */
    public function attribute($skyhubAttributeCode)
    {
        $map = $this->map();

        foreach ($map as $attribute) {
            if ($attribute['skyhub'] == $skyhubAttributeCode) {
                return $this->_prepareString($attribute['local']);
            }
        }

        return false;
    }

    /**
     * @param $attr
     * @param $related
     * @return bool
     */
    public function setRelated($attr, $related)
    {
        $map = $this->map();

        if (!isset($map[$attr])) {
            return false;
        }

        if (strpos($related, '+') !== false) {
            $related = explode('+', $related);
            $related = array_map(function($v) {
                return trim($v);
            }, $related);
        }

        $map[$attr]['local'] = $related;

        $this->_map = $map;

        return true;
    }

    /**
     * @return $this
     */
    public function save()
    {
        $map = $this->map();
        update_option($this->_option, serialize($map));

        return $this;
    }

    /**
     * @return array
     */
    private function _createDefaultAttributeMap()
    {
        $config = \App::config($this->_config);
        $map = array();
        foreach ($config as $attribute) {

            $map[$attribute['code']] = array(
                'skyhub'    => $attribute['code'],
                'local'     => isset($attribute['default_local']) ? $attribute['default_local'] : ''
            );
        }

        return $map;
    }

    protected function _prepareString($value)
    {
        if (is_array($value)) {
            return implode(' + ', $value);
        }

        return $value;
    }
}
