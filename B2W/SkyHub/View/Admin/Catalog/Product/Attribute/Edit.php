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

namespace B2W\SkyHub\View\Admin\Catalog\Product\Attribute;

use B2W\SkyHub\Model\Map\MapAttribute;
use B2W\SkyHub\Model\Map\ProductMap;
use B2W\SkyHub\View\Admin\Admin;
use B2W\SkyHub\View\Admin\Attribute\EditAbstract;

/**
 * Class Edit
 * @package B2W\SkyHub\View\Admin\Catalog\Product\Attribute
 */
class Edit extends EditAbstract
{
    /**
     * @var string
     */
    protected $_config      = 'catalog/product/attribute/skyhub';
    /**
     * @var string
     */
    protected $_entity   = 'catalog/product';
    /**
     * @var string
     */
    protected $_redirect = Admin::SLUG_CATALOG_PRODUCT_ATTRIBUTE_LIST;

    /**
     * @return ProductMap
     */
    protected function _loadMapInstance()
    {
        return new ProductMap();
    }

    /**
     * @param MapAttribute $attribute
     * @return Field|mixed|string
     */
    public function renderField(MapAttribute $attribute)
    {
        $field = new Field();
        $field->setValue($attribute->getWordpress());
        return $field->render();
    }
}
