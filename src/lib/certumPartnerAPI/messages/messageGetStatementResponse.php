<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeGetStatementResponse.php';

/*
<message name="PartnerServicePortType_getStatementResponse">
	<part element="tns:getStatementResponse" name="getStatementResponse">
	</part>
</message>
<xs:element name="getStatementResponse" nillable="true" type="tns:getStatementResponse"/>
*/

/**
 * This class represents the PartnerServicePortType_getStatementResponse WSDL message.
 *
 * It has one part 'getStatementResponse' accessible as property or by invoking a getter method.
 *
 * @property PartnerAPITypeGetStatementResponse $getStatementResponse
 * @method PartnerAPITypeGetStatementResponse getGetStatementResponse()
 * 
 * @package messages
 */
class PartnerAPIMessageGetStatementResponse extends PartnerAPIMessage {
    
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'getStatementResponse' => new PartnerAPITypeGetStatementResponse()
        );
    }


}
