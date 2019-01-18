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

namespace B2W\SkyHub\View\Admin\Sales\Order\Customer;

use B2W\SkyHub\Model\Sales\Order\Customer\Map;
use B2W\SkyHub\View\Admin\Admin;
use B2W\SkyHub\View\Admin\Attribute\EditAbstract;
use B2W\SkyHub\View\Admin\Attribute\Field\Text;

/**
 * Class Edit
 * @package B2W\SkyHub\View\Admin\Catalog\Product\Attribute
 */
class Edit extends EditAbstract
{
    /**
     * @var string
     */
    protected $_config      = 'map/sales/order/customer';
    /**
     * @var string
     */
    protected $_entity      = 'sales/order/customer';
    /**
     * @var string
     */
    protected $_redirect    = Admin::SLUG_SALES_ORDER_CUSTOMER_ATTRIBUTE_LIST;

    /**
     * @return \B2W\SkyHub\Model\MapAbstract|Map
     */
    protected function _loadMapInstance()
    {
        return new Map();
    }

    /**
     * @param $value
     * @return Text|mixed|string
     */
    public function renderField($value)
    {
        $field = new Text();
        $field->setValue($value);
        $field->addNote(__('Use + signal to concatenate multiple attributes', Admin::DOMAIN));
        return $field->render();
    }

    /**
     * @param $attr
     * @param $value
     * @return bool
     */
    public function validate($attr, $value)
    {
        $config = \App::config($this->_config);

        if (isset($config[$attr]['show_in_admin']) && $config[$attr]['show_in_admin'] == false) {
            return false;
        }

        return parent::validate($attr, $value);
    }
}
