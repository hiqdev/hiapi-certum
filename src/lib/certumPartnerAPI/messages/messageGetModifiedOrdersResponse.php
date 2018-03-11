<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeGetOrdersResponse.php';

/*
<message name="PartnerServicePortType_getModifiedOrdersResponse">
	<part element="tns:getModifiedOrdersResponse" name="getModifiedOrdersResponse">
	</part>
</message>
<xs:element name="getModifiedOrdersResponse" nillable="true" type="tns:getOrdersResponse"/>
*/

/**
 * This class represents the PartnerServicePortType_getModifiedOrdersResponse WSDL message.
 *
 * It has one part 'getModifiedOrdersResponse' accessible as property or by invoking a getter method.
 *
 * @property PartnerAPITypeGetOrdersResponse $getModifiedOrdersResponse
 * @method PartnerAPITypeGetOrdersResponse getGetModifiedOrdersResponse()
 * 
 * @package messages
 */
class PartnerAPIMessageGetModifiedOrdersResponse extends PartnerAPIMessage {
    
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'getModifiedOrdersResponse' => new PartnerAPITypeGetOrdersResponse()
        );
    }


}
