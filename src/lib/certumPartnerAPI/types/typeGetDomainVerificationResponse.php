<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeResponse.php';
require_once 'typeDomains.php';

/*
<xs:complexType name="getDomainVerificationResponse">
	<xs:complexContent>
		<xs:extension base="tns:response">
			<xs:sequence>
				<xs:element minOccurs="0" name="domains" type="tns:domains"/>
			</xs:sequence>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the getDomainVerificationResponse WSDL type.
 *
 * It is an extension to the PartnerAPITypeResponse class.
 * 
 * @method PartnerAPITypeGetDomainVerificationResponse setDomains(PartnerAPITypeDomains $value) Sets the domains element.
 * @method PartnerAPITypeDomains getDomains() Gets the domains element or NULL.
 * @property PartnerAPITypeDomains $domains Gets the domains element or NULL.
 * 
 * @package types
 */
class PartnerAPITypeGetDomainVerificationResponse extends PartnerAPITypeResponse {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
            'domains' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'PartnerAPITypeDomains', 'nillable' => FALSE)
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
