<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeGetModifiedOrdersRequest.php';

/*
<message name="PartnerServicePortType_getModifiedOrders">
	<part element="tns:getModifiedOrders" name="getModifiedOrders">
	</part>
</message>
<xs:element name="getModifiedOrders" nillable="true" type="tns:getModifiedOrdersRequest"/>
*/

/**
 * This class represents the PartnerServicePortType_getModifiedOrders WSDL message.
 *
 * It has one part 'getModifiedOrders' accessible as property or by invoking a getter method.
 *
 * @method PartnerAPIMessageGetModifiedOrders setCredentials(string $userName, string $password) Overriden method. Read documentation for PartnerAPIMessage class
 * @property PartnerAPITypeGetModifiedOrdersRequest $getModifiedOrders
 * @method PartnerAPITypeGetModifiedOrdersRequest getGetModifiedOrders()
 * 
 * @package messages
 */
class PartnerAPIMessageGetModifiedOrders extends PartnerAPIMessage {
    
    /**
     * Defines the part with credentials data.
     * 
     * @var string
     */
    protected $partWithCredentials = 'getModifiedOrders';
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'getModifiedOrders' => new PartnerAPITypeGetModifiedOrdersRequest()
        );
    }


}
