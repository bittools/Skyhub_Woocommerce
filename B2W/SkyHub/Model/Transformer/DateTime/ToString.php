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

namespace B2W\SkyHub\Model\Transformer\DateTime;

class ToString
{
    /**
     * @param \DateTime $object
     * @return mixed
     */
    public function convert(\DateTime $object)
    {
        return $object->format('Y-m-d H:i:s');
    }
}
