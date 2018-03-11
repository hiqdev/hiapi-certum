<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeVerifyOrderResponse.php';

/*
<message name="PartnerServicePortType_verifyOrderResponse">
	<part element="tns:verifyOrderResponse" name="verifyOrderResponse">
	</part>
</message>
<xs:element name="verifyOrderResponse" nillable="true" type="tns:verifyOrderResponse"/>
*/

/**
 * This class represents the PartnerServicePortType_verifyOrderResponse WSDL message.
 *
 * It has one part 'verifyOrderResponse' accessible as property or by invoking a getter method.
 *
 * @property PartnerAPITypeVerifyOrderResponse $verifyOrderResponse
 * @method PartnerAPITypeVerifyOrderResponse getVerifyOrderResponse()
 * 
 * @package messages
 */
class PartnerAPIMessageVerifyOrderResponse extends PartnerAPIMessage {
    
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'verifyOrderResponse' => new PartnerAPITypeVerifyOrderResponse()
        );
    }


}
