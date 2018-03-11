<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';

/*
<xs:complexType name="sanEntry">
	<xs:sequence>
		<xs:element name="DNSName" type="xs:string"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the sanEntry WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeSanEntry setDNSName(string $value) Sets the DNSName element.
 * @method string getDNSName() Gets the DNSName element.
 * @property string $DNSName Gets the DNSName element.
 * 
 * @package types
 */
class PartnerAPITypeSanEntry extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'DNSName' => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE)
        );
        return $n;
    }


}
