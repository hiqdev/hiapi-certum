<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

/*
<xs:simpleType name="verificationMethodType">
	<xs:restriction base="xs:string">
		<xs:enumeration value="EMAIL"/>
		<xs:enumeration value="DNS"/>
		<xs:enumeration value="FILE"/>
		<xs:enumeration value="META"/>
	</xs:restriction>
</xs:simpleType>
*/

/**
 * This class represents the verificationMethodType WSDL type.
 *
 * This is a set of constant values representing enumeration type from WSDL file.
 *
 * @package types
 */
class PartnerAPITypeVerificationMethodType {
    
    const EMAIL = "EMAIL";
    const DNS   = "DNS";
    const FILE  = "FILE";
    const META  = "META";
    
    private function __construct() {
    }


}
