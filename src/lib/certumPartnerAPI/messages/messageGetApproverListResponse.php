<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeGetApproverListResponse.php';

/*
<message name="PartnerServicePortType_getApproverListResponse">
	<part element="tns:getApproverListResponse" name="getApproverListResponse">
	</part>
</message>
<xs:element name="getApproverListResponse" nillable="true" type="tns:getApproverListResponse"/>
*/

/**
 * This class represents the PartnerServicePortType_getApproverListResponse WSDL message.
 *
 * It has one part 'getApproverListResponse' accessible as property or by invoking a getter method.
 *
 * @property PartnerAPITypeGetApproverListResponse $getApproverListResponse
 * @method PartnerAPITypeGetApproverListResponse getGetApproverListResponse()
 * 
 * @package messages
 */
class PartnerAPIMessageGetApproverListResponse extends PartnerAPIMessage {
    
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'getApproverListResponse' => new PartnerAPITypeGetApproverListResponse()
        );
    }


}
