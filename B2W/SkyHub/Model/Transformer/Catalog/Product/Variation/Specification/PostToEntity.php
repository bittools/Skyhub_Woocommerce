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

namespace B2W\SkyHub\Model\Transformer\Catalog\Product\Variation\Specification;

use B2W\SkyHub\Model\Transformer\PostToEntityAbstract;

/**
 * Class PostToEntity
 * @package B2W\SkyHub\Model\Transformer\Catalog\Product\Variation\Specification
 */
class PostToEntity extends PostToEntityAbstract
{
    /**
     * @return array|mixed
     */
    protected function _getAttributeMap()
    {
        return array();
    }

    /**
     * @return \B2W\SkyHub\Model\Resource\Catalog\Product\Specification\Collection|null
     * @throws \B2W\SkyHub\Exception\Data\RepositoryNotFound
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     */
    public function _getEntityInstance()
    {
        $collection = new \B2W\SkyHub\Model\Resource\Catalog\Product\Specification\Collection();

        foreach ($this->_meta as $key => $meta) {
            if (strpos($key, 'attribute_pa_') !== 0) {
                continue;
            }

            $code       = str_replace('attribute_pa_', '', $key);
            $value      = current($meta);
            $attribute  = \App::repository(\App::REPOSITORY_CATALOG_ATTRIBUTE)->code($code);
            $option     = \App::helper('catalog/product/attribute')->getOption($attribute, $value);

            $spec = new \B2W\SkyHub\Model\Catalog\Product\Specification\Entity();
            $spec->setAttribute($attribute)
                ->setOption($option);

            $collection->addItem($spec);
        }

        return $collection;
    }
}
