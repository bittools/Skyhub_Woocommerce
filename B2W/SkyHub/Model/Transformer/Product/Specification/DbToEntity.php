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

namespace B2W\SkyHub\Model\Transformer\Product\Specification;

use B2W\SkyHub\Model\Entity\Product\SpecificationEntity;
use B2W\SkyHub\Model\Resource\Collection;
use B2W\SkyHub\Model\Transformer\DbToEntityAbstract;

/**
 * Class DbToEntity
 * @package B2W\SkyHub\Model\Transformer\Product\Specification
 */
class DbToEntity extends DbToEntityAbstract
{
    /**
     * @return SpecificationEntity|null
     */
    protected function _getEntityInstance()
    {
        return new SpecificationEntity();
    }

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

            $spec   = new SpecificationEntity();

            if (!isset($options['value']) || empty($options['value'])) {
                continue;
            }

            $attrName   = str_replace('pa_', '', $attr);
            $spec->setAttribute($attrName)
                ->setValue($options['value']);

            $collection->addItem($spec);
        }

        return $collection;
    }
}
