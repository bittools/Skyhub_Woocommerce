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

namespace B2W\SkyHub\Controller;


use B2W\SkyHub\Model\Entity\ProductEntity;
use B2W\SkyHub\Model\Queue\Message\ProductUpdateMessage;

/**
 * Class Product
 * @package B2W\SkyHub\Controller
 */
class Product
{
    private function addProductQueue($idProduct) {
        $message = new ProductUpdateMessage($idProduct);
        return \App::repository(\App::REPOSITORY_QUEUE)->add($message);
    }
    /**
     * @return $this
     * @throws \B2W\SkyHub\Exception\Data\RepositoryNotFound
     * @throws \B2W\SkyHub\Exception\Exception
     */
    public function onSave($idProduct)
    {
        if (!$idProduct) {
            return $this;
        }

        return $this->addProductQueue($idProduct);
    }

    public function onSaveStockOrder($product = null)
    {
        if ($product instanceof \WC_Product) {
            if ($product->get_type() == 'product_variation') {
                $idProduct = $product->get_parent_id();
            } else {
                $idProduct = (isset($product->id) ? $product->id : null);
            }

            
            if (!$idProduct) {
                return $this;
            }
    
            return $this->addProductQueue($idProduct);
        }
    }

    /**
     * Add option Integration in list product
     * 
     * @param Array $_actions
     * @return Array $_actions
     */
    public function addBulkActions(Array $_actions)
    {
        $_actions['SkyHubIntegrationProduct'] = 'Integration product with SkyHub';
        return $_actions;
    }

    /**
     * Integration Product
     * 
     * @param String $redirectTo
     * @return Bollean|Redirect
     */
    public function integrationProductSkyHub($redirectTo)
    {
        $data = $_GET;
        if ($data['action'] != 'SkyHubIntegrationProduct') {
            wp_redirect($redirectTo);
            return false;
        }

        if (!$data['post']) {
            wp_redirect($redirectTo);
            return false;
        }

        foreach ($data['post'] as $idProduct) {
            $message = new ProductUpdateMessage($idProduct);
            \App::repository(\App::REPOSITORY_QUEUE)->add($message);
        }
        
        wp_redirect($redirectTo);
    }
}
