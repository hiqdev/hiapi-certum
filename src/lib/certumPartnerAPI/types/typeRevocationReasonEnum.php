<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

/*
<xs:simpleType name="revocationReasonEnum">
	<xs:restriction base="xs:string">
		<xs:enumeration value="UNSPECIFIED"/>
		<xs:enumeration value="KEYCOMPROMISE"/>
		<xs:enumeration value="AFFILIATIONCHANGED"/>
		<xs:enumeration value="CESSATIONOFOPERATION"/>
		<xs:enumeration value="PRIVILEGEWITHDRAWN"/>
	</xs:restriction>
</xs:simpleType>
*/

/**
 * This class represents the revocationReasonEnum WSDL type.
 *
 * This is a set of constant values representing enumeration type from WSDL file.
 *
 * @package types
 */
class PartnerAPITypeRevocationReasonEnum {
    
    const UNSPECIFIED          = "UNSPECIFIED";
    const KEYCOMPROMISE        = "KEYCOMPROMISE";
    const AFFILIATIONCHANGED   = "AFFILIATIONCHANGED";
    const CESSATIONOFOPERATION = "CESSATIONOFOPERATION";
    const PRIVILEGEWITHDRAWN   = "PRIVILEGEWITHDRAWN";
    
    private function __construct() {
    }


}
