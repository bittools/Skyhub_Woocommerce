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

namespace B2W\SkyHub\Controller\Admin;

use B2W\SkyHub\Model\Queue;
use B2W\SkyHub\Model\Repository\QueueDbRepository;
use B2W\SkyHub\View\Admin\Admin as AdminView;
use B2W\SkyHub\Helper\MessageErros;
use Exception;

class SetupQueue extends AdminControllerAbstract
{
    /**
     * @return mixed
     */
    public function save()
    {
        try {
            if (!isset($_POST['page']) || $_POST['page'] != AdminView::SLUG_QUEUE_INTEGRATION_SKYHUB_LIST) {
                return $this;
            }
            
            if (!isset($_POST['itemQueue']) || !$_POST['itemQueue']) {
                $this->_redirect('admin.php?page=' . AdminView::SLUG_QUEUE_INTEGRATION_SKYHUB_LIST);
            }
    
            $queueRepository = new QueueDbRepository();
            
            foreach ($_POST['itemQueue'] as $idQueue) {
                $message = $queueRepository->getById($idQueue);
                if (!$message) {
                    continue;
                }
                $queueRepository->delete($message);
            }
            
            $jobs = new \B2W\SkyHub\Model\Cron\Jobs();
            $jobs->unsetCronJobs();
            $jobs->registerCronJobs();
        } catch (Exception $e) {
            $messageErros = new MessageErros();
            $messageErros->addError($e->getMessage());
        }

        $this->_redirect('admin.php?page=' . AdminView::SLUG_QUEUE_INTEGRATION_SKYHUB_LIST);
    }

    /**
     * @return mixed
     */
    public function executeQueue()
    {
        try {
            if (!isset($_POST['page']) || $_POST['page'] != AdminView::SLUG_QUEUE_INTEGRATION_SKYHUB_EXECUTE) {
                return $this;
            }
    
            if (!isset($_POST['itemQueue']) || !$_POST['itemQueue']) {
                $this->_redirect('admin.php?page=' . AdminView::SLUG_QUEUE_INTEGRATION_SKYHUB_LIST);
            }

            $queue = new Queue();
            foreach ($_POST['itemQueue'] as $idQueue) {
                $queue->runById($idQueue);
            }
        } catch (Exception $e) {
            $messageErros = new MessageErros();
            $messageErros->addError($e->getMessage());
        }

        $this->_redirect('admin.php?page=' . AdminView::SLUG_QUEUE_INTEGRATION_SKYHUB_LIST);
        return $this;
    }
}
