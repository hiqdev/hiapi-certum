<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeReissueCertificateResponse.php';

/*
<message name="PartnerServicePortType_reissueCertificateResponse">
	<part element="tns:reissueCertificateResponse" name="reissueCertificateResponse">
	</part>
</message>
<xs:element name="reissueCertificateResponse" nillable="true" type="tns:reissueCertificateResponse"/>
*/

/**
 * This class represents the PartnerServicePortType_reissueCertificateResponse WSDL message.
 *
 * It has one part 'reissueCertificateResponse' accessible as property or by invoking a getter method.
 *
 * @property PartnerAPITypeReissueCertificateResponse $reissueCertificateResponse
 * @method PartnerAPITypeReissueCertificateResponse getReissueCertificateResponse()
 * 
 * @package messages
 */
class PartnerAPIMessageReissueCertificateResponse extends PartnerAPIMessage {
    
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'reissueCertificateResponse' => new PartnerAPITypeReissueCertificateResponse()
        );
    }


}
