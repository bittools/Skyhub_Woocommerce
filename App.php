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


    /**
     * @param $entity
     * @param string $type
     * @return \B2W\Skyhub\Contracts\Data\Repository
     * @throws \B2W\Skyhub\Exception\Data\RepositoryNotFound
     */
    public static function repository($entity, $type = 'db')
    {
        $type = ucfirst($type);

        $repositories = array(
            'catalog/category'              => '\B2W\Skyhub\Model\Catalog\Category\Repository',
            'catalog/product/attribute'     => '\B2W\Skyhub\Model\Catalog\Product\Attribute\Repository',
            'catalog/product/variation'     => '\B2W\Skyhub\Model\Catalog\Product\Variation\Repository',
            'catalog/product'               => '\B2W\Skyhub\Model\Catalog\Product\Repository',
        );

        if (!isset($repositories[$entity])) {
            throw new \B2W\Skyhub\Exception\Data\RepositoryNotFound();
        }

        $repo = $repositories[$entity] . '\\' . $type;

        if (!class_exists($repo)) {
            throw new \B2W\Skyhub\Exception\Data\RepositoryNotFound();
        }

        return $repo::instantiate();
    }


    /**
     *
     */
    protected function _init()
    {
//        $this->_testAttributes();
//        $this->_testCategories();
//        $this->_testCategory();
//        $this->_testProducts();
        $this->_testSingleProduct();
    }

    /**
     *
     */
    protected function _testSingleProduct()
    {
        $product = self::repository('catalog/product')->one(17);

        $product->getVariations();
        $product->getCategories();
        $product->getVariationAttributes();
        $product->getSpecifications();

        echo '<pre>';
        foreach ($product->getImages() as $image) {
            echo '<img src="'.$image.'" />';
        }

        echo '</pre>';
    }

    /**
     *
     */
    protected function _testProducts()
    {
        $products = self::repository('catalog/product')->all();

        echo '<Pre>';

        foreach ($products as $product) {
            print_r($product);
        }

        echo '</Pre>';

        echo '<br /><br />';
    }

    /**
     *
     */
    protected function _testCategory()
    {
        $category = self::repository('catalog/category')->one(21);

        echo '<pre>';
        print_r($category);
        echo '</pre>';
    }

    /**
     *
     */
    protected function _testCategories()
    {
        $categories = self::repository('catalog/category')->all();

        foreach ($categories as $category) {
            echo $category->getName() . "<br />";

            if ($category->getParent()) {
                echo $category->getParent()->getName() . '<br />';
            }

            echo '<br />';
        }

        echo '<br /><br />';
    }


    /**
     *
     */
    protected function _testAttributes()
    {
        $attrs = self::repository('catalog/product/attribute')->all();

        echo '<pre>';
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
