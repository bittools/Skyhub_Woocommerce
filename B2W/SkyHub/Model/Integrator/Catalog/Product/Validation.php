<?php

namespace B2W\SkyHub\Model\Integrator\Catalog\Product;

use B2W\SkyHub\Exception\Integrator\Catalog\Product\Validation\AttributeRequiredException;
use B2W\SkyHub\Exception\Integrator\Catalog\Product\Validation\DownloadableProductException;
use B2W\SkyHub\Exception\Integrator\Catalog\Product\Validation\VirtualProductException;
use B2W\SkyHub\Model\Catalog\Product\Entity;

/**
 * Class Validation
 * @package B2W\SkyHub\Model\Integrator\Catalog\Product
 */
class Validation
{
    /**
     * @param Entity $product
     * @return bool
     * @throws AttributeRequiredException
     * @throws DownloadableProductException
     * @throws VirtualProductException
     */
    public static function validate(Entity $product)
    {
        static $instance = false;
        if ($instance === false) {
            $instance = new static();
        }

        if (!$product->getId()) {
            $instance->throwAttributeError('id', $product);
        }

        if (!$product->getSku()) {
            $instance->throwAttributeError('sku', $product);
        }

        if ($product->getAdditional('_virtual') == 'yes') {
            throw new VirtualProductException();
        }

        if ($product->getAdditional('_downloadable') == 'yes') {
            throw new DownloadableProductException();
        }

        $instance->_validateAttributes($product);

        $instance->_validateVariations($product);

        return true;
    }

    /**
     * @param Entity $product
     * @return bool
     * @throws AttributeRequiredException
     */
    protected function _validateAttributes(Entity $product)
    {
        $attributes = \App::config('catalog/product/attribute/skyhub');

        foreach ($attributes as $attr) {
            if (!isset($attr['required']) || $attr['required'] != true) {
                continue;
            }

            $method = 'get' . ucfirst($attr['code']);

            if (!method_exists($product, $method)) {
                self::throwAttributeError($attr['code'], $product);
            }

            $value = $product->$method();

            if (!$value) {
                self::throwAttributeError($attr['code'], $product);
            }
        }

        return true;
    }

    /**
     * @param Entity $product
     * @return bool
     * @throws AttributeRequiredException
     */
    protected function _validateVariations(Entity $product)
    {
        if (!$product->getVariations()) {
            return true;
        }

        foreach ($product->getVariations() as $variation) {

            $sku = $variation->getSku();

            if (empty($sku)) {
                throw new AttributeRequiredException('Variation #'.$variation->getId().' SKU can not be empty');
            }
        }

        return true;
    }

    /**
     * @param $attribute
     * @throws AttributeRequiredException
     */
    protected function throwAttributeError($attribute, Entity $product)
    {
        $message = 'Attribute ' . $attribute . ' is required for product ' . $product->getSku();
        throw new AttributeRequiredException($message);
    }
}