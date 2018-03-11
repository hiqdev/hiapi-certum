<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeRenewCertificateResponse.php';

/*
<message name="PartnerServicePortType_renewCertificateResponse">
	<part element="tns:renewCertificateResponse" name="renewCertificateResponse">
	</part>
</message>
<xs:element name="renewCertificateResponse" nillable="true" type="tns:renewCertificateResponse"/>
*/

/**
 * This class represents the PartnerServicePortType_renewCertificateResponse WSDL message.
 *
 * It has one part 'renewCertificateResponse' accessible as property or by invoking a getter method.
 *
 * @property PartnerAPITypeRenewCertificateResponse $renewCertificateResponse
 * @method PartnerAPITypeRenewCertificateResponse getRenewCertificateResponse()
 * 
 * @package messages
 */
class PartnerAPIMessageRenewCertificateResponse extends PartnerAPIMessage {
    
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'renewCertificateResponse' => new PartnerAPITypeRenewCertificateResponse()
        );
    }


}
