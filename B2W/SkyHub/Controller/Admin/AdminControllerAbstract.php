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


use B2W\SkyHub\View\Admin\ViewAbstract;

/**
 * Class AdminControllerAbstract
 * @package B2W\SkyHub\Controller\Admin
 */
abstract class AdminControllerAbstract
{
    /**
     * @return mixed
     */
    abstract public function save();

    /**
     * @return bool|int
     */
    protected function validateNonce()
    {
        $nonceField     = ViewAbstract::NONCE_FIELD;
        $nonceAction    = ViewAbstract::NONCE_ACTION;

        if (!isset($_POST[$nonceField])) {
            return false;
        }

        $field  = wp_unslash($_POST[$nonceField]);

        return wp_verify_nonce($field, $nonceAction);
    }

    /**
     * @inheritdoc
     */
    protected function _redirect($url = null)
    {
        $url = admin_url($url);
        wp_safe_redirect(urldecode($url));
        exit;
    }
}
