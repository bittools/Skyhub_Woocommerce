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
    const LOG_FILE_DEFAULT   = 'woocommerce-b2w-skyhub.log';
    const LOG_FILE_EXCEPTION = 'woocommerce-b2w-skyhub-exception.log';

    const REPOSITORY_PRODUCT           = 'product';
    const REPOSITORY_PRODUCT_API       = 'product/product';
    const REPOSITORY_CATEGORY          = 'category';
    const REPOSITORY_PRODUCT_ATTRIBUTE = 'product/attribute';
    const REPOSITORY_PRODUCT_VARIATION = 'product/variation';
    const REPOSITORY_CUSTOMER          = 'customer';
    const REPOSITORY_ORDER             = 'order';
    const REPOSITORY_ORDER_ITEM        = 'order/item';
    const REPOSITORY_ORDER_ADDRESS     = 'order/address';
    const REPOSITORY_ORDER_STATUS      = 'order/status';
    const REPOSITORY_QUEUE             = 'queue';

    /** @var \SkyHub\Api */
    static protected $_api = null;

    /** @var array */
    static protected $_helpers = array();
    /**
     * @var array
     */
    static protected $_transformers = array();
    static protected $_repositories = array();

    /**
     * @return App|bool
     * @throws Exception
     */
    static public function run()
    {
        static $instance = false;

        if ($instance === false) {
            $instance = new static();
        }

        return $instance;
    }

    /**
     * @return mixed
     */
    static public function version()
    {
        $data = get_plugin_data(self::getBaseDir() . DS . 'woocommerce-b2w-skyhub.php');
        return $data['Version'];
    }

    /**
     * @param $entity
     * @param string $type
     * @return mixed
     * @throws \B2W\SkyHub\Exception\Data\RepositoryNotFound
     */
    static public function repository($entity, $type = 'db')
    {
        $name = 'repository/' . strtolower($entity) . '_' . strtolower($type) . '_repository';
        $repo = self::getClassName($name);

        if (!class_exists($repo)) {
            throw new \B2W\SkyHub\Exception\Data\RepositoryNotFound($repo);
        }

        if (!isset(self::$_repositories[$repo])) {
            self::$_repositories[$repo] = new $repo();
        }

        return self::$_repositories[$repo];
    }

    /**
     * @param $entity
     * @return mixed
     * @throws \B2W\SkyHub\Exception\Data\RepositoryNotFound
     */
    static public function apiRepository($entity)
    {
        return self::repository($entity, 'api');
    }

    /**
     * @param $name
     * @return mixed
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     */
    static public function helper($name)
    {
        $className = self::getClassName($name, 'helper');

        if (!class_exists($className)) {
            throw new \B2W\SkyHub\Exception\Helper\HelperNotFound($className);
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
    static public function config($path, $key = null)
    {
        $config = \B2W\SkyHub\Model\Config::instantiate();
        return $config::config($path, $key);
    }

    /**
     * @return string
     */
    static public function getBaseDir()
    {
        return __DIR__;
    }

    /**
     * @param $eventName
     * @param $params
     * @return bool|mixed
     */
    static public function dispatchEvent($eventName, $params)
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
    static public function log($message, $level = null, $file = null, $force = false)
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
    static public function logException(Exception $e)
    {
        static::log("\n" . $e->__toString(), Monolog\Logger::ERROR, self::LOG_FILE_EXCEPTION);
    }

    /**
     * @return \SkyHub\Api
     */
    static public function api()
    {
        if (is_null(static::$_api)) {
            static::$_api = \B2W\SkyHub\Model\Api::instantiate()->api();
        }

        return static::$_api;
    }

    /**
     * @param $path
     * @param string $type
     * @return bool|string
     */
    static public function getClassName($path, $type = 'model')
    {
        $path       = trim($type, '/') . '/' . $path;
        $name       = implode(
            '\\',
            array_map(
                'ucfirst', array_map(
                    function($arrayPart) {
                        return implode(
                            '',
                            array_map(
                                'ucfirst',
                                explode('_', $arrayPart)
                            )
                        );
                    }, explode('/', $path)
                )
            )
        );

        return '\B2W\SkyHub\\' . $name;
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

        $this->_registerObservers();
        $this->_registerCronJobs();
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

    /**
     * @throws Exception
     */
    protected function _registerObservers()
    {
        foreach (self::config('observers') as $observer) {
            if (
                !isset($observer['event']) || empty($observer['event'])
                || !isset($observer['class']) || empty($observer['class'])
                || !isset($observer['method']) || empty($observer['method'])
            ) {
                continue;
            }

            $class = $observer['class'];

            if (!class_exists($class)) {
                throw new Exception('Class ' . $class . ' dont exists');
            }

            $onlyAdmin = isset($observer['admin']) && $observer['admin'] == true;

            if ($onlyAdmin && !is_admin()) {
                continue;
            }

            add_action($observer['event'], array(new $class(), $observer['method']), 10, 10);
        }
    }

    /**
     * @throws Exception
     * 
     * @return Boolean
     */
    protected function _registerCronJobs()
    {
        $jobs = new B2W\SkyHub\Model\Cron\Jobs();
        $jobs->registerCronJobs();
    }


    /**
     * Executed when module is activated in admin
     */
    public function activate()
    {
        //FUNCTION THAT RUNS WHEN PLUGIN IS ACTIVATED IN ADMIN
        $queue = new B2W\SkyHub\Model\Setup\Queue();
        $queue->install();
    }

    /**
     * @return $this
     * @throws Exception
     */
    protected function _init()
    {
        //add_action('init', array($this, 'test'));
        return $this;
    }

    /**
     * @throws \B2W\SkyHub\Exception\Data\RepositoryNotFound
     */
    public function test()
    {
        if (is_admin()) {
            return;
        }

        /** @var \B2W\SkyHub\Model\Entity\ProductEntity $product */
        //$product = \App::repository(\App::REPOSITORY_PRODUCT)->one(5);
        //$product = \App::repository(\App::REPOSITORY_PRODUCT_ATTRIBUTE)->getAttributeProduct(5);
        //echo '<Pre>';
        //print_r($product->toArray());
        //die;

        /*try{
            $queue = new \B2W\SkyHub\Model\Queue();
            $queue->run('product_update');
        } catch (Exception $e) {
            echo $e->getMessage();
        }*/


//        $customer = \App::repository(\App::REPOSITORY_CUSTOMER)->cpf('484.234.490-33');
//        echo '<Pre>';
//        print_r($customer);
//        die;

//        $status = \App::apiRepository(\App::REPOSITORY_ORDER_STATUS)->all();
//        echo '<pre>';
//        print_r($status->toArray());
//        die;


        try{
            /** @var \B2W\SkyHub\Model\Entity\OrderEntity $order */
            //$code = 'Americanas-1550689717229';
            $order = \App::repository(\App::REPOSITORY_ORDER, 'api')->queue();
//            $order->save();
            //\App::repository(\App::REPOSITORY_ORDER, 'api')->ack($order);
            //$order = \App::repository(\App::REPOSITORY_ORDER)->code($code);
            echo '<pre>';
            print_r($order);
        } catch (Exception $e) {
            echo 'ERROR';
        }
        
        //die;


//        $count  = 0;
//        $found  = true;
//
//        do {
//            try {
//                /** @var \B2W\SkyHub\Model\Repository\OrderApiRepository $repo */
//                $repo  = \App::repository(\App::REPOSITORY_ORDER, 'api');
//                $order = null;
//                $order = $repo->queue();
//                $order->save();
//                \App::repository(\App::REPOSITORY_ORDER, 'api')->ack($order);
//            } catch (\B2W\SkyHub\Exception\Api\OrderNotFoundException $e) {
//                $found = false;
//            } catch (Exception $e) {
//                \App::logException($e);
//            }
//
//            $count ++;
//        } while($count < 10 && $found === true);

        /*$queue = new \B2W\SkyHub\Model\Queue();
        $queue->run('order_update');*/
    }
}
