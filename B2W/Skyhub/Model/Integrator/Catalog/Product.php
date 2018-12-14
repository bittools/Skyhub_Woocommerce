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

namespace B2W\Skyhub\Integrator\Catalog;

class Product
{
    public function one()
    {
        $email  = 'testemodulo@skyhub.com.br';
        $apiKey = 'k28PJT7_upjVJbjuPBpD';
        $api    = new \SkyHub\Api($email, $apiKey);
        $requestHandler = $api->product();
    }
}
