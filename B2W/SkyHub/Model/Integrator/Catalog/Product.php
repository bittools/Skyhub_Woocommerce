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

namespace B2W\SkyHub\Model\Integrator\Catalog;

use B2W\SkyHub\Model\Catalog\Product\Entity;
use B2W\SkyHub\Model\Integrator\Catalog\Product\Validation;
use B2W\SkyHub\Model\Integrator\IntegratorAbstract;
use B2W\SkyHub\Model\Transformer\Catalog\Product\Api;

/**
 * Class Product
 * @package B2W\SkyHub\Model\Integrator\Catalog
 */
class Product extends IntegratorAbstract
{
    /**
     * @var string
     */
    protected $eventType = 'catalog_product';

    /**
     * @param Entity $product
     * @return bool|null|\SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function createOrUpdate(Entity $product)
    {
        /**
         * Update Product
         *
         * @var bool|\SkyHub\Api\Handler\Response\HandlerInterface $response
         */
        $response = $this->update($product);

        if ($response && $response->success()) {
            return $response;
        }

        /** Create Product */
        $response = $this->create($product);

        return $response;
    }

    /**
     * @param Entity $product
     * @return null|\SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function create(Entity $product)
    {
        $response = null;

        try {
            Validation::validate($product);

            /** @var \SkyHub\Api\EntityInterface\Catalog\Product $interface */
            $interface = Api::convert($product);

            $this->eventMethod = 'create';
            $this->eventParams = array(
                'product'   => $product,
                'interface' => $interface,
            );

            $this->beforeIntegration();

            $response = $interface->create();

            \App::log('Product '. $product->getSku() . ' created at Skyhub');

            $this->eventParams['response'] = $response;

            $this->afterIntegration();

        } catch (\Exception $e) {
            \App::logException($e);
        }

        return $response;
    }

    /**
     * @param Entity $product
     * @return null|\SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function update(Entity $product)
    {
        $response = null;

        try {
            Validation::validate($product);

            $interface = Api::convert($product);

            $this->eventMethod = 'update';
            $this->eventParams = array(
                'product'   => $product,
                'interface' => $interface,
            );

            $this->beforeIntegration();

            $response = $interface->update();

            \App::log('Product '. $product->getSku() . ' updated at Skyhub');

            $this->eventParams['response'] = $response;
            $this->afterIntegration();

        } catch (\Exception $e) {
            \App::logException($e);
        }

        return $response;
    }
}
