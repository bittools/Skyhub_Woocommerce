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

namespace B2W\SkyHub\Model\Transformer\Order\Item\Misc;


use B2W\SkyHub\Model\Transformer\EntityToDbAbstract;

/**
 * Class OriginalPrice
 * @package B2W\SkyHub\Model\Transformer\Order\Item\Misc
 */
class OrderItemType extends EntityToDbAbstract
{
    /**
     * @return mixed|null
     */
    protected function _getMapInstance()
    {
        return null;
    }

    /**
     * @return string
     */
    public function convert()
    {
        return 'line_item';
    }
}