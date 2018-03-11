<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';

/*
<xs:complexType name="invalidSerialNumbers">
	<xs:sequence>
		<xs:element maxOccurs="unbounded" minOccurs="1" name="serialNumber" type="xs:string"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the invalidSerialNumbers WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeInvalidSerialNumbers setSerialNumber(string $value) Sets the serialNumber element. This method removes all previously added serialNumber elements and creates a new set of serialNumber elements.
 * @method PartnerAPITypeInvalidSerialNumbers addSerialNumber(string $value) Adds a new serialNumber element to the existing set.
 * @method string|string[] getSerialNumber() Gets the serialNumber element. If there is only one element, it will be returned, otherwise an array of string values will be returned.
 * @property string|string[] $serialNumber Gets the serialNumber element. If there is only one element, it will be returned, otherwise an array of string values will be returned.
 * 
 * @package types
 */
class PartnerAPITypeInvalidSerialNumbers extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'serialNumber' => array('min' => 1, 'max' => NULL, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE)
        );
        return $n;
    }


}
