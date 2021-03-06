<?php
/**
 * BSeller - B2W Companhia Digital
 *
 * DISCLAIMER
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @copyright     Copyright (c) 2017 B2W Companhia Digital. (http://www.bseller.com.br/)
 * Access https://ajuda.skyhub.com.br/hc/pt-br/requests/new for questions and other requests.
 */

namespace B2W\SkyHub\Model\Transformer\Order\Address;

use B2W\SkyHub\Model\Entity\Order\AddressEntity;
use B2W\SkyHub\Model\Map\MapAttribute;
use B2W\SkyHub\Model\Map\Order\AddressMap;
use B2W\SkyHub\Model\Transformer\EntityToDbAbstract;
use B2W\SkyHub\Model\Transformer\Handler\Post;

/**
 * Class EntityToDb
 * @package B2W\SkyHub\Model\Transformer\Order\Address
 */
class EntityToDb extends EntityToDbAbstract
{
    /** @var AddressEntity */
    protected $_data    = null;

    /**
     * @return AddressMap|mixed
     */
    protected function _getMapInstance()
    {
        return new AddressMap();
    }

    /**
     * @param MapAttribute $attribute
     * @param $value
     * @param Post $post
     * @return EntityToDbAbstract|string
     * @throws \B2W\SkyHub\Exception\Data\TransformerNotFound
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     */
    protected function _setValue(MapAttribute $attribute, $value, Post $post)
    {
        if (!$attribute->getWordpress() || !$this->_data) {
            return '';
        }

        $attr = str_replace('{{ADDR_TYPE}}', '_' . $this->_data->getType(), $attribute->getWordpress());
        $attribute->setWordpress($attr);

        return parent::_setValue($attribute, $value, $post);
    }

    /**
     * @param MapAttribute $attribute
     * @return string
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     */
    protected function _getEntityValue(MapAttribute $attribute)
    {
        $method = $this->_helper()->getGetterMethodName($this->_data, $attribute->getSkyhub());

        if (!$method) {
            return '';
        }

        return $this->_data->$method();
    }
}
