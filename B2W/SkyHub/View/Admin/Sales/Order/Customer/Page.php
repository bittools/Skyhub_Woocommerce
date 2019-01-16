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

use B2W\SkyHub\View\Template;

class Page extends Template
{
    protected $_template = 'admin/attribute/grid.php';

    public function table()
    {
        if (!class_exists('WP_List_Table')) {
            require_once(ABSPATH . 'wp-admin' . DS . 'includes' . DS . 'class-wp-list-table.php');
        }

        $table = new \B2W\SkyHub\View\Admin\Sales\Order\Customer\Grid();
        $table->prepare_items();
        $table->display();
    }
}
