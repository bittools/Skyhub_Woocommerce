<?php

namespace B2W\SkyHub\Helper\Catalog\Product;

use B2W\SkyHub\Contracts\Catalog\Product\Attribute\Entity;

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

class Attribute
{
    /**
     * @param Entity $attribute
     * @param $value
     * @return bool|mixed
     */
    public function getOption(Entity $attribute, $value)
    {
        foreach ($attribute->getOptions() as $option) {
            if ($option->getCode() == $value) {
                return $option;
            }
        }

        return false;
    }
}
