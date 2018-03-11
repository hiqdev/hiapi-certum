<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'operation.php';
require_once 'certumPartnerAPI/messages/messageRevokeCertificate.php';
require_once 'certumPartnerAPI/messages/messageRevokeCertificateResponse.php';

/*
<operation name="revokeCertificate" parameterOrder="revokeCertificate">
	<input message="tns:PartnerServicePortType_revokeCertificate">
	</input>
	<output message="tns:PartnerServicePortType_revokeCertificateResponse">
	</output>
</operation>
*/

/**
 * This class represents the revokeCertificate WSDL operation.
 *
 * It is based on the PartnerAPIOperation class and derives some properties and methods from that class.
 *
 * @method PartnerAPIMessageRevokeCertificateResponse getResponseMessage() A complete response from a service
 * 
 * @package operations
 */
class PartnerAPIOperationRevokeCertificate extends PartnerAPIOperation {

    /**
     * @var PartnerAPIMessageRevokeCertificate
     */
    protected $_input = NULL;
    
    /**
     * @var PartnerAPIMessageRevokeCertificateResponse
     */
    protected $_output = NULL;

    /**
     * @var string
     */
    protected $_operation = 'revokeCertificate';
    
    /**
     * The constructor.
     * 
     * It initializes input and output data.
     */
    public function __construct() {
        $this->_input  = new PartnerAPIMessageRevokeCertificate();
        $this->_output = new PartnerAPIMessageRevokeCertificateResponse();
    }

    /**
     * Sets the serial number of a certificate to be revoked.
     * 
     * @param string $serialNumber
     * @return PartnerAPIOperationRevokeCertificate
     */
    public function setSerialNumber($serialNumber) {
        $this->_input->revokeCertificate->revokeCertificateParameters->setSerialNumber($serialNumber);
        return $this;
    }

    /**
     * Sets the key compromitation date.
     * 
     * @param string $kcdate
     * @return PartnerAPIOperationRevokeCertificate
     */
    public function setKeyCompromitationDate($kcdate) {
        $this->_input->revokeCertificate->revokeCertificateParameters->setKeyCompromitationDate($kcdate);
        return $this;
    }
    
    /**
     * Sets a note.
     * 
     * @param string $note
     * @return PartnerAPIOperationRevokeCertificate
     */
    public function setNote($note) {
        $this->_input->revokeCertificate->revokeCertificateParameters->setNote($note);
        return $this;
    }

    /**
     * Sets the revocation reason.
     * 
     * @param string $reason
     * @return PartnerAPIOperationRevokeCertificate
     */
    public function setRevocationReason($reason) {
        $this->_input->revokeCertificate->revokeCertificateParameters->setRevocationReason($reason);
        return $this;
    }

}
