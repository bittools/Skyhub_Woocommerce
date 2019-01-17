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

namespace B2W\SkyHub\Model\Catalog\Category\Repository;

use B2W\SkyHub\Model\Catalog\Category\Collection;
use B2W\SkyHub\Model\Catalog\Category\Entity;
use B2W\SkyHub\Model\Resource\RepositoryAbstract;
use B2W\SkyHub\Model\Resource\Select;

/**
 * Class Db
 * @package B2W\SkyHub\Model\Catalog\Category\Repository
 */
class Db extends RepositoryAbstract implements \B2W\SkyHub\Contracts\Resource\Repository
{
    /**
     * @return \B2W\SkyHub\Contracts\Resource\Collection|Collection
     */
    public function all($filters = array())
    {
        global $wpdb;

        $results    = $wpdb->get_results($this->_getSelect()->prepare());
        $collection = new Collection();

        foreach ($results as $result) {
            $category = new Entity();
            $category->setId($result->term_taxonomy_id)
                ->setCode($result->slug)
                ->setName($result->name);

            if ($result->parent) {
                $category->setParent(self::one($result->parent));
            }

            $collection->addItem($category);
        }

        return $collection;
    }

    /**
     * @param \B2W\SkyHub\Model\Catalog\Product\Entity $product
     * @return Collection
     */
    public function fromProduct(\B2W\SkyHub\Model\Catalog\Product\Entity $product)
    {
        global $wpdb;

        $select = $this->_getSelect();
        $select->join(
            'wp_term_relationships',
            "relations.term_taxonomy_id = main_table.term_taxonomy_id",
            'relations'
        );
        $select->group('main_table.term_taxonomy_id');

        $results = $wpdb->get_results($select->prepare());

        $collection = new Collection();

        foreach ($results as $result) {
            $category = new Entity();
            $category->setId($result->term_taxonomy_id)
                ->setCode($result->slug)
                ->setName($result->name);

            if ($result->parent) {
                $category->setParent(self::one($result->parent));
            }

            $collection->addItem($category);
        }

        return $collection;
    }

    /**
     * @param $id
     * @return Entity
     */
    public function one($id)
    {
        global $wpdb;

        if (!$id) {
            return false;
        }

        $select     = $this->_getSelect();
        $select->where('term_taxonomy_id = %s');

        $query      = $wpdb->prepare($select->prepare(), $id);
        $results    = $wpdb->get_results($query);

        foreach ($results as $result) {
            $category = new Entity();
            $category->setId($result->term_taxonomy_id)
                ->setCode($result->slug)
                ->setName($result->name);

            if ($result->parent) {
                $category->setParent(self::one($result->parent));
            }

            return $category;
        }

        return new Entity();
    }

    /**
     * @return Select|string
     */
    protected function _getSelect()
    {
        $select = new Select();

        $select->addColumn('main_table.term_taxonomy_id')
            ->addColumn('terms.name')
            ->addColumn('terms.slug')
            ->addColumn('main_table.parent');

        $select->from('term_taxonomy', 'main_table');

        $select->join('terms', 'terms.term_id = main_table.term_id', 'terms');

        $select->where("taxonomy = 'product_cat'");

        return $select;
    }
}
