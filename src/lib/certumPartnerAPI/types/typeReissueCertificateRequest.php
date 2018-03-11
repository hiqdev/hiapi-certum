<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeRequest.php';

/*
<xs:complexType name="reissueCertificateRequest">
	<xs:complexContent>
		<xs:extension base="tns:request">
			<xs:sequence>
				<xs:element minOccurs="0" name="serialNumber" type="xs:string"/>
				<xs:element minOccurs="0" name="X509Cert" type="xs:string"/>
				<xs:element minOccurs="0" name="hashAlgorithm" type="tns:hashAlgorithmEnum"/>
				<xs:element minOccurs="0" name="CSR" type="xs:string"/>
			</xs:sequence>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the reissueCertificateRequest WSDL type.
 *
 * It is an extension to the PartnerAPITypeRequest class.
 * 
 * @method PartnerAPITypeReissueCertificateRequest setSerialNumber(string $value) Sets the serialNumber element.
 * @method string getSerialNumber() Gets the serialNumber element or NULL.
 * @property string $serialNumber Gets the serialNumber element or NULL.
 * 
 * @method PartnerAPITypeReissueCertificateRequest setX509Cert(string $value) Sets the X509Cert element.
 * @method string getX509Cert() Gets the X509Cert element or NULL.
 * @property string $X509Cert Gets the X509Cert element or NULL.
 * 
 * @method PartnerAPITypeReissueCertificateRequest setHashAlgorithm(string $value) Sets the hashAlgorithm element.
 * @method string getHashAlgorithm() Gets the hashAlgorithm element or NULL.
 * @property string $hashAlgorithm Gets the hashAlgorithm element or NULL.
 * 
 * @method PartnerAPITypeReissueCertificateRequest setCSR(string $value) Sets the CSR element.
 * @method string getCSR() Gets the CSR element or NULL.
 * @property string $CSR Gets the CSR element or NULL.
 * 
 * @package types
 */
class PartnerAPITypeReissueCertificateRequest extends PartnerAPITypeRequest {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
            'serialNumber'  => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'X509Cert'      => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'hashAlgorithm' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'CSR'           => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE)
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
