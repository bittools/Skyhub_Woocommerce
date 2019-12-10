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

namespace B2W\SkyHub\Exception\Integrator\Catalog\Product\Validation;

use B2W\SkyHub\Exception\Exception;
use Throwable;

/**
 * Class ProductNotExistException
 * @package B2W\SkyHub\Exception\Integrator\Catalog\Product\Validation
 */
class ProductNotExistException extends Exception
{
    /**
     * ProductNotExistException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        if (empty($message)) {
            $message = 'Product not exist in your system';
        }

        parent::__construct($message, $code, $previous);
    }
}