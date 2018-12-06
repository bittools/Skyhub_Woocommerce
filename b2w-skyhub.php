<?php

/*
if (!defined( 'ABSPATH')) {
    exit;
}
*/

spl_autoload_register(function ($className) {
    $path   = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    $file   = __DIR__ . DIRECTORY_SEPARATOR . $path;
    if (file_exists($file)) {
        require_once($file);
    }
});

//TESTE
$orders = \B2W\Skyhub\Order\Factory::all();
print_r($orders);
