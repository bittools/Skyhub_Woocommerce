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

namespace B2W\SkyHub\Model\Map\Product;

use B2W\SkyHub\Model\Map\MapAbstract;

/**
 * Class VariationMap
 * @package B2W\SkyHub\Model\Map\Sales\Order
 */
class VariationMap extends MapAbstract
{
    /**
     * @return mixed|string
     */
    protected function _getConfigPath()
    {
        return 'map/product/variation';
    }

    /**
     * @return null
     */
    protected function _getOptionsName()
    {
        return null;
    }
}
