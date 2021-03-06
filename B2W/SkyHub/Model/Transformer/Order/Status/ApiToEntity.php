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

namespace B2W\SkyHub\Model\Transformer\Order\Status;

use B2W\SkyHub\Model\Entity\Order\StatusEntity;
use B2W\SkyHub\Model\Map\Order\StatusMap;
use B2W\SkyHub\Model\Transformer\ApiToEntityAbstract;

/**
 * Class ApiToEntity
 * @package B2W\SkyHub\Model\Transformer\Order\Status
 */
class ApiToEntity extends ApiToEntityAbstract
{
    /**
     * @return mixed|null
     */
    protected function _getEntityInstance()
    {
        return null;
    }

    /**
     * @return mixed|null
     */
    protected function _getMapInstance()
    {
        return null;
    }

    /**
     * @return mixed|null
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     */
    public function convert()
    {
        $data = $this->_prepareData();

        $wcStatus   = wc_get_order_statuses();
        $map        = new StatusMap();
        $code       = $map->map()->getItemByKey('skyhub', trim(strtolower($data['type'])))->getWordpress();

        $status = new StatusEntity();
        $status->setType($data['type']);
        $status->setCode($code);
        $status->setLabel(isset($wcStatus[$code]) ? $wcStatus[$code] : '');


        return $status;
    }
}
