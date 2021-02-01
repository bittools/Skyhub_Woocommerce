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

namespace B2W\SkyHub\Model\Transformer\Product\Variation;

use B2W\SkyHub\Model\Entity\Product\VariationEntity;
use B2W\SkyHub\Model\Resource\Collection;
use B2W\SkyHub\Model\Transformer\EntityToApiAbstract;
use SkyHub\Api\EntityInterface\Catalog\Product\Variation;

/**
 * Class EntityToApi
 * @package B2W\SkyHub\Model\Transformer\Product\Variation
 */
class EntityToApi
{
    /**
     * @param Collection $collection
     * @param EntityToApiAbstract $parentTranformer
     * @return null
     * @throws \Exception
     */
    public function convert(Collection $collection, $parentTranformer)
    {
        /** @var \SkyHub\Api\EntityInterface\Catalog\Product $productInterface */
        $productInterface   = $parentTranformer->getInterface();

        /** @var VariationEntity $variation */
        foreach ($collection as $variation) {
            /** @var Variation $interface */
            $interface = $productInterface->addVariation(
                $variation->getSku(),
                $variation->getQty(),
                $variation->getEan()
            );

            $this->_addImages($variation, $interface);
            $this->_addSpecifications($variation, $interface);
        }

        return null;
    }

    /**
     * @param VariationEntity $variation
     * @param Variation $interface
     * @return $this
     */
    protected function _addImages(VariationEntity $variation, Variation $interface)
    {
        if (!$variation->getImages()) {
            return $this;
        }

        foreach ($variation->getImages() as $img) {
            $interface->addImage($img);
        }

        return $this;
    }

    /**
     * @param VariationEntity $variation
     * @param Variation $interface
     * @return $this
     * @throws \Exception
     */
    protected function _addSpecifications(VariationEntity $variation, Variation $interface)
    {
        /** @var \B2W\SkyHub\Contract\Entity\Product\SpecificationEntityInterface $spec */
        foreach ($variation->getSpecifications() as $spec) {
            if (!$spec->getOption()) {
                $interface->addSpecification(
                    $spec->getAttribute(),
                    $this->getValue($spec->getValue())
                );
                continue;
            }

            $interface->addSpecification(
                $spec->getAttribute()->getCode(),
                $this->getValue($spec->getOption()->getLabel())
            );
        }

        //price is an special specification
        $interface->addSpecification(
            'price',
            $this->getValue($variation->getPrice())
        );

        //promotional_price is an special specification
        $interface->addSpecification(
            'promotional_price',
            $this->getValue($variation->getPromotionalPrice())
        );

        return $this;
    }

    /**
     * Return value
     *
     * @param mixed $value
     * @return string
     */
    protected function getValue($value = null)
    {
        if (!$value) {
            return '';
        }

        if (empty($value)) {
            return '';
        }
        return $value;
    }
}
