<?php
/**
 * BSeller - B2W Companhia Digital
 *
 * DISCLAIMER
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @copyright     Copyright (c) 2017 B2W Companhia Digital. (http://www.bseller.com.br/)
 * @author        Luiz Tucillo <luiz.tucillo@e-smart.com.br>
 */

final class App
{
    const LOG_FILE_DEFAULT                  = 'woocommerce-b2w-skyhub.log';
    const LOG_FILE_EXCEPTION                = 'woocommerce-b2w-skyhub-exception.log';

    const REPOSITORY_CATALOG_PRODUCT        = 'catalog/product';
    const REPOSITORY_CATALOG_CATEGORY       = 'catalog/product/category';
    const REPOSITORY_CATALOG_ATTRIUBUTE     = 'catalog/product/attribute';
    const REPOSITORY_SALES_ORDER_CUSTOMER   = 'sales/order/customer';
    const REPOSITORY_SALES_ORDER            = 'sales/order';
    const REPOSITORY_SALES_ORDER_ITEM       = 'sales/order/item';
    const REPOSITORY_SALES_ORDER_ADDRESS    = 'sales/order/address';

    /** @var \SkyHub\Api */
    static protected $_api                  = null;

    /** @var array  */
    static protected $_config               = array();
    static protected $_helpers              = array();

    /**
     * @return App|bool
     * @throws Exception
     */
    public static function run()
    {
        static $instance = false;

        if ($instance === false) {
            $instance = new static();
        }

        return $instance;
    }

    /**
     * @param $entity
     * @param string $type
     * @return \B2W\SkyHub\Contracts\Resource\Repository|\B2W\SkyHub\Contracts\Resource\Sales\Order\Repository|\B2W\SkyHub\Contracts\Resource\Sales\Order\Address\Repository
     * @throws \B2W\SkyHub\Exception\Data\RepositoryNotFound
     */
    public static function repository($entity, $type = 'db')
    {
        $type       = ucfirst($type);
        $name       = implode(
            '\\',
            array_map(
                function($item) {
                    return ucfirst($item);
                },
                explode('/', $entity)
            )
        );
        $className  = '\B2W\SkyHub\Model\\' . $name . '\Repository';
        $repo       = $className . '\\' . $type;

        if (!class_exists($repo)) {
            throw new \B2W\SkyHub\Exception\Data\RepositoryNotFound();
        }

        return $repo::instantiate();
    }

    /**
     * @param $name
     * @return mixed
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     */
    public static function helper($name)
    {
        $name       = implode(
            '\\',
            array_map(
                function($item) {
                    return ucfirst($item);
                },
                explode('/', $name)
            )
        );

        $className  = '\B2W\SkyHub\Helper\\' . $name;
        if (!class_exists($className)) {
            throw new \B2W\SkyHub\Exception\Helper\HelperNotFound();
        }

        if (!isset(self::$_helpers[$className])) {
            self::$_helpers[$className] = new $className();
        }

        return self::$_helpers[$className];
    }

    /**
     * @param $path
     * @param null $key
     * @return array|mixed|null
     */
    public static function config($path, $key = null)
    {
        if (!isset(static::$_config[$path])) {
            $dir    = str_replace('/', DS, $path);
            $file   = __DIR__ . DS . 'config' . DS . $dir . '.php';

            if (file_exists($file)) {
                $data = require($file);
                static::$_config[$path] = $data;
            }
        }

        //return if dont exists file
        if (!isset(static::$_config[$path]) || empty(static::$_config[$path])) {
            return array();
        }

        //if not key sent, return full result
        if (empty($key) && isset(static::$_config[$path])) {
            return static::$_config[$path];
        }

        $config     = static::$_config[$path];
        $parts      = explode('/', $key);
        $partsCount = count($parts);

        for ($i = 0; $i < $partsCount; $i ++) {
            if (!isset($config[$parts[$i]])) {
                return null;
            }

            $config = $config[$parts[$i]];
        }

        return $config;
    }

    /**
     * @return string
     */
    public static function getBaseDir()
    {
        return __DIR__;
    }

    /**
     * @param $eventName
     * @param $params
     * @return bool|mixed
     */
    public static function dispatchEvent($eventName, $params)
    {
        //default wordpress
        do_action($eventName, $params);
        return;
    }

    /**
     * @param $message
     * @param null $level
     * @param null $file
     * @param bool $force
     */
    public static function log($message, $level = null, $file = null, $force = false)
    {
        $level  = $level ?: Monolog\Logger::INFO;
        $file   = $file?: self::LOG_FILE_DEFAULT;
        $path   = __DIR__ . DS . 'log' . DS;

        if (is_array($message)) {
            $message = print_r($message, true);
        }

        $formatter = new Monolog\Formatter\LineFormatter(
            null,
            null,
            true,
            true
        );

        $handler = new \Monolog\Handler\RotatingFileHandler($path . $file);
        $handler->setFormatter($formatter);

        $logger = new Monolog\Logger('woocommerce-b2w-skyhub');
        $logger->pushHandler($handler);
        $logger->log($level, $message);

        return;
    }

    /**
     * @param Exception $e
     */
    public static function logException(Exception $e)
    {
        static::log("\n" . $e->__toString(), Monolog\Logger::ERROR, self::LOG_FILE_EXCEPTION);
    }

    /**
     * @return \SkyHub\Api
     */
    public static function api()
    {
        if (is_null(static::$_api)) {
            static::$_api = \B2W\SkyHub\Model\Api::instantiate()->api();
        }

        return static::$_api;
    }


    /**
     *
     *
     * Start of instance scope
     *
     *
     */


    /**
     * App constructor.
     * @throws Exception
     */
    private function __construct()
    {
        spl_autoload_register(array($this, 'autoload'));

        $this->_init();

        return $this;
    }


    /**
     * @param $className
     * @return $this
     */
    public function autoload($className)
    {
        if (class_exists($className)) {
            return $this;
        }

        $file   = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
        $path   = __DIR__ . DIRECTORY_SEPARATOR . $file;

        if (file_exists($path)) {
            require_once($path);
        }

        return $this;
    }


    /**
     * @return $this
     */
    private function __clone()
    {
        return $this;
    }

    protected function _init()
    {
        /** Register observers */
        add_action('woocommerce_payment_complete', array($this, 'menu'));

        $this->_admin();

        $this->_test();

        return $this;
    }


    /**
     * @return $this
     */
    protected function _admin()
    {
        $admin = new \B2W\SkyHub\View\Admin\Admin();
        $admin->init();

        return $this;
    }

    protected function _test()
    {
        $order = \App::repository(self::REPOSITORY_SALES_ORDER, 'api')->one('Americanas-1547741367249');
        $order->loadData();
        $order->save();

        echo '<pre>';
        print_r($order);
        die;
    }
}
