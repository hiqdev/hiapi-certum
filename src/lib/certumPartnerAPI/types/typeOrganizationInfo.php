<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';

/*
<xs:complexType name="organizationInfo">
	<xs:sequence>
		<xs:element name="organizationName" type="xs:string"/>
		<xs:element name="taxIdentificationNumber" type="xs:string"/>
		<xs:element minOccurs="0" name="verificationPhoneNumber" type="xs:string"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the organizationInfo WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeOrganizationInfo setOrganizationName(string $value) Sets the organizationName element.
 * @method string getOrganizationName() Gets the organizationName element.
 * @property string $organizationName Gets the organizationName element.
 * 
 * @method PartnerAPITypeOrganizationInfo setTaxIdentificationNumber(string $value) Sets the taxIdentificationNumber element.
 * @method string getTaxIdentificationNumber() Gets the taxIdentificationNumber element.
 * @property string $taxIdentificationNumber Gets the taxIdentificationNumber element.
 * 
 * 
 * @method PartnerAPITypeOrganizationInfo setVerificationPhoneNumber(string $value) Sets the verificationPhoneNumber element.
 * @method string getVerificationPhoneNumber() Gets the verificationPhoneNumber element.
 * @property string $verificationPhoneNumber Gets the verificationPhoneNumber element.
 * 
 * @package types
 */
class PartnerAPITypeOrganizationInfo extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'organizationName'        => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'taxIdentificationNumber' => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
			'verificationPhoneNumber' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => TRUE)
        );
        return $n;
    }


}
