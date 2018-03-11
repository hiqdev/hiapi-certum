<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeGetDomainVerificationResponse.php';

/*
<message name="PartnerServicePortType_getDomainVerificationResponse">
	<part element="tns:getDomainVerificationResponse" name="getDomainVerificationResponse">
	</part>
</message>
<xs:element name="getDomainVerificationResponse" nillable="true" type="tns:getDomainVerificationResponse"/>
*/

/**
 * This class represents the PartnerServicePortType_getDomainVerificationResponse WSDL message.
 *
 * It has one part 'getDomainVerificationResponse' accessible as property or by invoking a getter method.
 *
 * @property PartnerAPITypeGetDomainVerificationResponse $getDomainVerificationResponse
 * @method PartnerAPITypeGetDomainVerificationResponse getGetDomainVerificationResponse()
 * 
 * @package messages
 */
class PartnerAPIMessageGetDomainVerificationResponse extends PartnerAPIMessage {
    
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'getDomainVerificationResponse' => new PartnerAPITypeGetDomainVerificationResponse()
        );
    }


}
