<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeGetApproverListRequest.php';

/*
<message name="PartnerServicePortType_getApproverList">
	<part element="tns:getApproverList" name="getApproverList">
	</part>
</message>
<xs:element name="getApproverList" nillable="true" type="tns:getApproverListRequest"/>
*/

/**
 * This class represents the PartnerServicePortType_getApproverList WSDL message.
 *
 * It has one part 'getApproverList' accessible as property or by invoking a getter method.
 *
 * @method PartnerAPIMessageGetApproverList setCredentials(string $userName, string $password) Overriden method. Read documentation for PartnerAPIMessage class
 * @property PartnerAPITypeGetApproverListRequest $getApproverList
 * @method PartnerAPITypeGetApproverListRequest getGetApproverList()
 * 
 * @package messages
 */
class PartnerAPIMessageGetApproverList extends PartnerAPIMessage {
    
    /**
     * Defines the part with credentials data.
     * 
     * @var string
     */
    protected $partWithCredentials = 'getApproverList';
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'getApproverList' => new PartnerAPITypeGetApproverListRequest()
        );
    }


}
