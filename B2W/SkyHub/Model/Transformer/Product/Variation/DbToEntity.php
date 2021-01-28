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

namespace B2W\SkyHub\Model\Transformer\Product\Variation;

use B2W\SkyHub\Model\Entity\Product\VariationEntity;
use B2W\SkyHub\Model\Map\Product\VariationMap;
use B2W\SkyHub\Model\Transformer\DbToEntityAbstract;

/**
 * Class DbToEntity
 * @package B2W\SkyHub\Model\Transformer\Product\Variation
 */
class DbToEntity extends DbToEntityAbstract
{
    /**
     * @return array|mixed
     */
    protected function _getAttributeMap()
    {
        $map = new VariationMap();
        return $map->map();
    }

    /**
     * @return VariationEntity|null
     */
    public function _getEntityInstance()
    {
        return new VariationEntity();
    }
}
