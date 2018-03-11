<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';

/*
<xs:complexType name="validityPeriod">
	<xs:sequence>
		<xs:element name="notAfter" type="xs:date"/>
		<xs:element name="notBefore" type="xs:date"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the validityPeriod WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeValidityPeriod setNotAfter(string $value) Sets the notAfter element.
 * @method string getNotAfter() Gets the notAfter element.
 * @property string $notAfter Gets the notAfter element.
 * 
 * @method PartnerAPITypeValidityPeriod setNotBefore(string $value) Sets the notBefore element.
 * @method string getNotBefore() Gets the notBefore element.
 * @property string $notBefore Gets the notBefore element.
 * 
 * @package types
 */
class PartnerAPITypeValidityPeriod extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'notAfter'  => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'notBefore' => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE)
        );
        return $n;
    }


}
