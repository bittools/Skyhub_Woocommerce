<?php

return array(
    array(
        'event'     => 'admin_menu',
        'class'     => B2W\SkyHub\View\Admin\Admin::class,
        'method'    => 'menu'
    ),
    array(
        'event'     => 'admin_post',
        'class'     => \B2W\SkyHub\Controller\Admin\Attribute::class,
        'method'    => 'save'
    ),
    /*
    array(
        'event'     => 'save_post',
        'class'     => B2W\SkyHub\Controller\Admin\Catalog\Product::class,
        'method'    => 'onSave'
    )
    */
);
