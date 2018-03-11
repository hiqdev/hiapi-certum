<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'operation.php';
require_once 'certumPartnerAPI/messages/messageSendNotifications.php';
require_once 'certumPartnerAPI/messages/messageSendNotificationsResponse.php';

/*
<operation name="sendNotifications" parameterOrder="sendNotifications">
	<input message="tns:PartnerServicePortType_sendNotifications">
	</input>
	<output message="tns:PartnerServicePortType_sendNotificationsResponse">
	</output>
</operation>
*/

/**
 * This class represents the sendNotifications WSDL operation.
 *
 * It is based on the PartnerAPIOperation class and derives some properties and methods from that class.
 *
 * @method PartnerAPIMessageSendNotificationsResponse getResponseMessage() A complete response from a service
 * 
 * @package operations
 */
class PartnerAPIOperationSendNotifications extends PartnerAPIOperation {

    /**
     * @var PartnerAPIMessageSendNotifications
     */
    protected $_input = NULL;
    
    /**
     * @var PartnerAPIMessageSendNotificationsResponse
     */
    protected $_output = NULL;

    /**
     * @var string
     */
    protected $_operation = 'sendNotifications';
    
    /**
     * The constructor.
     * 
     * It initializes input and output data.
     */
    public function __construct() {
        $this->_input  = new PartnerAPIMessageSendNotifications();
        $this->_output = new PartnerAPIMessageSendNotificationsResponse();
    }
    
    /**
     * Sets an order ID for the request.
     * 
     * Setting this value is required.
     * 
     * @param string $orderID
     * @return PartnerAPIOperationSendNotifications
     */
    public function setOrderID($orderID) {
        $this->_input->sendNotifications->setOrderID($orderID);
        return $this;
    }

    /**
     * Sets the verificationNotificationEnabled parameter for the request.
     * 
     * Setting this parameter is optional.
     *  
     * @param boolean|null $yes_or_no
     * @return PartnerAPIOperationSendNotifications
     */
    public function setVerificationNotificationEnabled($yes_or_no) {
        $this->_input->sendNotifications->setVerificationNotificationEnabled($yes_or_no);
        return $this;
    }
    
    /**
     * Returns verifications contained in a response.
     *
     * This method always returns an array.
     * If there is no verification in the response an empty array is returned.
     * Otherwise, an array with one or more verifications is returned.
     * Keys in the array are FQDNs
     * and values are objects of type PartnerAPITypeVerification.
     *
     * @return PartnerAPITypeDomain[]
     */
    public function getVerifications() {
        $verList = array();
		
		try {
			$vers = $this->_output->getSendNotificationsResponse()->verifications;
		} catch (PartnerAPIException $e) {
			return $verList;
		}
		
        if (is_null($vers))
            return $verList;
        $ver = $vers->verification;
        if (is_array($ver))
            foreach ($ver as $v)
                $verList[$v->fQDN] = $v;
        else
            $verList[$ver->fQDN] = $ver;
        return $verList;
    }
    
}
