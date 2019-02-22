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

namespace B2W\SkyHub\Model;

use B2W\SkyHub\Exception\Exception;
use B2W\SkyHub\Exception\Queue\MethodNotFoundException;
use B2W\SkyHub\Exception\Queue\ModelNotFoundException;
use B2W\SkyHub\Exception\Queue\WorkerExecutionError;
use B2W\SkyHub\Model\Queue\MessageAbstract;
use B2W\SkyHub\Exception\Queue\EmptyQueueException;

/**
 * Class Queue
 * @package B2W\SkyHub\Model
 */
class Queue
{
    /**
     * @param string $type
     * @return $this
     * @throws MethodNotFoundException
     * @throws ModelNotFoundException
     * @throws WorkerExecutionError
     * @throws \B2W\SkyHub\Exception\Data\RepositoryNotFound
     */
    public function run($type = 'default')
    {
        try{
            /** @var MessageAbstract $message */
            $message = \App::repository(\App::REPOSITORY_QUEUE)->get($type);
        } catch (EmptyQueueException $e) {
            return $this;
        }

        $model  = $message->getModel();
        $method = $message->getMethod();
        $params = $message->getParams();

        if (!class_exists($model)) {
            throw new ModelNotFoundException($model);
        }

        $model = new $model;

        if (!method_exists($model, $method)) {
            throw new MethodNotFoundException($method);
        }

        try {
            call_user_func_array(array($model, $method), $params);
            \App::repository(\App::REPOSITORY_QUEUE)->ack($message);
        } catch (Exception $e) {
            \App::repository(\App::REPOSITORY_QUEUE)->error($message);
            \App::logException($e);
            throw new WorkerExecutionError($e->getMessage());
        }

        return $this;
    }
}
