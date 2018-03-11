<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeVerifyOrderRequest.php';

/*
<message name="PartnerServicePortType_verifyOrder">
	<part element="tns:verifyOrder" name="verifyOrder">
	</part>
</message>
<xs:element name="verifyOrder" nillable="true" type="tns:verifyOrderRequest"/>
*/

/**
 * This class represents the PartnerServicePortType_verifyOrder WSDL message.
 *
 * It has one part 'verifyOrder' accessible as property or by invoking a getter method.
 *
 * @method PartnerAPIMessageVerifyOrder setCredentials(string $userName, string $password) Overriden method. Read documentation for PartnerAPIMessage class
 * @property PartnerAPITypeVerifyOrderRequest $verifyOrder
 * @method PartnerAPITypeVerifyOrderRequest getVerifyOrder()
 * 
 * @package messages
 */
class PartnerAPIMessageVerifyOrder extends PartnerAPIMessage {
    
    /**
     * Defines the part with credentials data.
     * 
     * @var string
     */
    protected $partWithCredentials = 'verifyOrder';
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'verifyOrder' => new PartnerAPITypeVerifyOrderRequest()
        );
    }


}
