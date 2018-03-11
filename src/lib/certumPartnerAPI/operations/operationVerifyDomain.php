<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'operation.php';
require_once 'certumPartnerAPI/messages/messageVerifyDomain.php';
require_once 'certumPartnerAPI/messages/messageVerifyDomainResponse.php';

/*
<operation name="verifyDomain" parameterOrder="verifyDomain">
	<input message="tns:PartnerServicePortType_verifyDomain">
	</input>
	<output message="tns:PartnerServicePortType_verifyDomainResponse">
	</output>
</operation>
*/

/**
 * This class represents the verifyDomain WSDL operation.
 *
 * It is based on the PartnerAPIOperation class and derives some properties and methods from that class.
 *
 * @method PartnerAPIMessageVerifyDomainResponse getResponseMessage() A complete response from a service
 * 
 * @package operations
 */
class PartnerAPIOperationVerifyDomain extends PartnerAPIOperation {

    /**
     * @var PartnerAPIMessageVerifyDomain
     */
    protected $_input = NULL;
    
    /**
     * @var PartnerAPIMessageVerifyDomainResponse
     */
    protected $_output = NULL;

    /**
     * @var string
     */
    protected $_operation = 'verifyDomain';
    
    /**
     * The constructor.
     * 
     * It initializes input and output data.
     */
    public function __construct() {
        $this->_input  = new PartnerAPIMessageVerifyDomain();
        $this->_output = new PartnerAPIMessageVerifyDomainResponse();
    }

    /**
     * Sets a verification code for the request.
     *
     * Setting this value is required.
     *
     * @param string $code
     * @return PartnerAPIOperationVerifyDomain
     */
    public function setCode($code) {
    	$this->_input->verifyDomain->setCode($code);
    	return $this;
    }
    
    /**
     * Returns the expire date of an verification code from a response.
     *
     * @return string|null
     */
    public function getExpireDate() {
    	return $this->_output->verifyDomainResponse->expireDate;
    }
    
}
