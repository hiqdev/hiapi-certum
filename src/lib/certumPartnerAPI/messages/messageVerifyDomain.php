<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeDomainVerificationRequest.php';

/*
<message name="PartnerServicePortType_verifyDomain">
	<part element="tns:verifyDomain" name="verifyDomain">
	</part>
</message>
<xs:element name="verifyDomain" nillable="true" type="tns:domainVerificationRequest"/>
*/

/**
 * This class represents the PartnerServicePortType_verifyDomain WSDL message.
 *
 * It has one part 'verifyDomain' accessible as property or by invoking a getter method.
 *
 * @method PartnerAPIMessageVerifyDomain setCredentials(string $userName, string $password) Overriden method. Read documentation for PartnerAPIMessage class
 * @property PartnerAPITypeDomainVerificationRequest $verifyDomain
 * @method PartnerAPITypeDomainVerificationRequest getVerifyDomain()
 * 
 * @package messages
 */
class PartnerAPIMessageVerifyDomain extends PartnerAPIMessage {
    
    /**
     * Defines the part with credentials data.
     * 
     * @var string
     */
    protected $partWithCredentials = 'verifyDomain';
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'verifyDomain' => new PartnerAPITypeDomainVerificationRequest()
        );
    }


}
