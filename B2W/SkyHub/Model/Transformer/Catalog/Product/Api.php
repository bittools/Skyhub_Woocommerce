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

namespace B2W\SkyHub\Model\Transformer\Catalog\Product;

use B2W\SkyHub\Model\Catalog\Product\Entity;
use SkyHub\Api\EntityInterface\Catalog\Category;

/**
 * Class Api
 * @package B2W\SkyHub\Model\Transformer\Catalog\Product
 */
class Api
{
    /**
     * @param Entity $product
     * @return \SkyHub\Api\EntityInterface\Catalog\Product
     */
    public static function convert(Entity $product)
    {
        static $instance = false;
        if ($instance === false) {
            $instance = new static();
        }

        $interface  = \App::api()->product()->entityInterface();

        $instance->_prepareStaticAttributes($product, $interface)
            ->_prepareSpecitifcations($product, $interface)
            ->_prepareCategories($product, $interface)
            ->_prepareImages($product, $interface)
            ->_prepareVariations($product, $interface);

        \App::dispatchEvent(
            'skyhub_product_convert_after',
            array(
                'product'   => $product,
                'interface' => $interface
            )
        );

        return $interface;
    }

    /**
     * @param Entity $product
     * @param \SkyHub\Api\EntityInterface\Catalog\Product $interface
     * @return $this
     */
    protected function _prepareStaticAttributes(
        Entity $product,
        \SkyHub\Api\EntityInterface\Catalog\Product $interface
    ) {
        $attributes = \App::getConfig('catalog/product/attribute/skyhub');

        foreach ($attributes as $attr) {
            $setter = 'set' . ucfirst($attr['code']);
            $getter = 'get' . ucfirst($attr['code']);
            if (!method_exists($interface, $setter) || !method_exists($product, $getter)) {
                continue;
            }

            $interface->$setter($product->$getter());
        }

        return $this;
    }

    /**
     * @param Entity $product
     * @param \SkyHub\Api\EntityInterface\Catalog\Product $interface
     * @return $this
     * @throws \Exception
     */
    protected function _prepareSpecitifcations(
        Entity $product,
        \SkyHub\Api\EntityInterface\Catalog\Product $interface
    )
    {
        /** @var \B2W\SkyHub\Model\Catalog\Product\Specification\Entity $specification */
        foreach ($product->getSpecifications() as $specification) {
            $interface->addSpecification(
                $specification->getAttribute()->getCode(),
                $specification->getOption()->getLabel()
            );
        }

        return $this;
    }

    /**
     * @param Entity $product
     * @param \SkyHub\Api\EntityInterface\Catalog\Product $interface
     * @return $this
     * @throws \Exception
     */
    protected function _prepareCategories(
        Entity $product,
        \SkyHub\Api\EntityInterface\Catalog\Product $interface
    )
    {
        /** @var Category $category */
        foreach ($product->getCategories() as $category) {
            $interface->addCategory($category->getCode(), $category->getName());
        }

        return $this;
    }

    /**
     * @param Entity $product
     * @param \SkyHub\Api\EntityInterface\Catalog\Product $interface
     * @return $this
     */
    protected function _prepareImages(
        Entity $product,
        \SkyHub\Api\EntityInterface\Catalog\Product $interface
    )
    {
        foreach ($product->getImages() as $image) {
            $interface->addImage($image);
        }

        return $this;
    }


    /**
     * @param Entity $product
     * @param \SkyHub\Api\EntityInterface\Catalog\Product $interface
     * @return $this
     * @throws \Exception
     */
    protected function _prepareVariations(
        Entity $product,
        \SkyHub\Api\EntityInterface\Catalog\Product $interface
    )
    {
        Type\Standard::create($product, $interface);
        return $this;
    }
}
