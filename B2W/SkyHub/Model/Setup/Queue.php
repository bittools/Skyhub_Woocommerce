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

namespace B2W\SkyHub\Model\Setup;


/**
 * Class Queue
 * @package B2W\SkyHub\Model\Setup
 */
class Queue extends AbstractSetup
{
    const TABLE = 'woocommerce_b2w_skyhub_queue';

    public function getTable()
    {
        return self::TABLE;
    }

    /**
     * @return $this
     */
    public function install()
    {
        global $wpdb;

        $charsetCollate = $wpdb->get_charset_collate();
        $tableName      = $wpdb->prefix . self::TABLE;

        $sql = "CREATE TABLE IF NOT EXISTS $tableName (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
            updated_at DATETIME ON UPDATE CURRENT_TIMESTAMP NOT NULL,
            status VARCHAR(20) DEFAULT 'pending' NOT NULL,
            type VARCHAR(20) DEFAULT 'default' NOT NULL,
            message_type VARCHAR(100) NOT NULL,
            params VARCHAR(200),
            UNIQUE KEY id (id)
        ) $charsetCollate;";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        dbDelta($sql);

        return $this;
    }
}
