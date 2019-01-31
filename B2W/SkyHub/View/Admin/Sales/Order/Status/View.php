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

namespace B2W\SkyHub\View\Admin\Sales\Order\Status;

use B2W\SkyHub\Model\Map\Order\StatusMap;
use B2W\SkyHub\View\Admin\Admin;
use B2W\SkyHub\View\Admin\Form\FormAbstract;

/**
 * Class View
 * @package B2W\SkyHub\View\Admin\Sales\Order\Status
 */
class View extends FormAbstract
{
    /**
     * @return $this|mixed
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     */
    protected function _prepareForm()
    {
        $fieldset = $this->_addFieldset('status', 'Status');

        $map = new StatusMap();

        $fieldset->addField(
            'select',
            'status_new',
            array(
                'label'   => _('New Order Statuses', Admin::DOMAIN),
                'note'    => _('When order has NEW type in skyhub', Admin::DOMAIN),
                'options' => $this->_getStatuses(),
                'value'   => $map->map()->getItemByKey('skyhub', 'new')->getWordpress()
            )
        );

        $fieldset->addField(
            'select',
            'status_approved',
            array(
                'label'   => _('Approved Order Statuses', Admin::DOMAIN),
                'note'    => _('When order has APPROVED type in skyhub', Admin::DOMAIN),
                'options' => $this->_getStatuses(),
                'value'   => $map->map()->getItemByKey('skyhub', 'approved')->getWordpress()
            )
        );

        $fieldset->addField(
            'select',
            'status_delivered',
            array(
                'label'   => _('Approved Order Statuses', Admin::DOMAIN),
                'note'    => _('When order has DELIVERED type in skyhub', Admin::DOMAIN),
                'options' => $this->_getStatuses(),
                'value'   => $map->map()->getItemByKey('skyhub', 'delivered')->getWordpress()
            )
        );

        $fieldset->addField(
            'select',
            'status_shipment_exception',
            array(
                'label'   => _('Approved Order Statuses', Admin::DOMAIN),
                'note'    => _('When order has SHIPMENT_EXCEPTION type in skyhub', Admin::DOMAIN),
                'options' => $this->_getStatuses(),
                'value'   => $map->map()->getItemByKey('skyhub', 'shipment_exception')->getWordpress()
            )
        );

        return $this;
    }

    /**
     * @return array
     */
    protected function _getStatuses()
    {
        $ret = array();
        $statuses = wc_get_order_statuses();

        foreach ($statuses as $k => $v) {
            $ret[] = array(
                'value' => $k,
                'label' => $k . ' : ' . $v
            );
        }

        return $ret;
    }
}
