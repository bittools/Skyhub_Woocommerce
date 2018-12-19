<?php

return array(
    'sku'               => array(
        'code'          => 'sku',
        'label'         => 'Product SKU',
        'description'   => 'The products main SKU (Stock Keeping Unit)',
        'type'          => 'string',
        'validation'    => null,
        'required'      => 1,
        'default_local' => '_sku'
    ),
    'name'              => array(
        'code'          => 'name',
        'label'         => 'Product Name',
        'description'   => 'The products name',
        'type'          => 'string',
        'validation'    => '',
        'required'      => 1,
        'default_local' => 'post_title'
    ),
    'description'       => array(
        'code'          => 'description',
        'label'         => 'Product Description',
        'description'   => 'The products description',
        'type'          => 'string',
        'validation'    => '',
        'required'      => 1,
        'default_local' => 'post_content'
    ),
    'status'            => array(
        'code'          => 'status',
        'label'         => 'Product Status',
        'description'   => 'The product status that identifies if the product is enabled or disabled',
        'type'          => 'boolean',
        'validation'    => '',
        'required'      => 1,
        'default_local' => 'post_status'
    ),
    'qty'               => array(
        'code'          => 'qty',
        'label'         => 'Product Stock Quantity',
        'description'   => 'The products stock quantity available in store',
        'type'          => 'float',
        'validation'    => '',
        'required'      => 1,
        'default_local' => '_stock'
    ),
    'price'             => array(
        'code'          => 'price',
        'label'         => 'Product Price',
        'description'   => 'The products current price',
        'type'          => 'float',
        'validation'    => '',
        'required'      => 1,
        'default_local' => '_price'
    ),
    'promotional_price' => array(
        'code'          => 'promotional_price',
        'label'         => 'Product Promotional Price',
        'description'   => 'The products current promotional price',
        'type'          => 'float',
        'validation'    => '',
        'required'      => 0,
        'default_local' => ''
    ),
    'cost'              => array(
        'code'          => 'cost',
        'label'         => 'Product Cost',
        'description'   => 'The products cost',
        'type'          => 'float',
        'validation'    => '',
        'required'      => 0,
        'default_local' => ''
    ),
    'weight'            => array(
        'code'          => 'weight',
        'label'         => 'Product Weight',
        'description'   => 'The products weight (in kilograms)',
        'type'          => 'float',
        'validation'    => '',
        'required'      => 1,
        'default_local' => '_weight'
    ),
    'height'            => array(
        'code'          => 'height',
        'label'         => 'Product Height',
        'description'   => 'The products height (in centimeters)',
        'type'          => 'float',
        'validation'    => '',
        'required'      => 1,
        'default_local' => '_height'
    ),
    'width'             => array(
        'code'          => 'width',
        'label'         => 'Product Width',
        'description'   => 'TThe products width (in centimeters)',
        'type'          => 'float',
        'validation'    => '',
        'required'      => 1,
        'default_local' => '_width'
    ),
    'length'            => array(
        'code'          => 'length',
        'label'         => 'Product Length',
        'description'   => 'The products length (in centimeters)',
        'type'          => 'float',
        'validation'    => '',
        'required'      => 1,
        'default_local' => '_length'
    ),
    'brand'             => array(
        'code'          => 'brand',
        'label'         => 'Product Brand',
        'description'   => 'The products brand',
        'type'          => 'string',
        'validation'    => '',
        'required'      => 0,
        'default_local' => ''
    ),
    'ean'               => array(
        'code'          => 'ean',
        'label'         => 'Product EAN',
        'description'   => 'The products valid EAN number',
        'type'          => 'string',
        'validation'    => '',
        'required'      => 0,
        'default_local' => ''
    ),
    'nbm'               => array(
        'code'          => 'nbm',
        'label'         => 'Product NBM',
        'description'   => 'The products valid NBM',
        'type'          => 'string',
        'validation'    => '',
        'required'      => 0,
        'default_local' => ''
    ),
);
