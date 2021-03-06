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

namespace B2W\SkyHub\Contract\Entity\Order\Payment;

/**
 * Interface SefazEntityInterface
 * @package B2W\SkyHub\Contract\Entity\Order\Payment
 */
interface SefazEntityInterface
{
    /**
     * @return string
     */
    public function getTypeIntegration();

    /**
     * @param $typeIntegration
     * @return string
     */
    public function setTypeIntegration($typeIntegration);

    /**
     * @return string
     */
    public function getPaymentIndicator();

    /**
     * @param $paymentIndicator
     * @return string
     */
    public function setPaymentIndicator($paymentIndicator);

    /**
     * @return string
     */
    public function getNamePayment();

    /**
     * @param $namePayment
     * @return string
     */
    public function setNamePayment($namePayment);

    /**
     * @return string
     */
    public function getNameCardIssuer();

    /**
     * @param $nameCardIssuer
     * @return string
     */
    public function setNameCardIssuer($nameCardIssuer);

    /**
     * @return string
     */
    public function getIdPayment();

    /**
     * @param $idPayment
     * @return string
     */
    public function setIdPayment($idPayment);

    /**
     * @return string
     */
    public function getIdCardIssuer();

    /**
     * @param $idCardIssuer
     * @return string
     */
    public function setIdCardIssuer($idCardIssuer);
}
