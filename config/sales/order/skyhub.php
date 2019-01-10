<?php

return array(
    'id'                        => array(
        'code'          => 'id',
        'default_local' => 'ID'
    ),
    'code'                      => array(
        'code'          => 'code',
        'default_local' => '_order_code'
    ),
    'channel'                   => array(
        'code'          => 'channel',
        'default_local' => '_order_channel'
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
        'default_local' => '_interest'
    ),
    'shipping_cost'             => array(
        'code'          => 'shipping_cost',
        'default_local' => '_skyhub_shipping_cost'
    ),
    'shipping_method'           => array(
        'code'          => 'shipping_method',
        'default_local' => '_skyhub_shipping_method'
    ),
    'estimated_delivery'        => array(
        'code'          => 'estimated_delivery',
        'default_local' => '_skyhub_estimated_delivery'
    ),
    'shipping_address'          => array(
        'code'          => 'shipping_address',
        'default_local' => null
    ),
    'billing_address'           => array(
        'code'          => 'billing_address',
        'default_local' => null
    ),
    'customer'                  => array(
        'code'          => 'customer',
        'default_local' => null
    ),
    'items'                     => array(
        'code'          => 'items',
        'default_local' => null
    ),
    'status'                    => array(
        'code'          => 'status',
        'default_local' => 'post_status'
    ),
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
