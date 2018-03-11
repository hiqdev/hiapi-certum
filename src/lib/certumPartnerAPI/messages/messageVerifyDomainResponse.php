<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeDomainVerificationResponse.php';

/*
<message name="PartnerServicePortType_verifyDomainResponse">
	<part element="tns:verifyDomainResponse" name="verifyDomainResponse">
	</part>
</message>
<xs:element name="verifyDomainResponse" nillable="true" type="tns:domainVerificationResponse"/>
*/

/**
 * This class represents the PartnerServicePortType_verifyDomainResponse WSDL message.
 *
 * It has one part 'verifyDomainResponse' accessible as property or by invoking a getter method.
 *
 * @property PartnerAPITypeDomainVerificationResponse $verifyDomainResponse
 * @method PartnerAPITypeDomainVerificationResponse getVerifyDomainResponse()
 * 
 * @package messages
 */
class PartnerAPIMessageVerifyDomainResponse extends PartnerAPIMessage {
    
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'verifyDomainResponse' => new PartnerAPITypeDomainVerificationResponse()
        );
    }


}
