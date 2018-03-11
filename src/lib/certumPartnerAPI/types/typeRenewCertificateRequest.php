<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeRequest.php';
require_once 'typeApprovers.php';
require_once 'typeValidityPeriod.php';

/*
<xs:complexType name="renewCertificateRequest">
	<xs:complexContent>
		<xs:extension base="tns:request">
			<xs:sequence>
				<xs:element minOccurs="0" name="approvers" type="tns:approvers"/>
				<xs:element name="CSR" type="xs:string"/>
				<xs:element name="customer" type="xs:string"/>
				<xs:element name="productCode" type="xs:string"/>
				<xs:element minOccurs="0" name="serialNumber" type="xs:string"/>
				<xs:element minOccurs="0" name="validityPeriod" type="tns:validityPeriod"/>
				<xs:element minOccurs="0" name="X509Cert" type="xs:string"/>
				<xs:element minOccurs="0" name="hashAlgorithm" type="tns:hashAlgorithmEnum"/>
				<xs:element minOccurs="0" name="email" type="xs:string"/>
			</xs:sequence>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the renewCertificateRequest WSDL type.
 *
 * It is an extension to the PartnerAPITypeRequest class.
 * 
 * @method PartnerAPITypeRenewCertificateRequest setApprovers(PartnerAPITypeApprovers $value) Sets the approvers element.
 * @method PartnerAPITypeApprovers getApprovers() Gets the approvers element or NULL.
 * @property PartnerAPITypeApprovers $approvers Gets the approvers element or NULL.
 * 
 * @method PartnerAPITypeRenewCertificateRequest setCSR(string $value) Sets the CSR element.
 * @method string getCSR() Gets the CSR element.
 * @property string $CSR Gets the CSR element.
 * 
 * @method PartnerAPITypeRenewCertificateRequest setCustomer(string $value) Sets the customer element.
 * @method string getCustomer() Gets the customer element.
 * @property string $customer Gets the customer element.
 * 
 * @method PartnerAPITypeRenewCertificateRequest setProductCode(string $value) Sets the productCode element.
 * @method string getProductCode() Gets the productCode element.
 * @property string $productCode Gets the productCode element.
 * 
 * @method PartnerAPITypeRenewCertificateRequest setSerialNumber(string $value) Sets the serialNumber element.
 * @method string getSerialNumber() Gets the serialNumber element or NULL.
 * @property string $serialNumber Gets the serialNumber element or NULL.
 * 
 * @method PartnerAPITypeRenewCertificateRequest setValidityPeriod(PartnerAPITypeValidityPeriod $value) Sets the validityPeriod element.
 * @method PartnerAPITypeValidityPeriod getValidityPeriod() Gets the validityPeriod element or NULL.
 * @property PartnerAPITypeValidityPeriod $validityPeriod Gets the validityPeriod element or NULL.
 * 
 * @method PartnerAPITypeRenewCertificateRequest setX509Cert(string $value) Sets the X509Cert element.
 * @method string getX509Cert() Gets the X509Cert element or NULL.
 * @property string $X509Cert Gets the X509Cert element or NULL.
 * 
 * @method PartnerAPITypeRenewCertificateRequest setHashAlgorithm(string $value) Sets the hashAlgorithm element.
 * @method string getHashAlgorithm() Gets the hashAlgorithm element or NULL.
 * @property string $hashAlgorithm Gets the hashAlgorithm element or NULL.
 * 
 * @method PartnerAPITypeRenewCertificateRequest setEmail(string $value) Sets the email element.
 * @method string getEmail() Gets the email element or NULL.
 * @property string $email Gets the email element or NULL.
 * 
 * @package types
 */
class PartnerAPITypeRenewCertificateRequest extends PartnerAPITypeRequest {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
            'approvers'      => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'PartnerAPITypeApprovers', 'nillable' => FALSE),
            'CSR'            => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'customer'       => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'productCode'    => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'serialNumber'   => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'validityPeriod' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'PartnerAPITypeValidityPeriod', 'nillable' => FALSE),
            'X509Cert'       => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'hashAlgorithm'  => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'email'          => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE)
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
