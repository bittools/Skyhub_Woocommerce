<?php

return array(
    array(
        'event'  => 'admin_menu',
        'class'  => B2W\SkyHub\View\Admin\Admin::class,
        'method' => 'menu'
    ),
    array(
        'event'  => 'admin_post',
        'class'  => \B2W\SkyHub\Controller\Admin\Attribute::class,
        'method' => 'save'
    ),
    array(
        'event'  => 'admin_post',
        'class'  => \B2W\SkyHub\Controller\Admin\Status::class,
        'method' => 'save'
    ),
    array(
        'event'  => 'woocommerce_order_status_changed',
        'class'  => \B2W\SkyHub\Controller\Order::class,
        'method' => 'update'
    )
    /*
    array(
        'event'     => 'save_post',
        'class'     => B2W\SkyHub\Controller\Product::class,
        'method'    => 'onSave'
    )
    */
);
