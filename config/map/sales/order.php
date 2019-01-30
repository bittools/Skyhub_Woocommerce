<?php

return array(
    'id'                       => array(
        'skyhub'    => 'id',
        'wordpress' => 'ID'
    ),
    'code'                     => array(
        'skyhub'    => 'code',
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
        'skyhub'    => 'customer',
        'wordpress' => '_customer_user',
        'mapper'    => array(
            'entity_to_db'   => \B2W\SkyHub\Model\Transformer\Sales\Order\Customer\EntityToDb::class,
            'post_to_entity' => \B2W\SkyHub\Model\Transformer\Sales\Order\Customer\PostToEntity::class,
            'api_to_entity'  => \B2W\SkyHub\Model\Transformer\Sales\Order\Customer\ApiToEntity::class,
        )
    ),
    'shipping_address'         => array(
        'skyhub' => 'shipping_address',
        'mapper' => array(
            'entity_to_db'   => \B2W\SkyHub\Model\Transformer\Sales\Order\Address\EntityToDb::class,
            'post_to_entity' => \B2W\SkyHub\Model\Transformer\Sales\Order\Address\PostToEntity::class,
            'api_to_entity'  => \B2W\SkyHub\Model\Transformer\Sales\Order\Address\ApiToEntity::class,
        )
    ),
    'billing_address'          => array(
        'skyhub' => 'billing_address',
        'mapper' => array(
            'entity_to_db'   => \B2W\SkyHub\Model\Transformer\Sales\Order\Address\EntityToDb::class,
            'post_to_entity' => \B2W\SkyHub\Model\Transformer\Sales\Order\Address\PostToEntity::class,
            'api_to_entity'  => \B2W\SkyHub\Model\Transformer\Sales\Order\Address\ApiToEntity::class,
        )
    ),
    'invoices'                 => array(
        'skyhub' => 'invoices',
        'mapper' => array(
            'entity_to_db'  => \B2W\SkyHub\Model\Transformer\Sales\Order\Invoice\EntityToDb::class,
            'api_to_entity' => \B2W\SkyHub\Model\Transformer\Sales\Order\Invoice\ApiToEntity::class
        )
    ),
    'shipments'                => array(
        'skyhub'    => 'shipments',
        'wordpress' => null
    ),
    'sync_status'              => array(
        'skyhub'    => 'sync_status',
        'wordpress' => '_skyhub_sync_status'
    ),
    'status'                   => array(
        'skyhub'    => 'status',
        'wordpress' => 'post_status',
        'mapper'    => array(
            'entity_to_db'   => \B2W\SkyHub\Model\Transformer\Sales\Order\Status\EntityToDb::class,
            'post_to_entity' => \B2W\SkyHub\Model\Transformer\Sales\Order\Status\PostToEntity::class,
            'api_to_entity'  => \B2W\SkyHub\Model\Transformer\Sales\Order\Status\ApiToEntity::class,
        ),
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
        'wordpress' => 'post_title',
        'mapper'    => array(
            'entity_to_db' => \B2W\SkyHub\Model\Transformer\Sales\Order\Misc\PostTitle::class
        )
    ),

    'comment_status'         => array(
        'wordpress' => 'comment_status',
        'mapper'    => array(
            'entity_to_db' => \B2W\SkyHub\Model\Transformer\Sales\Order\Misc\CommentStatus::class
        ),
    ),
    'ping_status'            => array(
        'wordpress' => 'ping_status',
        'mapper'    => array(
            'entity_to_db' => \B2W\SkyHub\Model\Transformer\Sales\Order\Misc\PingStatus::class
        ),
    ),
    'post_password'          => array(
        'wordpress' => 'post_password',
        'mapper'    => array(
            'entity_to_db' => \B2W\SkyHub\Model\Transformer\Sales\Order\Misc\PostPassword::class
        ),
    ),
    'post_type'              => array(
        'wordpress' => 'post_type',
        'mapper'    => array(
            'entity_to_db' => \B2W\SkyHub\Model\Transformer\Sales\Order\Misc\PostType::class
        ),
    ),
    'billing_address_index'  => array(
        'wordpress' => '_billing_address_index',
        'mapper'    => array(
            'entity_to_db' => \B2W\SkyHub\Model\Transformer\Sales\Order\Misc\AddressIndex::class
        )
    ),
    'shipping_address_index' => array(
        'wordpress' => '_shipping_address_index',
        'mapper'    => array(
            'entity_to_db' => \B2W\SkyHub\Model\Transformer\Sales\Order\Misc\AddressIndex::class
        )
    ),
    'billing_first_name'     => array(
        'wordpress' => '_billing_first_name',
        'mapper'    => array(
            'entity_to_db' => \B2W\SkyHub\Model\Transformer\Sales\Order\Misc\FirstName::class
        )
    ),
    'billing_last_name'      => array(
        'wordpress' => '_billing_last_name',
        'mapper'    => array(
            'entity_to_db' => \B2W\SkyHub\Model\Transformer\Sales\Order\Misc\LastName::class
        )
    ),
    'shipping_first_name'    => array(
        'wordpress' => '_shipping_first_name',
        'mapper'    => array(
            'entity_to_db' => \B2W\SkyHub\Model\Transformer\Sales\Order\Misc\FirstName::class
        )
    ),
    'shipping_last_name'     => array(
        'wordpress' => '_shipping_last_name',
        'mapper'    => array(
            'entity_to_db' => \B2W\SkyHub\Model\Transformer\Sales\Order\Misc\LastName::class
        )
    ),
    'billing_cpf'            => array(
        'wordpress' => '_billing_cpf',
        'mapper'    => array(
            'entity_to_db' => \B2W\SkyHub\Model\Transformer\Sales\Order\Misc\CpfCnpj::class
        )
    ),
    'billing_cnpj'           => array(
        'wordpress' => '_billing_cnpj',
        'mapper'    => array(
            'entity_to_db' => \B2W\SkyHub\Model\Transformer\Sales\Order\Misc\CpfCnpj::class
        )
    ),
    'billing_email'          => array(
        'wordpress' => '_billing_email',
        'mapper'    => array(
            'entity_to_db' => \B2W\SkyHub\Model\Transformer\Sales\Order\Misc\Email::class
        )
    ),
    'person_type'            => array(
        'wordpress' => '_person_type',
        'mapper'    => array(
            'entity_to_db' => \B2W\SkyHub\Model\Transformer\Sales\Order\Misc\PersonType::class
        )
    ),
    'items'                  => array(
        'skyhub' => 'items',
        'mapper' => array(
            'post_to_entity' => \B2W\SkyHub\Model\Transformer\Sales\Order\Item\PostToEntity::class,
            'api_to_entity'  => \B2W\SkyHub\Model\Transformer\Sales\Order\Item\ApiToEntity::class,
        )
    )
);
