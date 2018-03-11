<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeResponse.php';
require_once 'typeExpiringCertificates.php';

/*
<xs:complexType name="getExpiringCertificatesResponse">
	<xs:complexContent>
		<xs:extension base="tns:response">
			<xs:sequence>
				<xs:element maxOccurs="unbounded" minOccurs="0" name="expiringCertificates" type="tns:expiringCertificates"/>
			</xs:sequence>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the getExpiringCertificatesResponse WSDL type.
 *
 * It is an extension to the PartnerAPITypeResponse class.
 * 
 * @method PartnerAPITypeGetExpiringCertificatesResponse setExpiringCertificates(PartnerAPITypeExpiringCertificates $value) Sets the expiringCertificates element. This method removes all previously added expiringCertificates elements and creates a new set of expiringCertificates elements.
 * @method PartnerAPITypeGetExpiringCertificatesResponse addExpiringCertificates(PartnerAPITypeExpiringCertificates $value) Adds a new expiringCertificates element to the existing set.
 * @method PartnerAPITypeExpiringCertificates|PartnerAPITypeExpiringCertificates[] getExpiringCertificates() Gets the expiringCertificates element or NULL. If there is only one element, it will be returned, otherwise an array of PartnerAPITypeExpiringCertificates objects will be returned.
 * @property PartnerAPITypeExpiringCertificates|PartnerAPITypeExpiringCertificates[] $expiringCertificates Gets the expiringCertificates element or NULL. If there is only one element, it will be returned, otherwise an array of PartnerAPITypeExpiringCertificates objects will be returned.
 * 
 * @package types
 */
class PartnerAPITypeGetExpiringCertificatesResponse extends PartnerAPITypeResponse {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
            'expiringCertificates' => array('min' => 0, 'max' => NULL, 'value' => NULL, 'type' => 'PartnerAPITypeExpiringCertificates', 'nillable' => FALSE)
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
