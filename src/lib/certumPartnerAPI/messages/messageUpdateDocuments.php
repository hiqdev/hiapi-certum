<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeUpdateDocumentsRequest.php';

/*
<message name="PartnerServicePortType_updateDocuments">
	<part element="tns:updateDocuments" name="updateDocuments">
	</part>
</message>
<xs:element name="updateDocuments" nillable="true" type="tns:updateDocumentsRequest"/>
*/

/**
 * This class represents the PartnerServicePortType_updateDocuments WSDL message.
 *
 * It has one part 'updateDocuments' accessible as property or by invoking a getter method.
 *
 * @method PartnerAPIMessageUpdateDocuments setCredentials(string $userName, string $password) Overriden method. Read documentation for PartnerAPIMessage class
 * @property PartnerAPITypeUpdateDocumentsRequest $updateDocuments
 * @method PartnerAPITypeUpdateDocumentsRequest getUpdateDocuments()
 * 
 * @package messages
 */
class PartnerAPIMessageUpdateDocuments extends PartnerAPIMessage {
    
    /**
     * Defines the part with credentials data.
     * 
     * @var string
     */
    protected $partWithCredentials = 'updateDocuments';
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'updateDocuments' => new PartnerAPITypeUpdateDocumentsRequest()
        );
    }


}
