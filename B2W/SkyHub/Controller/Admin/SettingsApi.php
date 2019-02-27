<?php

namespace B2W\SkyHub\Controller\Admin;

use B2W\SkyHub\View\Admin\ViewAbstract;
use B2W\SkyHub\Model\Entity\SettingsApiEntity;
use B2W\SkyHub\View\Admin\Admin;


class SettingsApi extends AdminControllerAbstract
{
    public function save()
    {
        $post = $_POST;
        if (!isset($post[ViewAbstract::NONCE_FIELD])) {
            return $this;
        }

        if (!($this->validateNonce() && current_user_can( 'manage_options' ))) {
            $this->_redirect();
            exit;
        }

        $settingsApi = new SettingsApiEntity();
        $settingsApi->setEmail($post['email']);
        $settingsApi->setApiKey($post['apiKey']);
        $settingsApi->setOrderIntegration($post['order_inegration']);
        $settingsApi->setOrderIntegrationApi($post['order_inegration_api']);
        $settingsApi->setProductIntegration($post['product_inegration']);
        $settingsApi->setXAccountKey('bZa6Ml0zgS');
        $settingsApi->save();

        $this->_redirect('admin.php?page=' . Admin::SLUG_SETTINGS_API_EDIT);
    }
}