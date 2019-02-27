<?php
/**
 * BSeller - B2W Companhia Digital
 *
 * DISCLAIMER
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @copyright     Copyright (c) 2019 B2W Companhia Digital. (http://www.bseller.com.br/)
 * @author        Tiago Tescaro <tiago.tescaro@b2wdigital.com>
 */
namespace B2W\SkyHub\View\Admin\Settings\Api;

use B2W\SkyHub\View\Admin\Form\FormAbstract;
use B2W\SkyHub\Model\Entity\SettingsApiEntity;

class View extends FormAbstract
{
    /**
     * @return $this|mixed
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     */
    protected function _prepareForm()
    {
        $settingsApi = new SettingsApiEntity();
        $settingsApi->map();
        $fieldset = $this->_addFieldset('api', 'API');
        $fieldset->addField(
            'text',
            'email',
            array(
                'label'   => 'Email',
                'value'   => $settingsApi->getEmail()
            )
        );
        $fieldset->addField(
            'text',
            'apiKey',
            array(
                'label'   => 'API Key',
                'value'   => $settingsApi->getApiKey()
            )
        );
        $fieldset->addField(
            'select',
            'order_inegration',
            array(
                'label'   => 'Integração de Pedido',
                'value'   => $settingsApi->getOrderIntegration(),
                'options' => $this->getEventSchedules()
            )
        );
        $fieldset->addField(
            'select',
            'order_inegration_api',
            array(
                'label'   => 'Receber Pedido da API',
                'value'   => $settingsApi->getOrderIntegrationApi(),
                'options' => $this->getEventSchedules()
            )
        );
        $fieldset->addField(
            'select',
            'product_inegration',
            array(
                'label'   => 'Integração de Produto',
                'value'   => $settingsApi->getProductIntegration(),
                'options' => $this->getEventSchedules()
            )
        );
        return $this;
    }

    protected function getEventSchedules()
    {
        $event = array(
            'hourly'     => array( 'interval' => HOUR_IN_SECONDS,      'display' => __( 'Once Hourly' ) ),
            'twicedaily' => array( 'interval' => 12 * HOUR_IN_SECONDS, 'display' => __( 'Twice Daily' ) ),
            'daily'      => array( 'interval' => DAY_IN_SECONDS,       'display' => __( 'Once Daily' ) ),
            'every_minute' => array( 'interval' => MINUTE_IN_SECONDS,       'display' => __( 'Every Minute' ) ),
        );

        $options = array();
        foreach ($event as $key=>$value) {
            $options[] = array(
                'value' => $key,
                'label' => $value['display']
            );
        }
        return $options;
    }
}