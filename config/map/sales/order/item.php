<?php

return array(
    'name'            => array(
        'skyhub'    => 'name',
        'wordpress' => 'order_item_name'
    ),
    'qty'             => array(
        'skyhub'    => 'qty',
        'wordpress' => '_qty'
    ),
    'original_price'  => array(
        'skyhub'    => 'original_price',
        'wordpress' => '_line_subtotal',
        'mapper'    => array(
            'entity_to_db'  => \B2W\SkyHub\Model\Transformer\Sales\Order\Item\Misc\OriginalPrice::class
        )
    ),
    'special_price'   => array(
        'skyhub'    => 'special_price',
        'wordpress' => '_skyhub_special_price'
    ),
    'shipping_cost'   => array(
        'skyhub'    => 'shipping_cost',
        'wordpress' => '_skyhub_shipping_cost'
    ),
    'order_item_type' => array(
        'wordpress' => 'order_item_type',
        'mapper'    => array(
            'entity_to_db'  => \B2W\SkyHub\Model\Transformer\Sales\Order\Item\Misc\OrderItemType::class
        )
    ),
    'order_id'        => array(
        'wordpress' => 'order_id',
        'mapper'    => array()
    ),
);
