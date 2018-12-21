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
    public static function canIntegrateProduct(Entity $product)
    {
        if (!$product->getId()) {
            self::throwAttributeError('id');
        }

        if (!$product->getSku()) {
            self::throwAttributeError('sku');
        }

        if ($product->getAdditional('_virtual') == 'yes') {
            throw new VirtualProductException();
        }

        if ($product->getAdditional('_downloadable') == 'yes') {
            throw new DownloadableProductException();
        }

        self::_validateAttributes($product);

        return true;
    }

    /**
     * @param Entity $product
     * @return bool
     * @throws AttributeRequiredException
     */
    protected static function _validateAttributes(Entity $product)
    {
        $attributes = \App::getConfig('catalog/product/attribute/skyhub');

        foreach ($attributes as $attr) {
            if (!isset($attr['required']) || $attr['required'] != true) {
                continue;
            }

            $method = 'get' . ucfirst($attr['code']);

            if (!method_exists($product, $method)) {
                self::throwAttributeError($attr['code']);
            }

            $value = $product->$method();

            if (!$value) {
                self::throwAttributeError($attr['code']);
            }
        }

        return true;
    }

    /**
     * @param $attribute
     * @throws AttributeRequiredException
     */
    protected static function throwAttributeError($attribute)
    {
        $message = 'Attribute ' . $attribute . ' is required';
        throw new AttributeRequiredException($message);
    }
}
