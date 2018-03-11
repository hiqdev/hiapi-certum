<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeOrderSNICertificateResponse.php';

/*
<message name="PartnerServicePortType_orderSNICertificateResponse">
	<part element="tns:orderSNICertificateResponse" name="orderSNICertificateResponse">
	</part>
</message>
<xs:element name="orderSNICertificateResponse" nillable="true" type="tns:orderSNICertificateResponse"/>
*/

/**
 * This class represents the PartnerServicePortType_orderSNICertificateResponse WSDL message.
 *
 * It has one part 'orderSNICertificateResponse' accessible as property or by invoking a getter method.
 *
 * @property PartnerAPITypeOrderSNICertificateResponse $orderSNICertificateResponse
 * @method PartnerAPITypeOrderSNICertificateResponse getOrderSNICertificateResponse()
 * 
 * @package messages
 */
class PartnerAPIMessageOrderSNICertificateResponse extends PartnerAPIMessage {
    
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'orderSNICertificateResponse' => new PartnerAPITypeOrderSNICertificateResponse()
        );
    }


}
