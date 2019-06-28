<?php
/**
 * BSeller - B2W Companhia Digital
 *
 * DISCLAIMER
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @copyright     Copyright (c) 2019 B2W Companhia Digital. (http://www.bseller.com.br/)
 * @author        Luiz Tucillo <luiz.tucillo@e-smart.com.br>
 * @author        Tiago Tescaro <tiago.tescaro@b2wdigital.com>
 */

namespace B2W\SkyHub\View\Admin;

use B2W\SkyHub\Model\Map\MapAttribute;
use B2W\SkyHub\Model\Map\MapAbstract;
use B2W\SkyHub\View\Admin\GridAbstract;

/**
 * Class GridAttributeAbstract
 * @package B2W\SkyHub\View
 */
abstract class GridAttributeAbstract extends GridAbstract
{
    const COLUMN_SKYHUB_CODE    = 'skyhub_code';
    const COLUMN_LOCAL_CODE     = 'local_code';
    const COLUMN_SKYHUB_NAME    = 'skyhub_name';
    const COLUMN_DESCRIPTION    = 'description';

    protected $_options         = null;

    /**
     * @return MapAbstract
     */
    abstract public function _getMap();
    abstract public function _getEditSlug();

    /**
     * Attribute constructor.
     * @param array $args
     */
    public function __construct($args = array())
    {
        parent::__construct(
            array(
                'singular'  => 'product_attribute',
                'plural'    => 'product_attributes',
                'ajax'      => false
            )
        );
    }

    /**
     * @return array
     */
    public function get_columns()
    {
        return array(
            self::COLUMN_SKYHUB_NAME    => __('Attribute', Admin::DOMAIN),
            self::COLUMN_SKYHUB_CODE    => __('SkyHub Code', Admin::DOMAIN),
            self::COLUMN_LOCAL_CODE     => __('Woocommerce Code', Admin::DOMAIN),
        );
    }

    protected function _loadItems()
    {
        /** @var MapAbstract $map */
        $map = $this->_getMap();

        /** @var MapAttribute $attr */
        foreach ($map->map() as $attr) {

            if (!$attr->canShowInAdmin()) {
                continue;
            }

            $href   = admin_url() . 'admin.php?page=' . $this->_getEditSlug() . '&attribute=' . $attr->getSkyhub();
            $wpAttr = $attr->getWordpress() . '<br /><a href="'.$href.'">' . __('edit', Admin::DOMAIN) . '</a>';

            $this->items[] = array(
                self::COLUMN_SKYHUB_CODE    => $attr->getSkyhub(),
                self::COLUMN_LOCAL_CODE     => $wpAttr,
                self::COLUMN_SKYHUB_NAME    => $attr->getLabel()
            );
        }
    }
}
