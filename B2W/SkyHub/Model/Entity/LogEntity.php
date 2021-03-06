<?php
/**
 * BSeller - B2W Companhia Digital
 *
 * DISCLAIMER
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @copyright     Copyright (c) 2019 B2W Companhia Digital. (http://www.bseller.com.br/)
 * Access https://ajuda.skyhub.com.br/hc/pt-br/requests/new for questions and other requests.
 */

namespace B2W\SkyHub\Model\Entity;

class LogEntity extends EntityAbstract
{
    /**
     * @var Int
     */
    protected $id;

    /**
     * @var String
     */
    protected $message;

    /**
     * @var String
     */
    protected $level;

    /**
     * @var DateTime
     */
    protected $dateCreate;

    /**
     * Get the value of message
     *
     * @return  String
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @param  String  $message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of level
     *
     * @return  String
     */ 
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set the value of level
     *
     * @param  String  $level
     *
     * @return  self
     */ 
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get the value of dateCreate
     *
     * @return  DateTime
     */ 
    public function getDateCreate()
    {
        return $this->dateCreate;
    }

    /**
     * Set the value of dateCreate
     *
     * @param  DateTime  $dateCreate
     *
     * @return  self
     */ 
    public function setDateCreate($dateCreate)
    {
        $this->dateCreate = $dateCreate;

        return $this;
    }

    /**
     * Save datas in database
     *
     * @return void
     */
    public function save()
    {
        global $wpdb;
        $table = $wpdb->prefix . 'woocommerce_b2w_skyhub_log';
        if ($this->id) {
            $wpdb->update($table, $this->toArray(), array('id' => $this->id));
        } else {
            $wpdb->insert($table, $this->toArray());
        }
    }

    /**
     * Get datas log
     *
     * @return Object StdClass
     */
    public function get()
    {
        global $wpdb;
        $table = $wpdb->prefix . 'woocommerce_b2w_skyhub_log';
        $results = $wpdb->get_results(
            "SELECT * FROM $table ORDER BY id DESC LIMIT 100"
        );
        return $results;
    }
}
