<?php

return array(
    'new'                => array(
        'skyhub'    => 'new',
        'wordpress' => 'wc-pending'
    ),
    'approved'           => array(
        'skyhub'    => 'approved',
        'wordpress' => 'wc-processing'
    ),
    'delivered'          => array(
        'skyhub'    => 'delivered',
        'wordpress' => 'wc-completed'
    ),
    'shipment_exception' => array(
        'skyhub'    => 'shipment_exception',
        'wordpress' => 'wc-failed'
    )
);
