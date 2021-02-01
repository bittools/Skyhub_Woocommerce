<?php
/**
 * BSeller - B2W Companhia Digital
 *
 * DISCLAIMER
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @copyright     Copyright (c) 2019 B2W Companhia Digital. (http://www.bseller.com.br/)
 * Access https://ajuda.skyhub.com.br/hc/pt-br/requests/new for questions and other requests.
 */
namespace B2W\SkyHub\View\Admin\Queue\Integration\SkyHub;

use B2W\SkyHub\View\Admin\GridAbstract;
use B2W\SkyHub\Exception\Exception;
use B2W\SkyHub\Model\Entity\QueueEntity;
use B2W\SkyHub\View\Admin\Admin;

class Grid extends GridAbstract
{
    /**
     * Return head table
     * 
     * @return Array
     */
    public function get_columns()
    {
        return Array(
            'action'        => "<input type='checkbox' class='itemQueue' onclick='selectQueueAll();' id='itemQueueAll' value='' />",
            'id'            => __('ID', Admin::DOMAIN),
            'type'          => __('Type of Integration', Admin::DOMAIN),
            'status'        => __('Status', Admin::DOMAIN),
            'created_at'    => __("Date Created", Admin::DOMAIN),
            'param'         => __("Parameters", Admin::DOMAIN),
        );
    }

    /**
     * Load data queue
     */
    protected function _loadItems()
    {
        $collection = \App::repository(\App::REPOSITORY_QUEUE)->getDataQueue();

        if (!$collection) {
            return false;
        }

        foreach ($collection as $obj) {
            /** @var B2W\SkyHub\Model\Entity\QueueEntity $obj */
            $this->items[] = [
                'action' => "<input type='checkbox' class='itemQueue' name='itemQueue[]' value='{$obj->getId()}' />",
                'id' => $obj->getId(),
                'type' => $obj->getType(),
                'status' =>  __($obj->getStatus(), Admin::DOMAIN),
                'created_at' => $obj->getCreatedAt(),
                'param' => $obj->getParam()
            ];
        }
    }
}