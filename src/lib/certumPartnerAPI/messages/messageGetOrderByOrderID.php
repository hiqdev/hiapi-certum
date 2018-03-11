<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeGetOrderByOrderIDRequest.php';

/*
<message name="PartnerServicePortType_getOrderByOrderID">
	<part element="tns:getOrderByOrderID" name="getOrderByOrderID">
	</part>
</message>
<xs:element name="getOrderByOrderID" nillable="true" type="tns:getOrderByOrderIDRequest"/>
*/

/**
 * This class represents the PartnerServicePortType_getOrderByOrderID WSDL message.
 *
 * It has one part 'getOrderByOrderID' accessible as property or by invoking a getter method.
 *
 * @method PartnerAPIMessageGetOrderByOrderID setCredentials(string $userName, string $password) Overriden method. Read documentation for PartnerAPIMessage class
 * @property PartnerAPITypeGetOrderByOrderIDRequest $getOrderByOrderID
 * @method PartnerAPITypeGetOrderByOrderIDRequest getGetOrderByOrderID()
 * 
 * @package messages
 */
class PartnerAPIMessageGetOrderByOrderID extends PartnerAPIMessage {
    
    /**
     * Defines the part with credentials data.
     * 
     * @var string
     */
    protected $partWithCredentials = 'getOrderByOrderID';
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'getOrderByOrderID' => new PartnerAPITypeGetOrderByOrderIDRequest()
        );
    }


}
