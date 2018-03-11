<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';

/*
<xs:complexType name="product">
	<xs:sequence>
		<xs:element minOccurs="0" name="code" type="xs:long"/>
		<xs:element minOccurs="0" name="type" type="xs:string"/>
		<xs:element minOccurs="0" name="validityPeriod" type="xs:int"/>
		<xs:element minOccurs="0" name="autoEnrollmentEnabled" type="xs:boolean"/>
		<xs:element minOccurs="0" name="certificateNotificationEnabled" type="xs:boolean"/>
		<xs:element minOccurs="0" name="verificationNotificationEnabled" type="xs:boolean"/>
		<xs:element minOccurs="0" name="defaultHashAlgorithm" type="tns:hashAlgorithmEnum"/>
		<xs:sequence>
			<xs:element minOccurs="0" name="supportedHashAlgorithms">
				<xs:complexType>
					<xs:sequence>
						<xs:element maxOccurs="unbounded" name="hashAlgorithm" type="tns:hashAlgorithmEnum"/>
					</xs:sequence>
				</xs:complexType>
			</xs:element>
		</xs:sequence>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the product > supportedHashAlgorithms WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeProduct_SupportedHashAlgorithms setHashAlgorithm(string $value) Sets the hashAlgorithm element. This method removes all previously added hashAlgorithm elements and creates a new set of hashAlgorithm elements.
 * @method PartnerAPITypeProduct_SupportedHashAlgorithms addHashAlgorithm(string $value) Adds a new hashAlgorithm element to the existing set.
 * @method string|string[] getHashAlgorithm() Gets the hashAlgorithm element. If there is only one element, it will be returned, otherwise an array of string values will be returned.
 * @property string|string[] $hashAlgorithm Gets the hashAlgorithm element. If there is only one element, it will be returned, otherwise an array of string values will be returned.
 * 
 * @package types
 */
class PartnerAPITypeProduct_SupportedHashAlgorithms extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'hashAlgorithm' => array('min' => 1, 'max' => NULL, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE)
        );
        return $n;
    }


}
