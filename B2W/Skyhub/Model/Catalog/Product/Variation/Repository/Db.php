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

namespace B2W\Skyhub\Model\Catalog\Product\Variation\Repository;

use B2W\Skyhub\Model\Catalog\Product\Variation\Entity;
use B2W\Skyhub\Model\Catalog\Product\Variation\Collection;

/**
 * Class Db
 * @package B2W\Skyhub\Model\Order\Repository
 */
class Db implements \B2W\Skyhub\Contracts\Data\Repository
{
    /**
     * @param array $filters
     * @return \B2W\Skyhub\Contracts\Data\Collection|Collection
     * @throws \Exception
     */
    public static function all($filters = array())
    {
        $defaultFilter = array(
            'post_status'   => array('publish'),
            'post_type'     => Entity::POST_TYPE
        );

        if (!empty($filters)) {
            foreach ($filters as $key => $value) {
                $defaultFilter[$key] = $value;
            }
        }

        $posts = get_posts($defaultFilter);

        $collection = new Collection();

        foreach ($posts as $post) {
            $product = self::one($post);
            $collection->addItem($product);
        }

        return $collection;
    }

    /**
     * @param $id
     * @return Entity
     * @throws \Exception
     */
    public static function one($id)
    {
        if ($id instanceof \WP_Post) {
            $post = $id;
        } else {
            $post = get_post($id);
        }

        $variation = self::emptyOne();
        \B2W\Skyhub\Model\Catalog\Product\Variation\Converter\Post\Entity::convert($post, $variation);
        self::_prepareVariation($variation);

        return $variation;
    }

    /**
     * @param $product
     * @param $post
     * @throws \Exception
     */
    protected static function _prepareVariation($product)
    {
        self::_prepareSpecifications($product);
    }

    /**
     * @return Entity|mixed
     */
    public static function emptyOne()
    {
        return new Entity();
    }

    /**
     * @return \B2W\Skyhub\Contracts\Data\Collection|Collection
     */
    public static function emptyCollection()
    {
        return new Collection();
    }


    /**
     * @param Entity $product
     * @throws \Exception
     */
    protected static function _prepareSpecifications(Entity $product)
    {
        $meta   = get_post_meta($product->getId());
        $data   = isset($meta['_product_attributes']) ? $meta['_product_attributes'] : false;

        if (!$data) {
            return;
        }

        $repo   = \B2W\Skyhub\Model\Catalog\Product\Attribute\Factory::create();
        $spec   = \B2W\Skyhub\Model\Catalog\Product\Specification\Factory::create();
        $data   = unserialize(current($data));

        foreach ($data as $attr => $options) {

            if (!isset($options['value']) || empty($options['value'])) {
                continue;
            }

            $attrName   = str_replace('pa_', '', $attr);
            $attr       = $repo::oneByCode($attrName);
            $spec       = $spec->setAttribute($attr)
                ->setValue();

            $product->addSpecification($spec);
        }

        return;
    }
}
