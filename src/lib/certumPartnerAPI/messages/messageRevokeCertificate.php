<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeRevokeCertificateRequest.php';

/*
<message name="PartnerServicePortType_revokeCertificate">
	<part element="tns:revokeCertificate" name="revokeCertificate">
	</part>
</message>
<xs:element name="revokeCertificate" nillable="true" type="tns:revokeCertificateRequest"/>
*/

/**
 * This class represents the PartnerServicePortType_revokeCertificate WSDL message.
 *
 * It has one part 'revokeCertificate' accessible as property or by invoking a getter method.
 *
 * @method PartnerAPIMessageRevokeCertificate setCredentials(string $userName, string $password) Overriden method. Read documentation for PartnerAPIMessage class
 * @property PartnerAPITypeRevokeCertificateRequest $revokeCertificate
 * @method PartnerAPITypeRevokeCertificateRequest getRevokeCertificate()
 * 
 * @package messages
 */
class PartnerAPIMessageRevokeCertificate extends PartnerAPIMessage {
    
    /**
     * Defines the part with credentials data.
     * 
     * @var string
     */
    protected $partWithCredentials = 'revokeCertificate';
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'revokeCertificate' => new PartnerAPITypeRevokeCertificateRequest()
        );
    }


}
