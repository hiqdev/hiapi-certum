<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

/*
<xs:simpleType name="hashAlgorithmEnum">
	<xs:restriction base="xs:string">
		<xs:enumeration value="SHA1"/>
		<xs:enumeration value="SHA2"/>
	</xs:restriction>
</xs:simpleType>
*/

/**
 * This class represents the hashAlgorithmEnum WSDL type.
 *
 * This is a set of constant values representing enumeration type from WSDL file.
 *
 * @package types
 */
class PartnerAPITypeHashAlgorithmEnum {
    
    const SHA1 = "SHA1";
    const SHA2 = "SHA2";
    
    private function __construct() {
    }


}
