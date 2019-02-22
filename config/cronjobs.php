<?php

$order = new \B2W\SkyHub\Model\Cron\Order\Integration();
$product = new \B2W\SkyHub\Model\Cron\Product\Integration();
return array(
    array(
        'timestamp' => time(),
        'recurrence' => 'every_minute',
        'hook' => 'b2w_skyhub_order_inegration',
        'jobs' => array(
            $order,
            'execute'
        )
    ),
    array(
        'timestamp' => time(),
        'recurrence' => 'every_minute',
        'hook' => 'b2w_skyhub_order_inegration_api',
        'jobs' => array(
            $order,
            'executeApi'
        )
    ),
    array(
        'timestamp' => time(),
        'recurrence' => 'every_minute',
        'hook' => 'b2w_skyhub_product_inegration',
        'jobs' => array(
            $product,
            'execute'
        )
    )
);