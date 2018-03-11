<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeRenewCertificateRequest.php';

/*
<message name="PartnerServicePortType_renewCertificate">
	<part element="tns:renewCertificate" name="renewCertificate">
	</part>
</message>
<xs:element name="renewCertificate" nillable="true" type="tns:renewCertificateRequest"/>
*/

/**
 * This class represents the PartnerServicePortType_renewCertificate WSDL message.
 *
 * It has one part 'renewCertificate' accessible as property or by invoking a getter method.
 *
 * @method PartnerAPIMessageRenewCertificate setCredentials(string $userName, string $password) Overriden method. Read documentation for PartnerAPIMessage class
 * @property PartnerAPITypeRenewCertificateRequest $renewCertificate
 * @method PartnerAPITypeRenewCertificateRequest getRenewCertificate()
 * 
 * @package messages
 */
class PartnerAPIMessageRenewCertificate extends PartnerAPIMessage {
    
    /**
     * Defines the part with credentials data.
     * 
     * @var string
     */
    protected $partWithCredentials = 'renewCertificate';
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'renewCertificate' => new PartnerAPITypeRenewCertificateRequest()
        );
    }


}
