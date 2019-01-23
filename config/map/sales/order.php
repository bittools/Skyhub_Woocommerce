<?php

return array(
    'id'                       => array(
        'skyhub'    => 'id',
        'wordpress' => 'ID'
    ),
    'skyhub'                   => array(
        'skyhub'    => 'skyhub',
        'wordpress' => '_order_key'
    ),
    'channel'                  => array(
        'skyhub'    => 'channel',
        'wordpress' => '_skyhub_order_channel'
    ),
    'placed_at'                => array(
        'skyhub'    => 'placed_at',
        'wordpress' => 'post_date'
    ),
    'updated_at'               => array(
        'skyhub'    => 'updated_at',
        'wordpress' => 'post_modified'
    ),
    'total_ordered'            => array(
        'skyhub'    => 'total_ordered',
        'wordpress' => '_order_total'
    ),
    'interest'                 => array(
        'skyhub'    => 'interest',
        'wordpress' => '_skyhub_order_interest'
    ),
    'shipping_cost'            => array(
        'skyhub'    => 'shipping_cost',
        'wordpress' => '_order_shipping'
    ),
    'shipping_method'          => array(
        'skyhub'    => 'shipping_method',
        'wordpress' => '_skyhub_order_shipping_method'
    ),
    'estimated_delivery'       => array(
        'skyhub'    => 'estimated_delivery',
        'wordpress' => '_skyhub_estimated_delivery'
    ),
    'customer'                 => array(
        'skyhub' => 'customer',
        'mapper' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Customer\EntityToPost::class,
            'post_to_entity' => \B2W\SkyHub\Model\Transformer\Sales\Order\Customer\PostToEntity::class
        )
    ),
    'shipping_address'         => array(
        'skyhub' => 'shipping_address',
        'mapper' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Address\Post::class,
            'post_to_entity' => \B2W\SkyHub\Model\Transformer\Sales\Order\Address\PostToEntity::class
        )
    ),
    'billing_address'          => array(
        'skyhub' => 'billing_address',
        'mapper' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Address\Post::class,
            'post_to_entity' => \B2W\SkyHub\Model\Transformer\Sales\Order\Address\PostToEntity::class
        )
    ),
    'invoices'                 => array(
        'skyhub'    => 'invoices',
        'wordpress' => null
    ),
    'shipments'                => array(
        'skyhub'    => 'shipments',
        'wordpress' => null
    ),
    'sync_status'              => array(
        'skyhub'    => 'sync_status',
        'wordpress' => '_skyhub_sync_status'
    ),
    'calculation_type'         => array(
        'skyhub'    => 'calculation_type',
        'wordpress' => '_skyhub_calculation_type'
    ),
    'shipping_carrier'         => array(
        'skyhub'    => 'shipping_carrier',
        'wordpress' => '_skyhub_shipping_carrier'
    ),
    'tags'                     => array(
        'skyhub'    => 'tags',
        'wordpress' => '_skyhub_tags'
    ),
    'payments'                 => array(
        'skyhub'    => 'payments',
        'wordpress' => null
    ),
    'estimated_delivery_shift' => array(
        'skyhub'    => 'estimated_delivery_shift',
        'wordpress' => '_skyhub_estimated_delivery_shift'
    ),
    /**
     *
     * CUSTOM FOR WOOCOMMERCE
     *
     */
    'post_title'               => array(
        'mapper' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Mapper\Post\Title::class
        )
    ),
    'post_status'              => array(
        'skyhub' => 'status',
        'mapper' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Mapper\Post\Status::class,
            'post_to_entity' => \B2W\SkyHub\Model\Transformer\Sales\Order\Status\PostToEntity::class
        ),
    ),
    'comment_status'           => array(
        'mapper' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Mapper\Post\CommentStatus::class
        ),
    ),
    'ping_status'              => array(
        'mapper' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Mapper\Post\PingStatus::class
        ),
    ),
    'post_password'            => array(
        'mapper' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Mapper\Post\PostPassword::class
        ),
    ),
    'post_type'                => array(
        'mapper' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Mapper\Post\PostType::class
        ),
    ),
    'billing_address_index'    => array(
        'skyhub' => 'billing_address',
        'mapper' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Mapper\Post\AddressIndex::class
        )
    ),
    'shipping_address_index'   => array(
        'skyhub' => 'shipping_address',
        'mapper' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Mapper\Post\AddressIndex::class
        )
    ),
    'billing_first_name'       => array(
        'skyhub' => 'billing_address',
        'mapper' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Mapper\Post\FirstName::class
        )
    ),
    'billing_last_name'        => array(
        'skyhub' => 'billing_address',
        'mapper' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Mapper\Post\LastName::class
        )
    ),
    'shipping_first_name'      => array(
        'skyhub' => 'shipping_address',
        'mapper' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Mapper\Post\FirstName::class
        )
    ),
    'shipping_last_name'       => array(
        'skyhub' => 'shipping_address',
        'mapper' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Mapper\Post\LastName::class
        )
    ),
    'billing_cpf'              => array(
        'mapper' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Mapper\Post\Cpf::class
        )
    ),
    'billing_cnpj'             => array(
        'mapper' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Mapper\Post\Cnpj::class
        )
    ),
    'person_type'              => array(
        'mapper' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Mapper\Post\PersonType::class
        )
    ),
    'items'                    => array(
        'skyhub' => 'items',
        'mapper' => array(
            'entity_to_post' => \B2W\SkyHub\Model\Transformer\Sales\Order\Item\Post::class,
            'post_to_entity' => \B2W\SkyHub\Model\Transformer\Sales\Order\Item\PostToEntity::class
        )
    )
);
