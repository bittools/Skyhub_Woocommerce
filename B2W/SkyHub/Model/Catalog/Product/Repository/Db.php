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

namespace B2W\SkyHub\Model\Catalog\Product\Repository;

use B2W\SkyHub\Model\Catalog\Product\Entity;
use B2W\SkyHub\Model\Catalog\Product\Collection;
use B2W\SkyHub\Model\Resource\RepositoryAbstract;

/**
 * Class Db
 * @package B2W\SkyHub\Model\Order\Repository
 */
class Db extends RepositoryAbstract implements \B2W\SkyHub\Contracts\Resource\Repository
{
    /**
     * @param array $filters
     * @return \B2W\SkyHub\Contracts\Resource\Collection|Collection
     * @throws \Exception
     */
    public function all($filters = array())
    {
        $defaultFilter = array(
            'post_status'   => array('publish'),
            'post_type'     => Entity::POST_TYPE
        );

        $posts = get_posts($defaultFilter);

        $collection = new Collection();

        foreach ($posts as $post) {
            $product = $this->one($post);
            $collection->addItem($product);
        }

        return $collection;
    }

    /**
     * @param $id
     * @return Entity
     * @throws \Exception
     */
    public function one($id)
    {
        if ($id instanceof \WP_Post) {
            $post = $id;
        } else {
            $post = get_post($id);
        }

        $product = new Entity();

        if ($post->post_type != Entity::POST_TYPE) {
            return $product;
        }

        \B2W\SkyHub\Model\Transformer\Post\Catalog\Product::convert($post, $product);

        return $product;
    }
}
