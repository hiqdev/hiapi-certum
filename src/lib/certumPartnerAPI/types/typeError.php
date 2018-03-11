<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';

/*
<xs:complexType name="error">
	<xs:sequence>
		<xs:element name="errorCode" type="xs:int"/>
		<xs:element minOccurs="0" name="value" type="xs:string"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the error WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeError setErrorCode(int $value) Sets the errorCode element.
 * @method int getErrorCode() Gets the errorCode element.
 * @property int $errorCode Gets the errorCode element.
 * 
 * @method PartnerAPITypeError setValue(string $value) Sets the value element.
 * @method string getValue() Gets the value element or NULL.
 * @property string $value Gets the value element or NULL.
 * 
 * @package types
 */
class PartnerAPITypeError extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'errorCode' => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'int', 'nillable' => FALSE),
            'value'     => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE)
        );
        return $n;
    }


}
