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

namespace B2W\SkyHub\Contracts\Sales\Order\Address;


/**
 * Interface Entity
 * @package B2W\SkyHub\Contracts\Sales\Order\Address
 */
interface Entity
{
    /**
     * @return string
     */
    public function getStreet();

    /**
     * @param $street
     * @return string
     */
    public function setStreet($street);

    /**
     * @return string
     */
    public function getNumber();

    /**
     * @param $number
     * @return string
     */
    public function setNumber($number);

    /**
     * @return string
     */
    public function getDetail();

    /**
     * @param $detail
     * @return string
     */
    public function setDetail($detail);

    /**
     * @return string
     */
    public function getNeighborhood();

    /**
     * @param $neighborhood
     * @return string
     */
    public function setNeighborhood($neighborhood);

    /**
     * @return string
     */
    public function getCity();

    /**
     * @param $city
     * @return string
     */
    public function setCity($city);

    /**
     * @return string
     */
    public function getRegion();

    /**
     * @param $region
     * @return string
     */
    public function setRegion($region);

    /**
     * @return string
     */
    public function getCountry();

    /**
     * @param $country
     * @return string
     */
    public function setCountry($country);

    /**
     * @return string
     */
    public function getPostcode();

    /**
     * @param $postcode
     * @return string
     */
    public function setPostcode($postcode);

    /**
     * @return string
     */
    public function getReference();

    /**
     * @param $reference
     * @return string
     */
    public function setReference($reference);

    /**
     * @return string
     */
    public function getComplement();

    /**
     * @param $complement
     * @return string
     */
    public function setComplement($complement);

    /**
     * @return string
     */
    public function getPhone();

    /**
     * @param $phone
     * @return string
     */
    public function setPhone($phone);

    /**
     * @return string
     */
    public function getSecondaryPhone();

    /**
     * @param $secondary_phone
     * @return string
     */
    public function setSecondaryPhone($secondary_phone);
}
