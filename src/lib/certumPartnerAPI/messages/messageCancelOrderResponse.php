<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeCancelOrderReponse.php';

/*
<message name="PartnerServicePortType_cancelOrderResponse">
	<part element="tns:cancelOrderResponse" name="cancelOrderResponse">
	</part>
</message>
<xs:element name="cancelOrderResponse" nillable="true" type="tns:cancelOrderReponse"/>
*/

/**
 * This class represents the PartnerServicePortType_cancelOrderResponse WSDL message.
 *
 * It has one part 'cancelOrderResponse' accessible as property or by invoking a getter method.
 *
 * @property PartnerAPITypeCancelOrderReponse $cancelOrderResponse
 * @method PartnerAPITypeCancelOrderReponse getCancelOrderResponse()
 * 
 * @package messages
 */
class PartnerAPIMessageCancelOrderResponse extends PartnerAPIMessage {
    
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'cancelOrderResponse' => new PartnerAPITypeCancelOrderReponse()
        );
    }


}
