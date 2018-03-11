<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeReissueCertificateRequest.php';

/*
<message name="PartnerServicePortType_reissueCertificate">
	<part element="tns:reissueCertificate" name="reissueCertificate">
	</part>
</message>
<xs:element name="reissueCertificate" nillable="true" type="tns:reissueCertificateRequest"/>
*/

/**
 * This class represents the PartnerServicePortType_reissueCertificate WSDL message.
 *
 * It has one part 'reissueCertificate' accessible as property or by invoking a getter method.
 *
 * @method PartnerAPIMessageReissueCertificate setCredentials(string $userName, string $password) Overriden method. Read documentation for PartnerAPIMessage class
 * @property PartnerAPITypeReissueCertificateRequest $reissueCertificate
 * @method PartnerAPITypeReissueCertificateRequest getReissueCertificate()
 * 
 * @package messages
 */
class PartnerAPIMessageReissueCertificate extends PartnerAPIMessage {
    
    /**
     * Defines the part with credentials data.
     * 
     * @var string
     */
    protected $partWithCredentials = 'reissueCertificate';
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'reissueCertificate' => new PartnerAPITypeReissueCertificateRequest()
        );
    }


}
