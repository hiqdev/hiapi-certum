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
<message name="PartnerServicePortType_getOrdersByDateRangeResponse">
	<part element="tns:getOrdersByDateRangeResponse" name="getOrdersByDateRangeResponse">
	</part>
</message>
<xs:element name="getOrdersByDateRangeResponse" nillable="true" type="tns:getOrdersResponse"/>
*/

/**
 * This class represents the PartnerServicePortType_getOrdersByDateRangeResponse WSDL message.
 *
 * It has one part 'getOrdersByDateRangeResponse' accessible as property or by invoking a getter method.
 *
 * @property PartnerAPITypeGetOrdersResponse $getOrdersByDateRangeResponse
 * @method PartnerAPITypeGetOrdersResponse getGetOrdersByDateRangeResponse()
 * 
 * @package messages
 */
class PartnerAPIMessageGetOrdersByDateRangeResponse extends PartnerAPIMessage {
    
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'getOrdersByDateRangeResponse' => new PartnerAPITypeGetOrdersResponse()
        );
    }


}
