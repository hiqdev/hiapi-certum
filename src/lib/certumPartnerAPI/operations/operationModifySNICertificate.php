<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'operation.php';
require_once 'certumPartnerAPI/messages/messageModifySNICertificate.php';
require_once 'certumPartnerAPI/messages/messageModifySNICertificateResponse.php';

/*
<operation name="modifySNICertificate" parameterOrder="modifySNICertificate">
	<input message="tns:PartnerServicePortType_modifySNICertificate">
	</input>
	<output message="tns:PartnerServicePortType_modifySNICertificateResponse">
	</output>
</operation>
*/

/**
 * This class represents the modifySNICertificate WSDL operation.
 *
 * It is based on the PartnerAPIOperation class and derives some properties and methods from that class.
 *
 * @method PartnerAPIMessageModifySNICertificateResponse getResponseMessage() A complete response from a service
 * 
 * @package operations
 */
class PartnerAPIOperationModifySNICertificate extends PartnerAPIOperation {

    /**
     * @var PartnerAPIMessageModifySNICertificate
     */
    protected $_input = NULL;

    /**
     * @var PartnerAPIMessageModifySNICertificateResponse
     */
    protected $_output = NULL;

    /**
     * @var string
     */
    protected $_operation = 'modifySNICertificate';

    /**
     * The constructor.
     *
     * It initializes input and output data.
     */
    public function __construct() {
        $this->_input  = new PartnerAPIMessageModifySNICertificate();
        $this->_output = new PartnerAPIMessageModifySNICertificateResponse();
    }

    /**
     * Sets a serial number for the request.
     *
     * It is required to set a serial number or a X509 certificate.
     *
     * @param string $serialNumber
     * @return PartnerAPIOperationModifySNICertificate
     */
    public function setSerialNumber($serialNumber) {
        $this->_input->modifySNICertificate->setSerialNumber($serialNumber);
        return $this;
    }

    /**
     * Sets a X509 certificate for the request.
     *
     * It is required to set a serial number or a X509 certificate.
     *
     * @param string $X509Cert
     * @return PartnerAPIOperationModifySNICertificate
     */
    public function setX509Cert($X509Cert) {
        $this->_input->modifySNICertificate->setX509Cert($X509Cert);
        return $this;
    }

    /**
     * Adds a added serial number to the operation's data.
     *
     * The $serialNumber argument is a string containing a serial number. It can also be an array
     * of such strings.
     * This method can be invoked several times and all passed serial numbers
     * will be added to the existing set of serial numbers.
     *
     * @param string|string[] $serialNumber
     * @return PartnerAPIOperationModifySNICertificate
     */
    public function addAddedSerialNumber($serialNumber) {
        $addSerialNumbers = $this->_input->modifySNICertificate->addSerialNumbers;
        if (is_null($addSerialNumbers)) {
            $addSerialNumbers = new PartnerAPITypeAddSerialNumbers();
            $this->_input->modifySNICertificate->setAddSerialNumbers($addSerialNumbers);
        }
        if (is_array($serialNumber))
            foreach ($serialNumber as $n)
                $addSerialNumbers->addSerialNumber($n);
        else
            $addSerialNumbers->addSerialNumber($serialNumber);
        return $this;
    }

    /**
     * Adds a removed serial number to the operation's data.
     *
     * The $serialNumber argument is a string containing a serial number. It can also be an array
     * of such strings.
     * This method can be invoked several times and all passed serial numbers
     * will be added to the existing set of serial numbers.
     *
     * @param string|string[] $serialNumber
     * @return PartnerAPIOperationModifySNICertificate
     */
    public function addRemovedSerialNumber($serialNumber) {
        $removeSerialNumbers = $this->_input->modifySNICertificate->removeSerialNumbers;
        if (is_null($removeSerialNumbers)) {
            $removeSerialNumbers = new PartnerAPITypeRemoveSerialNumbers();
            $this->_input->modifySNICertificate->setRemoveSerialNumbers($removeSerialNumbers);
        }
        if (is_array($serialNumber))
            foreach ($serialNumber as $n)
                $removeSerialNumbers->addSerialNumber($n);
        else
            $removeSerialNumbers->addSerialNumber($serialNumber);
        return $this;
    }

    /**
     * Sets a hash algorithm for the request.
     *
     * @param string $hashAlgorithm
     * @return PartnerAPIOperationModifySNICertificate
     */
    public function setHashAlgorithm($hashAlgorithm) {
        $this->_input->modifySNICertificate->setHashAlgorithm($hashAlgorithm);
        return $this;
    }

    /**
     * Gets an order ID returned in a response.
     *
     * @return string
     */
    public function getOrderID() {
        return $this->_output->modifySNICertificateResponse->orderID;
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
        $numbers = $this->_output->modifySNICertificateResponse->invalidSerialNumbers;
        if (is_null($numbers))
            return array();
        $number = $numbers->serialNumber;
        if (! is_array($number))
            $number = array($number);
        return $number;
    }

}
