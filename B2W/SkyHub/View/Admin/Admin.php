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

namespace B2W\SkyHub\View\Admin;

use B2W\SkyHub\Controller\Admin\Catalog\Product;
use B2W\SkyHub\View\Admin\Catalog\Product\Attribute\Edit;
use B2W\SkyHub\View\Admin\Catalog\Product\Attribute\Page;
use B2W\SkyHub\View\Admin\Sales\Order\Status\View;

class Admin
{
    const SLUG          = 'woocommerce-b2w-skyhub';
    const PERMISSION    = 'manage_options';
    const DOMAIN        = 'b2w_skyhub';

    const SLUG_CATALOG_PRODUCT_ATTRIBUTE_LIST      = 'catalog-product-list';
    const SLUG_CATALOG_PRODUCT_ATTRIBUTE_EDIT      = 'catalog-product-edit';
    const SLUG_SALES_ORDER_CUSTOMER_ATTRIBUTE_LIST = 'sales-order-customer-list';
    const SLUG_SALES_ORDER_CUSTOMER_ATTRIBUTE_EDIT = 'sales-order-customer-edit';
    const SLUG_SALES_ORDER_ADDRESS_ATTRIBUTE_LIST  = 'sales-order-address-list';
    const SLUG_SALES_ORDER_ADDRESS_ATTRIBUTE_EDIT  = 'sales-order-address-edit';
    const SLUG_SALES_ORDER_STATUS_EDIT             = 'sales-order-status-edit';
    const SLUG_SETTINGS_API_EDIT                   = 'settings-api-view';
    const SLUG_LOG_INTEGRACAO_SKYHUB_LIST          = 'log-integracao-skyhub-list';
    const SLUG_QUEUE_INTEGRATION_SKYHUB_LIST       = 'queue-integration-skyhub-list';
    const SLUG_QUEUE_INTEGRATION_SKYHUB_EXECUTE    = 'queue-integration-skyhub-execute';

    public function menu()
    {
        add_menu_page(
            'SkyHub',
            'SkyHub',
            self::PERMISSION,
            self::SLUG,
            array(new View(), 'render'),
            'dashicons-tickets'
        );

        $this->_prepareSettingsMenu();
        $this->_prepareProductMenu();
        $this->_prepareOrderMenu();
        $this->_prepareQueueIntegrationMenu();
        $this->_prepareLogIntegrationMenu();

        return $this;
    }

    protected function _prepareProductMenu()
    {
        $attributesPage = new Page();

        add_submenu_page(
            self::SLUG,
            __('Product Attributes', self::DOMAIN),
            __('Product Attributes', self::DOMAIN),
            self::PERMISSION,
            self::SLUG_CATALOG_PRODUCT_ATTRIBUTE_LIST,
            array($attributesPage, 'render')
        );

        add_submenu_page(
            null,
            __('Product Attribute Edit', self::DOMAIN),
            __('Product Attribute Edit', self::DOMAIN),
            self::PERMISSION,
            self::SLUG_CATALOG_PRODUCT_ATTRIBUTE_EDIT,
            array(new Edit(), 'render')
        );

        return $this;
    }

    protected function _prepareOrderMenu()
    {
        /**
         * CUSTOMER
         */
        add_submenu_page(
            self::SLUG,
            __('Customer Attributes', self::DOMAIN),
            __('Customer Attributes', self::DOMAIN),
            self::PERMISSION,
            self::SLUG_SALES_ORDER_CUSTOMER_ATTRIBUTE_LIST,
            array(new \B2W\SkyHub\View\Admin\Sales\Order\Customer\Page(), 'render')
        );

        add_submenu_page(
            null,
            __('Customer Attribute Edit', self::DOMAIN),
            __('Customer Attribute Edit', self::DOMAIN),
            self::PERMISSION,
            self::SLUG_SALES_ORDER_CUSTOMER_ATTRIBUTE_EDIT,
            array(new \B2W\SkyHub\View\Admin\Sales\Order\Customer\Edit(), 'render')
        );

        /**
         * ADDRESS
         */
        add_submenu_page(
            self::SLUG,
            __('Address Attributes', self::DOMAIN),
            __('Address Attributes', self::DOMAIN),
            self::PERMISSION,
            self::SLUG_SALES_ORDER_ADDRESS_ATTRIBUTE_LIST,
            array(new \B2W\SkyHub\View\Admin\Sales\Order\Address\Page(), 'render')
        );

        add_submenu_page(
            null,
            __('Customer Attribute Edit', self::DOMAIN),
            __('Customer Attribute Edit', self::DOMAIN),
            self::PERMISSION,
            self::SLUG_SALES_ORDER_ADDRESS_ATTRIBUTE_EDIT,
            array(new \B2W\SkyHub\View\Admin\Sales\Order\Address\Edit(), 'render')
        );
    }

    /**
     * Menu Settings API
     */
    protected function _prepareSettingsMenu()
    {
        add_submenu_page(
            self::SLUG,
            __('Settings API', self::DOMAIN),
            __('Settings API', self::DOMAIN),
            self::PERMISSION,
            self::SLUG_SETTINGS_API_EDIT,
            array(new \B2W\SkyHub\View\Admin\Settings\Api\View(), 'render')
        );
    }

    /**
     * Menu Logs erros
     */
    protected function _prepareLogIntegrationMenu()
    {
        add_submenu_page(
            self::SLUG,
            __('Log Integration Error', self::DOMAIN),
            __('Log Integration Error', self::DOMAIN),
            self::PERMISSION,
            self::SLUG_LOG_INTEGRACAO_SKYHUB_LIST,
            array(new \B2W\SkyHub\View\Admin\Log\Integracao\SkyHub\Page(), 'render')
        );
    }

    /**
     * Menu Queue Integrations
     */
    protected function _prepareQueueIntegrationMenu()
    {
        add_submenu_page(
            self::SLUG,
            __('Queue Integration', self::DOMAIN),
            __('Queue Integration', self::DOMAIN),
            self::PERMISSION,
            self::SLUG_QUEUE_INTEGRATION_SKYHUB_LIST,
            array(new \B2W\SkyHub\View\Admin\Queue\Integration\SkyHub\Page(), 'render')
        );
    }
}
