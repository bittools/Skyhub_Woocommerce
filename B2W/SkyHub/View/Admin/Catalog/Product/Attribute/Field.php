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

use B2W\SkyHub\View\Admin\Form\Field\Select;

/**
 * Class Field
 * @package B2W\SkyHub\View\Admin\Catalog\Product\Attribute
 */
class Field extends Select
{
    /**
     * @return array|mixed
     * @throws \B2W\SkyHub\Exception\Data\RepositoryNotFound
     */
    public function getOptions()
    {
        $base = array(
            '_sku',
            '_regular_price',
            '_sale_price',
            '_weight',
            '_length',
            '_width',
            '_height',
            '_stock',
            '_price',
            'post_title',
            'post_content',
            'post_status'
        );

        /** @var Entity $attribute */
        foreach (\App::repository(\App::REPOSITORY_PRODUCT_ATTRIBUTE)->all() as $attribute) {
            $base[] = $attribute->getCode();
        }

        return $base;
    }

    /**
     * @return null|string
     */
    public function getName()
    {
        return 'related-attribute';
    }
}
