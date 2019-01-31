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

namespace B2W\SkyHub\View\Admin\Catalog\Product\Attribute;

use B2W\SkyHub\Model\Map\MapAbstract;
use B2W\SkyHub\Model\Map\ProductMap;
use B2W\SkyHub\View\Admin\Admin;
use B2W\SkyHub\View\Admin\GridAbstract;

/**
 * Class Grid
 * @package B2W\SkyHub\View\Admin\Catalog\Product\Attribute
 */
class Grid extends GridAbstract
{
    /**
     * @return ProductMap|MapAbstract
     */
    public function _getMap()
    {
        return new ProductMap();
    }

    /**
     * @return string
     */
    public function _getEditSlug()
    {
        return Admin::SLUG_CATALOG_PRODUCT_ATTRIBUTE_EDIT;
    }
}
