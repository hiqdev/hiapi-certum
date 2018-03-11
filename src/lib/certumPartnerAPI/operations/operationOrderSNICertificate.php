<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'operation.php';
require_once 'certumPartnerAPI/messages/messageOrderSNICertificate.php';
require_once 'certumPartnerAPI/messages/messageOrderSNICertificateResponse.php';

/*
<operation name="orderSNICertificate" parameterOrder="orderSNICertificate">
	<input message="tns:PartnerServicePortType_orderSNICertificate">
	</input>
	<output message="tns:PartnerServicePortType_orderSNICertificateResponse">
	</output>
</operation>
*/

/**
 * This class represents the orderSNICertificate WSDL operation.
 *
 * It is based on the PartnerAPIOperation class and derives some properties and methods from that class.
 *
 * @method PartnerAPIMessageOrderSNICertificateResponse getResponseMessage() A complete response from a service
 * 
 * @package operations
 */
class PartnerAPIOperationOrderSNICertificate extends PartnerAPIOperation {

    /**
     * @var PartnerAPIMessageOrderSNICertificate
     */
    protected $_input = NULL;

    /**
     * @var PartnerAPIMessageOrderSNICertificateResponse
     */
    protected $_output = NULL;

    /**
     * @var string
     */
    protected $_operation = 'orderSNICertificate';

    /**
     * The constructor.
     *
     * It initializes input and output data.
     */
    public function __construct() {
        $this->_input  = new PartnerAPIMessageOrderSNICertificate();
        $this->_output = new PartnerAPIMessageOrderSNICertificateResponse();
    }

    /**
     * Sets a CSR for the request.
     *
     * Setting this value is required.
     *
     * @param string $csr
     * @return PartnerAPIOperationOrderSNICertificate
     */
    public function setCSR($csr) {
        $this->_input->orderSNICertificate->orderSNIParameters->setCSR($csr);
        return $this;
    }

    /**
     * Sets a language to be used for the request.
     *
     * Default is 'pl'.
     *
     * @param string|null $lang
     * @return PartnerAPIOperationOrderSNICertificate
     */
    public function setLanguage($lang) {
        $this->_input->orderSNICertificate->orderSNIParameters->setLanguage($lang);
        return $this;
    }

    /**
     * Sets a hash algorithm to be used for the request.
     *
     * @param string|null $hashAlgorithm
     * @return PartnerAPIOperationOrderSNICertificate
     */
    public function setHashAlgorithm($hashAlgorithm) {
        $this->_input->orderSNICertificate->orderSNIParameters->setHashAlgorithm($hashAlgorithm);
        return $this;
    }

    /**
     * Adds a new serial number to the operation's data.
     *
     * The $number argument is a string containing a serial number. It can also be an array
     * of such strings.
     * This method can be invoked several times and all passed serial numbers
     * will be added to the existing set of serial numbers.
     *
     * It is required to set at least one serial number.
     *
     * @param string|string[] $number
     * @return PartnerAPIOperationOrderSNICertificate
     */
    public function addSerialNumber($number) {
        $serialNumbers = $this->_input->orderSNICertificate->serialNumbers;
        if (is_null($serialNumbers)) {
            $serialNumbers = new PartnerAPITypeSerialNumbers();
            $this->_input->orderSNICertificate->setSerialNumbers($serialNumbers);
        }
        if (is_array($number))
            foreach ($number as $n)
                $serialNumbers->addSerialNumber($n);
        else
            $serialNumbers->addSerialNumber($number);
        return $this;
    }

    /**
     * Sets all the contact data of a requestor.
     *
     * All arguments are required apart from the last which can be NULL.
     *
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $phone
     * @param string $country
     * @param string $postalCode
     * @param string $city
     * @param string $addressLine1
     * @param string|null $addressLine2
     * @return PartnerAPIOperationOrderSNICertificate
     */
    public function setRequestorInfo($firstName, $lastName, $email, $phone, $country, $postalCode, $city, $addressLine1, $addressLine2 = NULL) {
        $ri = $this->_input->orderSNICertificate->requestorInfo;
        $ri->setFirstName($firstName)->setLastName($lastName)
        ->setEmail($email)->setPhone($phone)
        ->setCountry($country)->setPostalCode($postalCode)->setCity($city)
        ->setAddressLine1($addressLine1);
        if (! is_null($addressLine2))
            $ri->setAddressLine2($addressLine2);
        return $this;
    }

    /**
     * Sets an organization information.
     *
     * It is not required to set organization information but if you need or have to set it
     * all the arguments are required.
     *
     * @param string $name The name of an organization
     * @param string $taxNumber The tax identification number
     * @return PartnerAPIOperationOrderSNICertificate
     */
    public function setOrganizationInfo($name, $taxNumber, $verificationPhoneNumber) {
        $oi = new PartnerAPITypeOrganizationInfo();
        $oi->setOrganizationName($name)->setTaxIdentificationNumber($taxNumber)->setVerificationPhoneNumber($verificationPhoneNumber);
        $this->_input->orderSNICertificate->setOrganizationInfo($oi);
        return $this;
    }

    /**
     * Gets an order ID returned in a response.
     *
     * @return string
     */
    public function getOrderID() {
        return $this->_output->orderSNICertificateResponse->orderID;
    }

    /**
     * Returns invalid serial numbers contained in a response.
     *
     * This method always returns an array.
     * If there is no invalid serial number in a response an empty array is returned.
     * Otherwise, an array with one or more invalid serial numbers is returned.
     *
     * @return string[]
     */
    public function getInvalidSerialNumbers() {
        $numbers = $this->_output->orderSNICertificateResponse->invalidSerialNumbers;
        if (is_null($numbers))
            return array();
        $number = $numbers->serialNumber;
        if (! is_array($number))
            $number = array($number);
        return $number;
    }

}
