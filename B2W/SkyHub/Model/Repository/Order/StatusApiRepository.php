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

namespace B2W\SkyHub\Model\Repository\Order;

use B2W\SkyHub\Contract\Repository\Order\StatusApiRepositoryInterface;
use B2W\SkyHub\Exception\ApiException;

/**
 * Class StatusApiRepository
 * @package B2W\SkyHub\Model\Repository\Order
 */
class StatusApiRepository implements StatusApiRepositoryInterface
{
    /**
     * @return bool|mixed|\SkyHub\Api\Handler\Response\HandlerDefault|\SkyHub\Api\Handler\Response\HandlerException|\SkyHub\Api\Handler\Response\HandlerInterface
     * @throws \Exception
     */
    public function all()
    {
        $requestHandler = \App::api()->orderStatus();
        $response       = $requestHandler->statuses();

        if ($response->exception()) {
            /** @var \SkyHub\Api\Handler\Response\HandlerException $response */
            throw new ApiException($response->message());
        }

        /** @var \SkyHub\Api\Handler\Response\HandlerDefault $response */
        if (!$response->body()) {
            return false;
        }

        return $response;
    }
}
