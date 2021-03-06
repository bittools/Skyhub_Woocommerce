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

namespace B2W\SkyHub\Model\Entity\Order;

use B2W\SkyHub\Contract\Entity\Order\Shipment\TrackEntityInterface;
use B2W\SkyHub\Contract\Resource\CollectionInterface;
use B2W\SkyHub\Model\Entity\EntityAbstract;

class ShipmentEntity extends EntityAbstract implements \B2W\SkyHub\Contract\Entity\Order\ShipmentEntityInterface
{
    /**
     * @var null
     */
    protected $_code    = null;
    /**
     * @var CollectionInterface
     */
    protected $_items   = null;
    /**
     * @var CollectionInterface
     */
    protected $_tracks  = null;

    /**
     * @return null
     */
    public function getCode()
    {
        return $this->_code;
    }

    /**
     * @param null $code
     */
    public function setCode($code)
    {
        $this->_code = $code;
    }

    /**
     * @return CollectionInterface
     */
    public function getItems()
    {
        return $this->_items;
    }

    /**
     * @param CollectionInterface $items
     */
    public function setItems(CollectionInterface $items)
    {
        $this->_items = $items;
    }

    /**
     * @return TrackEntityInterface
     */
    public function getTracks()
    {
        return $this->_tracks;
    }

    /**
     * @param TrackEntityInterface $tracks
     */
    public function setTracks(TrackEntityInterface $tracks)
    {
        $this->_tracks = $tracks;
    }
}
