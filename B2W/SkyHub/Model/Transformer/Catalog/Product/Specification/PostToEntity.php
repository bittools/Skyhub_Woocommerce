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

namespace B2W\SkyHub\Model\Transformer\Catalog\Product\Specification;

use B2W\SkyHub\Model\Resource\Catalog\Product\Specification\Collection;
use B2W\SkyHub\Model\Catalog\Product\Specification\Entity;
use B2W\SkyHub\Model\Transformer\PostToEntityAbstract;

/**
 * Class PostToEntity
 * @package B2W\SkyHub\Model\Transformer\Catalog\Product\Specification
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
     * @return Collection|null
     * @throws \B2W\SkyHub\Exception\Data\RepositoryNotFound
     */
    public function convert()
    {
        $data       = isset($this->_meta['_product_attributes']) ? $this->_meta['_product_attributes'] : false;
        $collection = new Collection();

        if (!$data) {
            return $collection;
        }

        $data   = unserialize(current($data));

        foreach ($data as $attr => $options) {

            $spec   = new Entity();

            if (!isset($options['value']) || empty($options['value'])) {
                continue;
            }

            $attrName   = str_replace('pa_', '', $attr);
            $attr       = \App::repository(\App::REPOSITORY_CATALOG_ATTRIBUTE)->code($attrName);

            $spec->setAttribute($attr)
                ->setValue();

            $collection->addItem($spec);
        }

        return $collection;
    }
}
