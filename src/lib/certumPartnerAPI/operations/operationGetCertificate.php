<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'operation.php';
require_once 'certumPartnerAPI/messages/messageGetCertificate.php';
require_once 'certumPartnerAPI/messages/messageGetCertificateResponse.php';

/*
<operation name="getCertificate" parameterOrder="getCertificate">
	<input message="tns:PartnerServicePortType_getCertificate">
	</input>
	<output message="tns:PartnerServicePortType_getCertificateResponse">
	</output>
</operation>
*/

/**
 * This class represents the getCertificate WSDL operation.
 *
 * It is based on the PartnerAPIOperation class and derives some properties and methods from that class.
 *
 * @method PartnerAPIMessageGetCertificateResponse getResponseMessage() A complete response from a service
 * 
 * @package operations
 */
class PartnerAPIOperationGetCertificate extends PartnerAPIOperation {

    /**
     * @var PartnerAPIMessageGetCertificate
     */
    protected $_input = NULL;

    /**
     * @var PartnerAPIMessageGetCertificateResponse
     */
    protected $_output = NULL;

    /**
     * @var string
     */
    protected $_operation = 'getCertificate';

    /**
     * The constructor.
     *
     * It initializes input and output data.
     */
    public function __construct() {
        $this->_input  = new PartnerAPIMessageGetCertificate();
        $this->_output = new PartnerAPIMessageGetCertificateResponse();
    }

    /**
     * Sets an order ID for the request.
     *
     * It is required to set orderID or serialNumber value but only one
     * of them may be set. Setting both values is an error.
     *
     * @param string $orderID
     * @return PartnerAPIOperationGetCertificate
     */
    public function setOrderID($orderID) {
        $this->_input->getCertificate->setOrderID($orderID);
        return $this;
    }

    /**
     * Sets the serial number of a certificate for the request.
     *
     * It is required to set orderID or serialNumber value but only one
     * of them may be set. Setting both values is an error.
     *
     * @param string $serialNumber
     * @return PartnerAPIOperationGetCertificate
     */
    public function setSerialNumber($serialNumber) {
        $this->_input->getCertificate->setSerialNumber($serialNumber);
        return $this;
    }

    /**
     * Returns certificate details contained in a response.
     *
     * @return PartnerAPITypeCertificateDetails|null
     */
    public function getCertificateDetails() {
        return $this->_output->getCertificateResponse->certificateDetails;
    }

    /**
     * Returns CA bundle contained in a response.
     *
     * @return PartnerAPITypeCaBundle|null
     */
    public function getCaBundle() {
        return $this->_output->getCertificateResponse->caBundle;
    }

}
