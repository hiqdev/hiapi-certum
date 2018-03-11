<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeRevokeCertificateResponse.php';

/*
<message name="PartnerServicePortType_revokeCertificateResponse">
	<part element="tns:revokeCertificateResponse" name="revokeCertificateResponse">
	</part>
</message>
<xs:element name="revokeCertificateResponse" nillable="true" type="tns:revokeCertificateResponse"/>
*/

/**
 * This class represents the PartnerServicePortType_revokeCertificateResponse WSDL message.
 *
 * It has one part 'revokeCertificateResponse' accessible as property or by invoking a getter method.
 *
 * @property PartnerAPITypeRevokeCertificateResponse $revokeCertificateResponse
 * @method PartnerAPITypeRevokeCertificateResponse getRevokeCertificateResponse()
 * 
 * @package messages
 */
class PartnerAPIMessageRevokeCertificateResponse extends PartnerAPIMessage {
    
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'revokeCertificateResponse' => new PartnerAPITypeRevokeCertificateResponse()
        );
    }


}
