<?php

return array(
    'name'                  => array(
        'code'          => 'name',
        'label'         => 'Customer Name',
        'description'   => 'Customer name',
        'type'          => 'string',
        'validation'    => null,
        'required'      => 1,
        'entity'        => 'sales/order',
        'show_in_admin' => false,
        'default_local' => array(
            '_billing_first_name',
            '_billing_last_name'
        )
    ),
    'email'                 => array(
        'code'          => 'email',
        'label'         => 'Customer e-mail',
        'description'   => 'Customer e-mail',
        'type'          => 'string',
        'validation'    => null,
        'required'      => 1,
        'entity'        => 'sales/order',
        'default_local' => '_billing_email'
    ),
    'date_of_birth'         => array(
        'code'          => 'date_of_birth',
        'label'         => 'Customer Date of Birth',
        'description'   => 'Customer Date of Birth',
        'type'          => 'string',
        'validation'    => null,
        'required'      => 0,
        'entity'        => 'sales/order',
        'default_local' => '_billing_birthdate'
    ),
    'gender'                => array(
        'code'          => 'gender',
        'label'         => 'Customer Gender',
        'description'   => 'Customer Gender',
        'type'          => 'string',
        'validation'    => null,
        'required'      => 0,
        'entity'        => 'sales/order',
        'default_local' => '_billing_sex'
    ),
    'cpf'               => array(
        'code'          => 'vat_number',
        'label'         => 'Customer CPF',
        'description'   => 'Customer CPF',
        'type'          => 'string',
        'validation'    => null,
        'required'      => 0,
        'entity'        => 'sales/order',
        'default_local' => '_billing_cpf'
    ),
    'cnpj'              => array(
        'code'          => 'vat_number',
        'label'         => 'Customer CNPJ',
        'description'   => 'Customer CNPJ',
        'type'          => 'string',
        'validation'    => null,
        'required'      => 0,
        'entity'        => 'sales/order',
        'default_local' => '_billing_cnpj'
    ),
    'phones'                => array(
        'code'          => 'phones',
        'label'         => 'Customer Phone List',
        'description'   => 'Customer Phone List',
        'type'          => 'array',
        'validation'    => null,
        'required'      => 0,
        'entity'        => 'sales/order',
        'default_local' => '_billing_phone'
    ),
    'state_registration'    => array(
        'code'          => 'state_registration',
        'label'         => 'Customer Phone List',
        'description'   => 'Customer Phone List',
        'type'          => 'array',
        'validation'    => null,
        'required'      => 0,
        'entity'        => 'sales/order',
        'default_local' => '_billing_ie'
    ),
);
