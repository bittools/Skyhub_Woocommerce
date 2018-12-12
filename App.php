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

class App
{
    /**
     * App constructor.
     * @throws Exception
     */
    public function __construct()
    {
        spl_autoload_register(function($className) {

            if (class_exists($className)) {
                return $this;
            }

            $file   = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
            $path   = __DIR__ . DIRECTORY_SEPARATOR . $file;

            if (file_exists($path)) {
                require_once($path);
            }
        });

        $this->_init();

        return $this;
    }


    protected function _init()
    {
        //TESTE
        $repository = \B2W\Skyhub\Model\Catalog\Product\Attribute\Factory::create();

        echo '<pre>';
        $attrs = $repository::all();

        foreach ($attrs as $attr) {
            echo $attr->getLabel() . "<br />";
            foreach ($attr->getOptions() as $option) {
                echo $option->getCode() . "<br />";
            }
            echo '<br /><br />';
        }

        echo '</pre>';
    }
}
