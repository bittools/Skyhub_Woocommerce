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

namespace B2W\SkyHub\View\Admin\Form\Field;

/**
 * Class Select
 * @package B2W\SkyHub\View\Admin\Form\Field
 */
class Select extends FieldAbstract
{
    /**
     * @var string
     */
    protected $_template    = 'admin/attribute/field/select.php';
    /**
     * @var array
     */
    protected $_options = array();

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->_options;
    }

    /**
     * @param $array
     * @return $this
     */
    public function setOptions($array)
    {
        $this->_options = $array;
        return $this;
    }
}
