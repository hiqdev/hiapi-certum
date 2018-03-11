<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeQuickOrderRequest.php';

/*
<message name="PartnerServicePortType_quickOrder">
	<part element="tns:quickOrder" name="quickOrder">
	</part>
</message>
<xs:element name="quickOrder" nillable="true" type="tns:quickOrderRequest"/>
*/

/**
 * This class represents the PartnerServicePortType_quickOrder WSDL message.
 *
 * It has one part 'quickOrder' accessible as property or by invoking a getter method.
 *
 * @method PartnerAPIMessageQuickOrder setCredentials(string $userName, string $password) Overriden method. Read documentation for PartnerAPIMessage class
 * @property PartnerAPITypeQuickOrderRequest $quickOrder
 * @method PartnerAPITypeQuickOrderRequest getQuickOrder()
 * 
 * @package messages
 */
class PartnerAPIMessageQuickOrder extends PartnerAPIMessage {
    
    /**
     * Defines the part with credentials data.
     * 
     * @var string
     */
    protected $partWithCredentials = 'quickOrder';
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'quickOrder' => new PartnerAPITypeQuickOrderRequest()
        );
    }


}
