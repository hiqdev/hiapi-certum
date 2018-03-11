<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

/*
<xs:simpleType name="verificationLevelEnum">
	<xs:restriction base="xs:string">
		<xs:enumeration value="none"/>
		<xs:enumeration value="DV"/>
		<xs:enumeration value="DV/OV/EV"/>
	</xs:restriction>
</xs:simpleType>
*/

/**
 * This class represents the verificationLevelEnum WSDL type.
 *
 * This is a set of constant values representing enumeration type from WSDL file.
 *
 * @package types
 */
class PartnerAPITypeVerificationLevelEnum {
    
    const none     = "none";
    const DV       = "DV";
    const DV_OV_EV = "DV/OV/EV";
    
    private function __construct() {
    }


}
