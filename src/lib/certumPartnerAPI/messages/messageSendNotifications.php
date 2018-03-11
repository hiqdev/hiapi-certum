<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeSendNotificationsRequest.php';

/*
<message name="PartnerServicePortType_sendNotifications">
	<part element="tns:sendNotifications" name="sendNotifications">
	</part>
</message>
<xs:element name="sendNotifications" nillable="true" type="tns:sendNotificationsRequest"/>
*/

/**
 * This class represents the PartnerServicePortType_sendNotifications WSDL message.
 *
 * It has one part 'sendNotifications' accessible as property or by invoking a getter method.
 *
 * @method PartnerAPIMessageSendNotifications setCredentials(string $userName, string $password) Overriden method. Read documentation for PartnerAPIMessage class
 * @property PartnerAPITypeSendNotificationsRequest $sendNotifications
 * @method PartnerAPITypeSendNotificationsRequest getSendNotifications()
 * 
 * @package messages
 */
class PartnerAPIMessageSendNotifications extends PartnerAPIMessage {
    
    /**
     * Defines the part with credentials data.
     * 
     * @var string
     */
    protected $partWithCredentials = 'sendNotifications';
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'sendNotifications' => new PartnerAPITypeSendNotificationsRequest()
        );
    }


}
