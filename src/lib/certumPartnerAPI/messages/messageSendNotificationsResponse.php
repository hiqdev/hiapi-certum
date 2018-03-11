<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeSendNotificationsResponse.php';

/*
<message name="PartnerServicePortType_sendNotificationsResponse">
	<part element="tns:sendNotificationsResponse" name="sendNotificationsResponse">
	</part>
</message>
<xs:element name="sendNotificationsResponse" nillable="true" type="tns:sendNotificationsResponse"/>
*/

/**
 * This class represents the PartnerServicePortType_sendNotificationsResponse WSDL message.
 *
 * It has one part 'sendNotificationsResponse' accessible as property or by invoking a getter method.
 *
 * @property PartnerAPITypeSendNotificationsResponse $sendNotificationsResponse
 * @method PartnerAPITypeSendNotificationsResponse getSendNotificationsResponse()
 * 
 * @package messages
 */
class PartnerAPIMessageSendNotificationsResponse extends PartnerAPIMessage {
    
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'sendNotificationsResponse' => new PartnerAPITypeSendNotificationsResponse()
        );
    }


}
