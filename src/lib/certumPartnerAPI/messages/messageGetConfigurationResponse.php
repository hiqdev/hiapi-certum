<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeGetConfigurationResponse.php';

/*
<message name="PartnerServicePortType_getConfigurationResponse">
	<part element="tns:getConfigurationResponse" name="getConfigurationResponse">
	</part>
</message>
<xs:element name="getConfigurationResponse" nillable="true" type="tns:getConfigurationResponse"/>
*/

/**
 * This class represents the PartnerServicePortType_getConfigurationResponse WSDL message.
 *
 * It has one part 'getConfigurationResponse' accessible as property or by invoking a getter method.
 *
 * @property PartnerAPITypeGetConfigurationResponse $getConfigurationResponse
 * @method PartnerAPITypeGetConfigurationResponse getGetConfigurationResponse()
 * 
 * @package messages
 */
class PartnerAPIMessageGetConfigurationResponse extends PartnerAPIMessage {
    
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'getConfigurationResponse' => new PartnerAPITypeGetConfigurationResponse()
        );
    }


}
