<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeGetExpiringCertificatesResponse.php';

/*
<message name="PartnerServicePortType_getExpiringCertificatesResponse">
	<part element="tns:getExpiringCertificatesResponse" name="getExpiringCertificatesResponse">
	</part>
</message>
<xs:element name="getExpiringCertificatesResponse" nillable="true" type="tns:getExpiringCertificatesResponse"/>
*/

/**
 * This class represents the PartnerServicePortType_getExpiringCertificatesResponse WSDL message.
 *
 * It has one part 'getExpiringCertificatesResponse' accessible as property or by invoking a getter method.
 *
 * @property PartnerAPITypeGetExpiringCertificatesResponse $getExpiringCertificatesResponse
 * @method PartnerAPITypeGetExpiringCertificatesResponse getGetExpiringCertificatesResponse()
 * 
 * @package messages
 */
class PartnerAPIMessageGetExpiringCertificatesResponse extends PartnerAPIMessage {
    
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'getExpiringCertificatesResponse' => new PartnerAPITypeGetExpiringCertificatesResponse()
        );
    }


}
