<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeRequest.php';
require_once 'typeAddSerialNumbers.php';
require_once 'typeRemoveSerialNumbers.php';

/*
<xs:complexType name="modifySNICertificateRequest">
	<xs:complexContent>
		<xs:extension base="tns:request">
			<xs:sequence>
				<xs:element name="serialNumber" type="xs:string"/>
				<xs:element name="X509Cert" type="xs:string"/>
				<xs:element maxOccurs="1" minOccurs="0" name="addSerialNumbers" type="tns:addSerialNumbers"/>
				<xs:element maxOccurs="1" minOccurs="0" name="removeSerialNumbers" type="tns:removeSerialNumbers"/>
				<xs:element minOccurs="0" name="hashAlgorithm" type="tns:hashAlgorithmEnum"/>
			</xs:sequence>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the modifySNICertificateRequest WSDL type.
 *
 * It is an extension to the PartnerAPITypeRequest class.
 * 
 * @method PartnerAPITypeModifySNICertificateRequest setSerialNumber(string $value) Sets the serialNumber element.
 * @method string getSerialNumber() Gets the serialNumber element.
 * @property string $serialNumber Gets the serialNumber element.
 * 
 * @method PartnerAPITypeModifySNICertificateRequest setX509Cert(string $value) Sets the X509Cert element.
 * @method string getX509Cert() Gets the X509Cert element.
 * @property string $X509Cert Gets the X509Cert element.
 * 
 * @method PartnerAPITypeModifySNICertificateRequest setAddSerialNumbers(PartnerAPITypeAddSerialNumbers $value) Sets the addSerialNumbers element.
 * @method PartnerAPITypeAddSerialNumbers getAddSerialNumbers() Gets the addSerialNumbers element or NULL.
 * @property PartnerAPITypeAddSerialNumbers $addSerialNumbers Gets the addSerialNumbers element or NULL.
 * 
 * @method PartnerAPITypeModifySNICertificateRequest setRemoveSerialNumbers(PartnerAPITypeRemoveSerialNumbers $value) Sets the removeSerialNumbers element.
 * @method PartnerAPITypeRemoveSerialNumbers getRemoveSerialNumbers() Gets the removeSerialNumbers element or NULL.
 * @property PartnerAPITypeRemoveSerialNumbers $removeSerialNumbers Gets the removeSerialNumbers element or NULL.
 * 
 * @method PartnerAPITypeModifySNICertificateRequest setHashAlgorithm(string $value) Sets the hashAlgorithm element.
 * @method string getHashAlgorithm() Gets the hashAlgorithm element or NULL.
 * @property string $hashAlgorithm Gets the hashAlgorithm element or NULL.
 * 
 * @package types
 */
class PartnerAPITypeModifySNICertificateRequest extends PartnerAPITypeRequest {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
            'serialNumber'        => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'X509Cert'            => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'addSerialNumbers'    => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'PartnerAPITypeAddSerialNumbers', 'nillable' => FALSE),
            'removeSerialNumbers' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'PartnerAPITypeRemoveSerialNumbers', 'nillable' => FALSE),
            'hashAlgorithm'       => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE)
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
