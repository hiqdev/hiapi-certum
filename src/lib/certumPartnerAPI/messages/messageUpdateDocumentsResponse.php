<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeUpdateDocumentsResponse.php';

/*
<message name="PartnerServicePortType_updateDocumentsResponse">
	<part element="tns:updateDocumentsResponse" name="updateDocumentsResponse">
	</part>
</message>
<xs:element name="updateDocumentsResponse" nillable="true" type="tns:updateDocumentsResponse"/>
*/

/**
 * This class represents the PartnerServicePortType_updateDocumentsResponse WSDL message.
 *
 * It has one part 'updateDocumentsResponse' accessible as property or by invoking a getter method.
 *
 * @property PartnerAPITypeUpdateDocumentsResponse $updateDocumentsResponse
 * @method PartnerAPITypeUpdateDocumentsResponse getUpdateDocumentsResponse()
 * 
 * @package messages
 */
class PartnerAPIMessageUpdateDocumentsResponse extends PartnerAPIMessage {
    
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'updateDocumentsResponse' => new PartnerAPITypeUpdateDocumentsResponse()
        );
    }


}
