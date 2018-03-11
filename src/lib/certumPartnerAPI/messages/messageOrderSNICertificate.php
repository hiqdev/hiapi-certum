<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeOrderSNICertificateRequest.php';

/*
<message name="PartnerServicePortType_orderSNICertificate">
	<part element="tns:orderSNICertificate" name="orderSNICertificate">
	</part>
</message>
<xs:element name="orderSNICertificate" nillable="true" type="tns:orderSNICertificateRequest"/>
*/

/**
 * This class represents the PartnerServicePortType_orderSNICertificate WSDL message.
 *
 * It has one part 'orderSNICertificate' accessible as property or by invoking a getter method.
 *
 * @method PartnerAPIMessageOrderSNICertificate setCredentials(string $userName, string $password) Overriden method. Read documentation for PartnerAPIMessage class
 * @property PartnerAPITypeOrderSNICertificateRequest $orderSNICertificate
 * @method PartnerAPITypeOrderSNICertificateRequest getOrderSNICertificate()
 * 
 * @package messages
 */
class PartnerAPIMessageOrderSNICertificate extends PartnerAPIMessage {
    
    /**
     * Defines the part with credentials data.
     * 
     * @var string
     */
    protected $partWithCredentials = 'orderSNICertificate';
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'orderSNICertificate' => new PartnerAPITypeOrderSNICertificateRequest()
        );
    }


}
