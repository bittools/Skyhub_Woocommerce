<?php

return array(
    'id'                        => array(
        'code'          => 'id',
        'default_local' => 'ID'
    ),
    'post_title'        => array(
        'default_local' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Post\Title::class
        ),
        'mapper'        => 'manual'
    ),
    'post_status'       => array(
        'default_local' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Post\Status::class
        ),
        'mapper'        => 'manual'
    ),
    'comment_status'       => array(
        'default_local' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Post\CommentStatus::class
        ),
        'mapper'        => 'manual'
    ),
    'ping_status'       => array(
        'default_local' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Post\PingStatus::class
        ),
        'mapper'        => 'manual'
    ),
    'post_password'     => array(
        'default_local' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Post\PostPassword::class
        ),
        'mapper'        => 'manual'
    ),
    'post_type'         => array(
        'default_local' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Post\PostType::class
        ),
        'mapper'        => 'manual'
    ),
    'code'                      => array(
        'code'          => 'code',
        'default_local' => '_order_key'
    ),
    'channel'                   => array(
        'code'          => 'channel',
        'default_local' => '_skyhub_order_channel'
    ),
    'placed_at'                 => array(
        'code'          => 'placed_at',
        'default_local' => 'post_date'
    ),
    'updated_at'                => array(
        'code'          => 'updated_at',
        'default_local' => 'post_modified'
    ),
    'total_ordered'             => array(
        'code'          => 'total_ordered',
        'default_local' => '_order_total'
    ),
    'interest'                  => array(
        'code'          => 'interest',
        'default_local' => '_skyhub_order_interest'
    ),
    'shipping_cost'             => array(
        'code'          => 'shipping_cost',
        'default_local' => '_order_shipping'
    ),
    'shipping_method'           => array(
        'code'          => 'shipping_method',
        'default_local' => '_skyhub_order_shipping_method'
    ),
    'estimated_delivery'        => array(
        'code'          => 'estimated_delivery',
        'default_local' => '_skyhub_estimated_delivery'
    ),
    'shipping_address'          => array(
        'code'          => 'shipping_address',
        'default_local' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Address\Post::class
        )
    ),
    'billing_address'           => array(
        'code'          => 'billing_address',
        'default_local' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Address\Post::class
        )
    ),
    'customer'                  => array(
        'code'          => 'customer',
        'default_local' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Customer\Post::class
        )
    ),
    'items'                     => array(
        'code'          => 'items',
        'default_local' => null
    ),
    /*
    'status'                    => array(
        'code'          => 'status',
        'default_local' => null
    ),
    */
    'invoices'                  => array(
        'code'          => 'invoices',
        'default_local' => null
    ),
    'shipments'                 => array(
        'code'          => 'shipments',
        'default_local' => null
    ),
    'sync_status'               => array(
        'code'          => 'sync_status',
        'default_local' => '_skyhub_sync_status'
    ),
    'calculation_type'          => array(
        'code'          => 'calculation_type',
        'default_local' => '_skyhub_calculation_type'
    ),
    'shipping_carrier'          => array(
        'code'          => 'shipping_carrier',
        'default_local' => '_skyhub_shipping_carrier'
    ),
    'tags'                      => array(
        'code'          => 'tags',
        'default_local' => '_skyhub_tags'
    ),
    'payments'                  => array(
        'code'          => 'payments',
        'default_local' => null
    ),
    'estimated_delivery_shift'  => array(
        'code'          => 'estimated_delivery_shift',
        'default_local' => '_skyhub_estimated_delivery_shift'
    )
);
