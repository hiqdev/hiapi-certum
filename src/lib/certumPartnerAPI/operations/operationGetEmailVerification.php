<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'operation.php';
require_once 'certumPartnerAPI/messages/messageGetEmailVerification.php';
require_once 'certumPartnerAPI/messages/messageGetEmailVerificationResponse.php';

/*
<operation name="getEmailVerification" parameterOrder="getEmailVerification">
	<input message="tns:PartnerServicePortType_getEmailVerification">
	</input>
	<output message="tns:PartnerServicePortType_getEmailVerificationResponse">
	</output>
</operation>
*/

/**
 * This class represents the getEmailVerification WSDL operation.
 *
 * It is based on the PartnerAPIOperation class and derives some properties and methods from that class.
 *
 * @method PartnerAPIMessageGetEmailVerificationResponse getResponseMessage() A complete response from a service
 * 
 * @package operations
 */
class PartnerAPIOperationGetEmailVerification extends PartnerAPIOperation {
    
    /**
     * @var PartnerAPIMessageGetEmailVerification
     */
    protected $_input = NULL;

    /**
     * @var PartnerAPIMessageGetEmailVerificationResponse
     */
    protected $_output = NULL;

    /**
     * @var string
     */
    protected $_operation = 'getEmailVerification';

    /**
     * The constructor.
     * 
     * It initializes input and output data.
     */
    public function __construct() {
        $this->_input  = new PartnerAPIMessageGetEmailVerification();
        $this->_output = new PartnerAPIMessageGetEmailVerificationResponse();
    }

    /**
     * Sets an order ID for the request.
     *
     * Setting this value is required.
     *
     * @param string $orderID
     * @return PartnerAPIOperationGetEmailVerification
     */
    public function setOrderID($orderID) {
        $this->_input->getEmailVerification->setOrderID($orderID);
        return $this;
    }

    /**
     * Sets whether or not to show all verification methods.
     *
     * @param boolean $showArchived
     * @return PartnerAPIOperationGetEmailVerification
     */
    public function setShowArchived($showArchived) {
        $this->_input->getEmailVerification->setShowArchived($showArchived);
        return $this;
    }

    /**
     * Returns email verification contained in a response.
     *
     * @return PartnerAPITypeEmailVerification
     */
    public function getEmailVerification() {
        return $this->_output->getEmailVerificationResponse->emailVerification;
    }
}
