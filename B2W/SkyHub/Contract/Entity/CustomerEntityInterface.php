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

namespace B2W\SkyHub\Contract\Entity;

/**
 * Interface CustomerEntityInterface
 * @package B2W\SkyHub\Contract\Entity
 */
interface CustomerEntityInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param $id
     * @return int
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param $name
     * @return string
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @param $email
     * @return string
     */
    public function setEmail($email);

    /**
     * @return \DateTime
     */
    public function getDateOfBirth();

    /**
     * @param $dateOfBirth
     * @return \DateTime
     */
    public function setDateOfBirth($dateOfBirth);

    /**
     * @return string
     */
    public function getGender();

    /**
     * @param $gender
     * @return string
     */
    public function setGender($gender);

    /**
     * @return string
     */
    public function getVatNumber();

    /**
     * @param $vatNumber
     * @return string
     */
    public function setVatNumber($vatNumber);

    /**
     * @return array
     */
    public function getPhones();

    /**
     * @param $phones
     * @return array
     */
    public function setPhones($phones);

    /**
     * @return string
     */
    public function getStateRegistration();

    /**
     * @param $stateRegistration
     * @return string
     */
    public function setStateRegistration($stateRegistration);
}
