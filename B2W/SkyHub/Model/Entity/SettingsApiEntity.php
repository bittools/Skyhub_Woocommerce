<?php
/**
 * BSeller - B2W Companhia Digital
 *
 * DISCLAIMER
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @copyright     Copyright (c) 2019 B2W Companhia Digital. (http://www.bseller.com.br/)
 * @author        Tiago Tescaro <tiago.tescaro@b2wdigital.com>
 */

namespace B2W\SkyHub\Model\Entity;

use B2W\SkyHub\Model\Entity\EntityAbstract;
use B2W\SkyHub\Model\Cron\Jobs;

/**
 * Class Attribute
 * @package B2W\SkyHub\Model\Map
 */
class SettingsApiEntity extends EntityAbstract
{
    /**
     * @var String
     */
    protected $email = '';

    /**
     * @var String
     */
    protected $apiKey = '';

    /**
     * @var String
     */
    protected $xAccountKey = '';

    /**
     * @var String
     */
    protected $orderIntegration = 'every_minute';

    /**
     * @var String
     */
    protected $orderIntegration_api = 'every_minute';

    /**
     * @var String
     */
    protected $productIntegration = 'every_minute';

    /**
     * Get datas database
     *
     * @return SettingsApiEntity
     */
    public function map()
    {
        $datas = get_option($this->_getOptionsName(), null);
        if (!is_array($datas)) {
            return $this;
        }
        
        foreach ($datas as $key=>$value) {
            $method = \App::helper('app')->getSetterMethodName($this, $key);

            if (!$method) {
                continue;
            }
            $this->$method($value);
        }
        return $this;        
    }

    /**
     * Get the value of email
     *
     * @return  String
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param  String  $email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of apiKey
     *
     * @return  String
     */ 
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Set the value of apiKey
     *
     * @param  String  $apiKey
     *
     * @return  self
     */ 
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * Get the value of xAccountKey
     *
     * @return  String
     */ 
    public function getXAccountKey()
    {
        return $this->xAccountKey;
    }

    /**
     * Set the value of xAccountKey
     *
     * @param  String  $xAccountKey
     *
     * @return  self
     */ 
    public function setXAccountKey($xAccountKey)
    {
        $this->xAccountKey = $xAccountKey;

        return $this;
    }

    protected function _getOptionsName()
    {
        return 'b2w_skyhub_settings_api';
    }

    /**
     * Save datas settingsAPI
     */
    public function save()
    {
        update_option($this->_getOptionsName(), $this->toArray());
        $jobs = new Jobs();
        $jobs->registerCronJobs(true);
    }

    /**
     * Get the value of orderIntegration
     *
     * @return  String
     */ 
    public function getOrderIntegration()
    {
        return $this->orderIntegration;
    }

    /**
     * Set the value of orderIntegration
     *
     * @param  String  $orderIntegration
     *
     * @return  self
     */ 
    public function setOrderIntegration($orderIntegration)
    {
        $this->orderIntegration = $orderIntegration;

        return $this;
    }

    /**
     * Get the value of orderIntegration_api
     *
     * @return  String
     */ 
    public function getOrderIntegrationApi()
    {
        return $this->orderIntegration_api;
    }

    /**
     * Set the value of orderIntegration_api
     *
     * @param  String  $orderIntegration_api
     *
     * @return  self
     */ 
    public function setOrderIntegrationApi($orderIntegration_api)
    {
        $this->orderIntegration_api = $orderIntegration_api;

        return $this;
    }

    /**
     * Get the value of productInegration
     *
     * @return  String
     */ 
    public function getProductIntegration()
    {
        return $this->productIntegration;
    }

    /**
     * Set the value of productInegration
     *
     * @param  String  $productInegration
     *
     * @return  self
     */ 
    public function setProductIntegration($productIntegration)
    {
        $this->productIntegration = $productIntegration;

        return $this;
    }
}