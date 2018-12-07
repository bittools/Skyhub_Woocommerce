<?php

/**
 * Plugin Name: B2W Skyhub
 * Plugin URI:
 * Description: Módulo oficial de integração Woocommerce -> Skyhub
 * Version: 0.1.0
 * Author: Bit Tools
 * Author URI:
 * Text Domain: b2w-skyhub
 * Domain Path:
 *
 * @package WooCommerce
 */

if (!defined( 'ABSPATH')) {
    exit;
}

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

if (!defined('WC_ABSPATH')) {
    define('WC_ABSPATH', __DIR__ . DS . '..' . DS . 'woocommerce' . DS);
}

if (!defined('WC_PLUGIN_FILE')) {
    define('WC_PLUGIN_FILE', WC_ABSPATH . 'woocommerce.php');
}

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'App.php');

new App();
//TESTE
$repository = \B2W\Skyhub\Model\Catalog\Attribute\Factory::create();

echo '<pre>';
print_r($repository->all());
echo '</pre>';
