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

namespace B2W\SkyHub\Controller\Admin;

use B2W\SkyHub\Model\Map\MapAttribute;
use B2W\SkyHub\Model\Map\Order\StatusMap;
use B2W\SkyHub\View\Admin\Admin;
use B2W\SkyHub\View\Admin\ViewAbstract;

/**
 * Class Status
 * @package B2W\SkyHub\Controller\Admin
 */
class Status extends AdminControllerAbstract
{
    /**
     *
     */
    const STATUS_PREFIX = 'status_';

    /**
     * @return $this|mixed
     * @throws \B2W\SkyHub\Exception\Helper\HelperNotFound
     */
    public function save()
    {
        if (!isset($_POST[ViewAbstract::NONCE_FIELD])) {
            return $this;
        }

        if (!($this->validateNonce() && current_user_can( 'manage_options' ))) {
            $this->_redirect();
            exit;
        }

        $map = new StatusMap();

        foreach ($map->map() as $attr) {
            if (!isset($_POST[self::STATUS_PREFIX . $attr->getSkyhub()])) {
                return $this;
            }

            $map->setRelated($attr->getSkyhub(), $_POST[self::STATUS_PREFIX . $attr->getSkyhub()]);
        }

        try {
            $this->_validate($map);
        } catch (\Exception $e) {
            $this->_redirect('admin.php?page='. Admin::SLUG);
            return $this;
        }

        $map->save();

        $this->_redirect('admin.php?page='. Admin::SLUG);

        return $this;
    }

    protected function _validate($map)
    {
        $valid = array();

        /** @var MapAttribute $map */
        foreach ($map->map() as $map) {
            if (in_array($map->getWordpress(), $valid)) {
                throw new \B2W\SkyHub\Exception\Exception('Os status devem ser únicos');
            }

            $valid[] = $map->getWordpress();
        }

        return $this;
    }
}
