<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

/*
<xs:simpleType name="documentTypeEnum">
	<xs:restriction base="xs:string">
		<xs:enumeration value="ID"/>
		<xs:enumeration value="PASSPORT"/>
		<xs:enumeration value="DRIVING"/>
		<xs:enumeration value="OTHERID"/>
		<xs:enumeration value="KRS"/>
		<xs:enumeration value="REGON"/>
		<xs:enumeration value="NIP"/>
		<xs:enumeration value="NAMELIST"/>
		<xs:enumeration value="APPLICATION"/>
		<xs:enumeration value="CONTRACT"/>
		<xs:enumeration value="ORDER"/>
		<xs:enumeration value="EMPLOY"/>
		<xs:enumeration value="AUTHORIZATION"/>
		<xs:enumeration value="NOTARY"/>
		<xs:enumeration value="RAPORT"/>
		<xs:enumeration value="APPENDIX"/>
		<xs:enumeration value="EDG"/>
		<xs:enumeration value="OTHER"/>
		<xs:enumeration value="CEIDG"/>
		<xs:enumeration value="INVOICE"/>
		<xs:enumeration value="AUTH2"/>
		<xs:enumeration value="STATEMENT"/>
	</xs:restriction>
</xs:simpleType>
*/

/**
 * This class represents the documentTypeEnum WSDL type.
 *
 * This is a set of constant values representing enumeration type from WSDL file.
 *
 * @package types
 */
class PartnerAPITypeDocumentTypeEnum {
    
    const ID            = "ID";
    const PASSPORT      = "PASSPORT";
    const DRIVING       = "DRIVING";
    const OTHERID       = "OTHERID";
    const KRS           = "KRS";
    const REGON         = "REGON";
    const NIP           = "NIP";
    const NAMELIST      = "NAMELIST";
    const APPLICATION   = "APPLICATION";
    const CONTRACT      = "CONTRACT";
    const ORDER         = "ORDER";
    const EMPLOY        = "EMPLOY";
    const AUTHORIZATION = "AUTHORIZATION";
    const NOTARY        = "NOTARY";
    const RAPORT        = "RAPORT";
    const APPENDIX      = "APPENDIX";
    const EDG           = "EDG";
    const OTHER         = "OTHER";
    const CEIDG         = "CEIDG";
    const INVOICE       = "INVOICE";
    const AUTH2         = "AUTH2";
    const STATEMENT     = "STATEMENT";
    
    private function __construct() {
    }


}
