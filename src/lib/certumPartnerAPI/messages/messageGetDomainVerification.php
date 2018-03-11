<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeGetDomainVerificationRequest.php';

/*
<message name="PartnerServicePortType_getDomainVerification">
	<part element="tns:getDomainVerification" name="getDomainVerification">
	</part>
</message>
<xs:element name="getDomainVerification" nillable="true" type="tns:getDomainVerificationRequest"/>
*/

/**
 * This class represents the PartnerServicePortType_getDomainVerification WSDL message.
 *
 * It has one part 'getDomainVerification' accessible as property or by invoking a getter method.
 *
 * @method PartnerAPIMessageGetDomainVerification setCredentials(string $userName, string $password) Overriden method. Read documentation for PartnerAPIMessage class
 * @property PartnerAPITypeGetDomainVerificationRequest $getDomainVerification
 * @method PartnerAPITypeGetDomainVerificationRequest getGetDomainVerification()
 * 
 * @package messages
 */
class PartnerAPIMessageGetDomainVerification extends PartnerAPIMessage {
    
    /**
     * Defines the part with credentials data.
     * 
     * @var string
     */
    protected $partWithCredentials = 'getDomainVerification';
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'getDomainVerification' => new PartnerAPITypeGetDomainVerificationRequest()
        );
    }


}
