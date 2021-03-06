<?php
/**
 * BSeller - B2W Companhia Digital
 *
 * DISCLAIMER
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @copyright     Copyright (c) 2017 B2W Companhia Digital. (http://www.bseller.com.br/)
 * Access https://ajuda.skyhub.com.br/hc/pt-br/requests/new for questions and other requests.
 */

namespace B2W\SkyHub\Model\Transformer\Product\Price;

use B2W\SkyHub\Model\Transformer\DbToEntityAbstract;

/**
 * Class DbToEntity
 * @package B2W\SkyHub\Model\Transformer\Product\Price
 */
class DbToEntity extends DbToEntityAbstract
{
    /**
     * @return null
     */
    protected function _getEntityInstance()
    {
        return null;
    }

    /**
     * @return array|mixed
     */
    protected function _getAttributeMap()
    {
        return array();
    }

    /**
     * @return mixed|null
     */
    public function convert()
    {
        if (!isset($this->_meta['_regular_price'])) {
            return null;
        }

        return count($this->_meta['_regular_price']) > 1
            ? null
            : current($this->_meta['_regular_price']);
    }
}
