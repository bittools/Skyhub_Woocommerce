<?php

/**
 * BSeller - B2W Companhia Digital
 *
 * DISCLAIMER
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @copyright     Copyright (c) 2020 B2W Companhia Digital. (http://www.bseller.com.br/)
 * Access https://ajuda.skyhub.com.br/hc/pt-br/requests/new for questions and other requests.
 */

namespace B2W\SkyHub\Helper;

class MessageErros
{
    const ERROR = 'notice-error';
    const INFO = 'notice-info';
    const WARNING = 'notice-warning';
    const SUCCESS = 'notice-success';
    const OPTION_SAVE = 'b2w_skyhub_errors';

    /**
     * Prepare message error
     *
     * @param string $message
     * @param string $type
     * 
     * @return string
     */
    protected function prepareMessageErros($message, $type)
    {
        $return = "<div class='notice $type is-dismissible'>";
        $return .= "<p>$message</p>";
        $return .= '</div>';
        return $return;
    }

    /**
     * Add message in database
     *
     * @param string $message
     *
     * @return bool
     */
    protected function addMessage($message)
    {
        if (!trim($message)) {
            return false;
        }
    
        $message .= get_option(self::OPTION_SAVE, '');

        if (update_option(self::OPTION_SAVE, $message)) {
            return true;
        }

        return false;
    }

    /**
     * Return messager and clear option
     *
     * @return string
     */
    public function getMessageErrors()
    {
        $error = get_option(self::OPTION_SAVE, '');
        delete_option(self::OPTION_SAVE);
        return $error;
    }

    /**
     * Add message
     *
     * @param string $message
     *
     * @return bool
     */
    public function addError($message)
    {
        $message = $this->prepareMessageErros($message, self::ERROR);
        return $this->addMessage($message);
    }

    /**
     * Add message
     *
     * @param string $message
     *
     * @return bool
     */
    public function addWarning($message)
    {
        $message = $this->prepareMessageErros($message, self::WARNING);
        return $this->addMessage($message);
    }

    /**
     * Add message
     *
     * @param string $message
     *
     * @return bool
     */
    public function addSuccess($message)
    {
        $message = $this->prepareMessageErros($message, self::SUCCESS);
        return $this->addMessage($message);
    }

    /**
     * Add message
     *
     * @param string $message
     *
     * @return bool
     */
    public function addInfo($message)
    {
        $message = $this->prepareMessageErros($message, self::INFO);
        return $this->addMessage($message);
    }
}
