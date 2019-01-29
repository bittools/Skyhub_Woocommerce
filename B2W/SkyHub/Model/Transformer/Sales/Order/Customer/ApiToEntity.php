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

namespace B2W\SkyHub\Model\Transformer\Sales\Order\Customer;

use B2W\SkyHub\Model\Resource\Sales\Order\Customer\Repository\Db;
use B2W\SkyHub\Model\Sales\Order\Customer\Entity;
use B2W\SkyHub\Model\Map\Sales\Order\Customer\Map;
use B2W\SkyHub\Model\Transformer\ApiToEntityAbstract;

/**
 * Class ApiToEntity
 * @package B2W\SkyHub\Model\Transformer\Sales\Order\Customer
 */
class ApiToEntity extends ApiToEntityAbstract
{
    /**
     * @return Map|mixed
     */
    protected function _getMapInstance()
    {
        return new Map();
    }

    public function _getEntityInstance()
    {
        $data       = $this->_response->toArray();
        $document   = preg_replace('/[^0-9]+/', '', $data['customer']['vat_number']);
        /** @var Db $repo */
        $repo       = \App::repository('sales/order/customer');
        $customer   = strlen($document) <= 11 ? $repo->cpf($document) : $repo->cnpj($document);
        return $customer ? $customer : new Entity();
    }
}
