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

namespace B2W\SkyHub\Model\Repository;

use B2W\SkyHub\Contract\Entity\OrderEntityInterface;
use B2W\SkyHub\Contract\Repository\OrderApiRepositoryInterface;
use B2W\SkyHub\Exception\Api\OrderNotFoundException;
use B2W\SkyHub\Exception\ApiException;
use B2W\SkyHub\Model\Entity\Order\ItemEntity;
use B2W\SkyHub\Model\Entity\OrderEntity;
use B2W\SkyHub\Model\Transformer\Order\ApiToEntity;

/**
 * Class OrderApiRepository
 * @package B2W\SkyHub\Model\Repository
 */
class OrderApiRepository implements OrderApiRepositoryInterface
{
    /**
     * @return OrderEntityInterface|OrderEntity|mixed
     * @throws ApiException
     * @throws OrderNotFoundException
     * @throws \B2W\SkyHub\Exception\Data\RepositoryNotFound
     * @throws \B2W\SkyHub\Exception\Data\TransformerNotFound
     */
    public function queue()
    {
        $requestHandler = \App::api()->queue();
        $response       = $requestHandler->orders();

        return $this->_prepareOrder($response);
    }

    /**
     * @param $id
     * @return OrderEntityInterface|OrderEntity|mixed
     * @throws ApiException
     * @throws OrderNotFoundException
     * @throws \B2W\SkyHub\Exception\Data\RepositoryNotFound
     * @throws \B2W\SkyHub\Exception\Data\TransformerNotFound
     */
    public function one($id)
    {
        $requestHandler = \App::api()->order();
        $response       = $requestHandler->order($id);

        return $this->_prepareOrder($response);
    }

    /**
     * @param OrderEntityInterface $order
     * @return bool|mixed
     * @throws \B2W\SkyHub\Exception\Exception
     */
    public function ack(OrderEntityInterface $order)
    {
        $requestHandler = \App::api()->queue();
        $response       = $requestHandler->delete($order->getCode());

        if ($response->exception()) {
            /** @var \SkyHub\Api\Handler\Response\HandlerException $response */
            throw new \B2W\SkyHub\Exception\Exception($response->message());
        }

        return true;
    }

    /**
     * @param \SkyHub\Api\Handler\Response\HandlerInterface $response
     * @return OrderEntityInterface|OrderEntity
     * @throws ApiException
     * @throws OrderNotFoundException
     * @throws \B2W\SkyHub\Exception\Data\RepositoryNotFound
     * @throws \B2W\SkyHub\Exception\Data\TransformerNotFound
     */
    protected function _prepareOrder(\SkyHub\Api\Handler\Response\HandlerInterface $response)
    {
        if ($response->exception()) {
            /** @var \SkyHub\Api\Handler\Response\HandlerException $response */
            throw new ApiException($response->message());
        }

        /** @var \SkyHub\Api\Handler\Response\HandlerDefault $response */
        if (!$response->body()) {
            throw new OrderNotFoundException();
        }

        //load order if already exists
        $id = null;
        $data = $response->toArray();
        /** @var OrderEntityInterface $order */
        if ($order = \App::repository(\App::REPOSITORY_ORDER)->code($data['code'])) {
            $id = $order->getId();
        }

        /** @var ApiToEntity $transformer */
        $transformer = \App::transformer('order/api_to_entity');
        $transformer->setResponse($response);

        /** @var OrderEntity $order */
        $order = $transformer->convert();

        if ($id) {
            $order->setId($id);
        }

        return $order;
    }

    /**
     * @param OrderEntityInterface $order
     * @return $this|mixed
     * @throws ApiException
     * @throws \B2W\SkyHub\Exception\Data\RepositoryNotFound
     */
    public function shipp(OrderEntityInterface $order)
    {
        /** TODO check how to manage track codes */
        $requestHandler = \App::api()->order();
        $response       = $requestHandler->shipment(
            $order->getCode(),
            $this->_prepareItems($order),
            'Fix',
            'Fix',
            'Fix',
            'Fix'
        );

        if ($response->exception()) {
            /** @var \SkyHub\Api\Handler\Response\HandlerException $response */
            throw new ApiException($response->message());
        }

        return $this;
    }

    /**
     * @param OrderEntityInterface $order
     * @return $this|mixed
     * @throws ApiException
     */
    public function delivery(OrderEntityInterface $order)
    {
        $requestHandler = \App::api()->order();
        $response       = $requestHandler->delivery($order->getCode());

        if ($response->exception()) {
            /** @var \SkyHub\Api\Handler\Response\HandlerException $response */
            throw new ApiException($response->message());
        }

        return $this;
    }

    /**
     * @param OrderEntityInterface $order
     * @return $this|mixed
     * @throws ApiException
     */
    public function cancel(OrderEntityInterface $order)
    {
        $requestHandler = \App::api()->order();
        $response       = $requestHandler->cancel($order->getCode());

        if ($response->exception()) {
            /** @var \SkyHub\Api\Handler\Response\HandlerException $response */
            throw new ApiException($response->message());
        }

        return $this;
    }

    /**
     * @param OrderEntityInterface $order
     * @return array
     * @throws \B2W\SkyHub\Exception\Data\RepositoryNotFound
     */
    protected function _prepareItems(OrderEntityInterface $order)
    {
        $itemsArray = array();
        $items      = \App::repository(\App::REPOSITORY_ORDER_ITEM)->load($order);

        /** @var ItemEntity $item */
        foreach ($items as $item) {
            $itemsArray[] = array(
                'sku' => $item->getProduct()->getSku(),
                'qty' => $item->getQty()
            );
        }

        return $itemsArray;
    }
}
