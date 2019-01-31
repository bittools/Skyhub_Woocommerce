<?php

return array(
    'id'             => array(
        'skyhub'    => 'id',
        'wordpress' => 'ID'
    ),
    'sku'            => array(
        'skyhub'    => 'sku',
        'wordpress' => '_sku'
    ),
    'qty'            => array(
        'skyhub'    => 'qty',
        'wordpress' => '_stock'
    ),
    'price'          => array(
        'skyhub'    => 'price',
        'wordpress' => '_price',
    ),
    'ean'            => array(
        'skyhub'    => 'ean',
        'wordpress' => ''
    ),
    'images'         => array(
        'skyhub' => 'images',
        'mapper' => array(
            'post_to_entity' => \B2W\SkyHub\Model\Transformer\Product\Image\PostToEntity::class
        )
    ),
    'specifications' => array(
        'skyhub' => 'specifications',
        'mapper' => array(
            'post_to_entity' => \B2W\SkyHub\Model\Transformer\Product\Variation\Specification\PostToEntity::class
        )
    ),
    'parent'         => array(
        'skyhub'    => 'parent_id',
        'wordpress' => 'post_parent'
    )
);