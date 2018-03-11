<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeGetCertificateRequest.php';

/*
<message name="PartnerServicePortType_getCertificate">
	<part element="tns:getCertificate" name="getCertificate">
	</part>
</message>
<xs:element name="getCertificate" nillable="true" type="tns:getCertificateRequest"/>
*/

/**
 * This class represents the PartnerServicePortType_getCertificate WSDL message.
 *
 * It has one part 'getCertificate' accessible as property or by invoking a getter method.
 *
 * @method PartnerAPIMessageGetCertificate setCredentials(string $userName, string $password) Overriden method. Read documentation for PartnerAPIMessage class
 * @property PartnerAPITypeGetCertificateRequest $getCertificate
 * @method PartnerAPITypeGetCertificateRequest getGetCertificate()
 * 
 * @package messages
 */
class PartnerAPIMessageGetCertificate extends PartnerAPIMessage {
    
    /**
     * Defines the part with credentials data.
     * 
     * @var string
     */
    protected $partWithCredentials = 'getCertificate';
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'getCertificate' => new PartnerAPITypeGetCertificateRequest()
        );
    }


}
