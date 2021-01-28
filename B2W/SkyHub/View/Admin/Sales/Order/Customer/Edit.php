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

namespace B2W\SkyHub\View\Admin\Sales\Order\Customer;

use B2W\SkyHub\Model\Map\MapAttribute;
use B2W\SkyHub\Model\Map\CustomerMap;
use B2W\SkyHub\View\Admin\Admin;
use B2W\SkyHub\View\Admin\Attribute\EditAbstract;
use B2W\SkyHub\View\Admin\Form\Field\Text;

/**
 * Class Edit
 * @package B2W\SkyHub\View\Admin\Catalog\Product\Attribute
 */
class Edit extends EditAbstract
{
    /**
     * @var string
     */
    protected $_config      = 'map/customer';
    /**
     * @var string
     */
    protected $_entity      = 'customer';
    /**
     * @var string
     */
    protected $_redirect    = Admin::SLUG_SALES_ORDER_CUSTOMER_ATTRIBUTE_LIST;

    /**
     * @return \B2W\SkyHub\Model\Map\MapAbstract|CustomerMap
     */
    protected function _loadMapInstance()
    {
        return new CustomerMap();
    }

    /**
     * @param MapAttribute $attribute
     * @return Text|mixed|string
     */
    public function renderField(MapAttribute $attribute)
    {
        $field = new Text();
        $field->setName('related-attribute');
        $field->setValue($attribute->getWordpress());
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
