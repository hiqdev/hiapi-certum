<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'operation.php';
require_once 'certumPartnerAPI/messages/messageChangeApprovers.php';
require_once 'certumPartnerAPI/messages/messageChangeApproversResponse.php';

/*
<operation name="changeApprovers" parameterOrder="changeApprovers">
	<input message="tns:PartnerServicePortType_changeApprovers">
	</input>
	<output message="tns:PartnerServicePortType_changeApproversResponse">
	</output>
</operation>
*/

/**
 * This class represents the changeApprovers WSDL operation.
 *
 * It is based on the PartnerAPIOperation class and derives some properties and methods from that class.
 *
 * @method PartnerAPIMessageChangeApproversResponse getResponseMessage() A complete response from a service
 * 
 * @package operations
 */
class PartnerAPIOperationChangeApprovers extends PartnerAPIOperation {

    /**
     * @var PartnerAPIMessageChangeApprovers
     */
    protected $_input = NULL;
    
    /**
     * @var PartnerAPIMessageChangeApproversResponse
     */
    protected $_output = NULL;

    /**
     * @var string
     */
    protected $_operation = 'changeApprovers';
    
    /**
     * The constructor.
     * 
     * It initializes input and output data.
     */
    public function __construct() {
        $this->_input  = new PartnerAPIMessageChangeApprovers();
        $this->_output = new PartnerAPIMessageChangeApproversResponse();
    }

    /**
     * Sets an order ID for the request.
     *
     * Setting this value is required.
     *
     * @param string $orderID
     * @return PartnerAPIOperationChangeApprovers
     */
    public function setOrderID($orderID) {
    	$this->_input->changeApprovers->setOrderID($orderID);
    	return $this;
    }
    
    /**
     * Sets the verificationNotificationEnabled parameter for the request.
     *
     * Setting this parameter is optional.
     *
     * @param boolean|null $yes_or_no
     * @return PartnerAPIOperationChangeApprovers
     */
    public function setVerificationNotificationEnabled($yes_or_no) {
        $this->_input->changeApprovers->setVerificationNotificationEnabled($yes_or_no);
        return $this;
    }
    
    /**
     * Sets an approving method.
     *
     * It is required to set an approver.
     *
     * The $FQDN argument is required to be given.
     * The $email and $method arguments are optional and it depends on the kind
     * of a request which argument to pass (both of them can be passed as well).
     * Important: You may pass only one e-mail and only one method although the WSDL file
     * and the PartnerAPITypeApprover class have diffrent definitions.
     *
     * @param string $FQDN A domain name
     * @param string $email An e-mail used for verification
     * @param string $method A verification method
     * @return PartnerAPIOperationChangeApprovers
     */
    public function setApprover($FQDN, $email = NULL, $method = NULL) {
    	$approver = new PartnerAPITypeApprover();
    	$approver->setFQDN($FQDN);
    	if (! is_null($email))
    		$approver->setApproverEmail($email);
    	if (! is_null($method))
    		$approver->setApproveMethod($method);
    	$this->_input->changeApprovers->setApprover($approver);
    	return $this;
    }
    
    public function getVerification() {
        return $this->_output->changeApproversResponse->verification;
    }
}
