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

namespace B2W\SkyHub\Exception\Integrator\Catalog\Product\Validation;

use Throwable;

/**
 * Class AttributeRequiredException
 * @package B2W\SkyHub\Exception\Integrator\Catalog\Product\Validation
 */
class DownloadableProductException extends \Exception
{
    /**
     * AttributeRequiredException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $message = 'Cannot integrate downloadable product';
        parent::__construct($message, $code, $previous);
    }
}
