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

namespace B2W\Skyhub\Model\Catalog\Product\Converter\Post;

use B2W\Skyhub\Model\Catalog\Product\Attribute\Map;
use B2W\Skyhub\Model\Data\Converter\Post\EntityAbstract;

/**
 * Class Entity
 * @package B2W\Skyhub\Contracts\Catalog\Product\Converter\Post
 */
class Entity extends EntityAbstract
{
    /**
     * @return $this|mixed
     */
    protected function _init()
    {
        $map = new Map();

        $this->_addMap('ID', 'id');

        foreach ($map->map() as $item) {
            $this->_addMap($item['local'], $item['skyhub']);
        }

        return $this;
    }
}
