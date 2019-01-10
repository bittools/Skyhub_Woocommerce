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

namespace B2W\SkyHub\Model\Sales\Order;

/**
 * Class Map
 * @package B2W\SkyHub\Model\Sales\Order
 */
class Map
{
    /**
     * @var null
     */
    protected $_map = null;

    /**
     * @return array|null
     */
    public function map()
    {
        if (is_null($this->_map)) {

            $config     = \App::config('sales/order/skyhub');
            $this->_map = array();

            foreach ($config as $attribute) {

                if (!isset($attribute['default_local']) && empty($attribute['default_local'])) {
                    continue;
                }

                $this->_map[$attribute['code']] = array(
                    'skyhub'    => $attribute['code'],
                    'local'     => isset($attribute['default_local']) ? $attribute['default_local'] : ''
                );
            }
        }

        return $this->_map;
    }
}
