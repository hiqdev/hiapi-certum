<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeChangeApproversResponse.php';

/*
<message name="PartnerServicePortType_changeApproversResponse">
	<part element="tns:changeApproversResponse" name="changeApproversResponse">
	</part>
</message>
<xs:element name="changeApproversResponse" nillable="true" type="tns:changeApproversResponse"/>
*/

/**
 * This class represents the PartnerServicePortType_changeApproversResponse WSDL message.
 *
 * It has one part 'changeApproversResponse' accessible as property or by invoking a getter method.
 *
 * @property PartnerAPITypeChangeApproversResponse $changeApproversResponse
 * @method PartnerAPITypeChangeApproversResponse getChangeApproversResponse()
 * 
 * @package messages
 */
class PartnerAPIMessageChangeApproversResponse extends PartnerAPIMessage {
    
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'changeApproversResponse' => new PartnerAPITypeChangeApproversResponse()
        );
    }


}
