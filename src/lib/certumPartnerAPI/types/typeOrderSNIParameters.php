<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';

/*
<xs:complexType name="orderSNIParameters">
	<xs:sequence>
		<xs:element name="CSR" type="xs:string"/>
		<xs:element minOccurs="0" name="language" type="xs:string"/>
		<xs:element minOccurs="0" name="hashAlgorithm" type="tns:hashAlgorithmEnum"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the orderSNIParameters WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeOrderSNIParameters setCSR(string $value) Sets the CSR element.
 * @method string getCSR() Gets the CSR element.
 * @property string $CSR Gets the CSR element.
 * 
 * @method PartnerAPITypeOrderSNIParameters setLanguage(string $value) Sets the language element.
 * @method string getLanguage() Gets the language element or NULL.
 * @property string $language Gets the language element or NULL.
 * 
 * @method PartnerAPITypeOrderSNIParameters setHashAlgorithm(string $value) Sets the hashAlgorithm element.
 * @method string getHashAlgorithm() Gets the hashAlgorithm element or NULL.
 * @property string $hashAlgorithm Gets the hashAlgorithm element or NULL.
 * 
 * @package types
 */
class PartnerAPITypeOrderSNIParameters extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'CSR'           => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'language'      => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'hashAlgorithm' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE)
        );
        return $n;
    }


}
