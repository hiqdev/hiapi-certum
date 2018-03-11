<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'operation.php';
require_once 'certumPartnerAPI/messages/messageReissueCertificate.php';
require_once 'certumPartnerAPI/messages/messageReissueCertificateResponse.php';

/*
<operation name="reissueCertificate" parameterOrder="reissueCertificate">
	<input message="tns:PartnerServicePortType_reissueCertificate">
	</input>
	<output message="tns:PartnerServicePortType_reissueCertificateResponse">
	</output>
</operation>
*/

/**
 * This class represents the reissueCertificate WSDL operation.
 *
 * It is based on the PartnerAPIOperation class and derives some properties and methods from that class.
 *
 * @method PartnerAPIMessageReissueCertificateResponse getResponseMessage() A complete response from a service
 * 
 * @package operations
 */
class PartnerAPIOperationReissueCertificate extends PartnerAPIOperation {
    
    /**
     * @var PartnerAPIMessageReissueCertificate
     */
    protected $_input = NULL;

    /**
     * @var PartnerAPIMessageReissueCertificateResponse
     */
    protected $_output = NULL;

    /**
     * @var string
     */
    protected $_operation = 'reissueCertificate';

    /**
     * The constructor.
     * 
     * It initializes input and output data.
     */
    public function __construct() {
        $this->_input  = new PartnerAPIMessageReissueCertificate();
        $this->_output = new PartnerAPIMessageReissueCertificateResponse();
    }

    /**
     * Sets a serial number for the request.
     *
     * Setting this value is optional. However, either a serial number or a certificate in PEM format has to be set.
     *
     * @param string $serialNumber
     * @return PartnerAPIOperationReissueCertificate
     */
    public function setSerialNumber($serialNumber) {
        $this->_input->reissueCertificate->setSerialNumber($serialNumber);
        return $this;
    }

    /**
     * Sets a certificate in PEM format for the request.
     *
     * Setting this value is optional. However, either a serial number or a certificate in PEM format has to be set.
     *
     * @param string $X509Cert
     * @return PartnerAPIOperationReissueCertificate
     */
    public function setX509Cert($X509Cert) {
        $this->_input->reissueCertificate->setX509Cert($X509Cert);
        return $this;
    }

    /**
     * Sets a hash algorithm for the request.
     *
     * Setting this value is optional.
     *
     * @param string $hashAlgorithm
     * @return PartnerAPIOperationReissueCertificate
     */
    public function setHashAlgorithm($hashAlgorithm) {
        $this->_input->reissueCertificate->setHashAlgorithm($hashAlgorithm);
        return $this;
    }

    /**
     * Sets a CSR for the request.
     *
     * Setting this value is optional.
     *
     * @param string $CSR
     * @return PartnerAPIOperationReissueCertificate
     */
    public function setCSR($CSR) {
        $this->_input->reissueCertificate->setCSR($CSR);
        return $this;
    }

    /**
     * Returns an order ID contained in a response.
     *
     * @return string
     */
    public function getOrderID() {
        return $this->_output->reissueCertificateResponse->orderID;
    }

}
