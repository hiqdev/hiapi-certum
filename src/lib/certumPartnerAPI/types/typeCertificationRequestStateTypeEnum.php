<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

/*
<xs:simpleType name="certificationRequestStateTypeEnum">
	<xs:restriction base="xs:string">
		<xs:enumeration value="AWAITING"/>
		<xs:enumeration value="VERIFICATION"/>
		<xs:enumeration value="ACCEPTED"/>
		<xs:enumeration value="REJECTED"/>
		<xs:enumeration value="ENROLLED"/>
	</xs:restriction>
</xs:simpleType>
*/

/**
 * This class represents the certificationRequestStateTypeEnum WSDL type.
 *
 * This is a set of constant values representing enumeration type from WSDL file.
 *
 * @package types
 */
class PartnerAPITypeCertificationRequestStateTypeEnum {
    
    const AWAITING     = "AWAITING";
    const VERIFICATION = "VERIFICATION";
    const ACCEPTED     = "ACCEPTED";
    const REJECTED     = "REJECTED";
    const ENROLLED     = "ENROLLED";
    
    private function __construct() {
    }


}
