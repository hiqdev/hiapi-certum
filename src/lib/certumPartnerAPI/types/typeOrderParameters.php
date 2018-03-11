<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';
require_once 'typeValidityPeriod.php';

/*
<xs:complexType name="orderParameters">
	<xs:sequence>
		<xs:element name="CSR" type="xs:string"/>
		<xs:element name="customer" type="xs:string"/>
		<xs:element minOccurs="0" name="language" type="xs:string"/>
		<xs:element minOccurs="0" name="orderID" type="xs:string"/>
		<xs:element name="productCode" type="xs:string"/>
		<xs:element minOccurs="0" name="userAgent" type="xs:string"/>
		<xs:element minOccurs="0" name="validityPeriod" type="tns:validityPeriod"/>
		<xs:element minOccurs="0" name="hashAlgorithm" type="tns:hashAlgorithmEnum"/>
		<xs:element minOccurs="0" name="email" type="xs:string"/>
		<xs:element minOccurs="0" name="commonName" type="xs:string"/>
		<xs:element minOccurs="0" name="organization" type="xs:string"/>
		<xs:element minOccurs="0" name="organizationalUnit" type="xs:string"/>
		<xs:element minOccurs="0" name="locality" type="xs:string"/>
		<xs:element minOccurs="0" name="country" type="xs:string"/>
		<xs:element minOccurs="0" name="state" type="xs:string"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the orderParameters WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeOrderParameters setCSR(string $value) Sets the CSR element.
 * @method string getCSR() Gets the CSR element.
 * @property string $CSR Gets the CSR element.
 * 
 * @method PartnerAPITypeOrderParameters setCustomer(string $value) Sets the customer element.
 * @method string getCustomer() Gets the customer element.
 * @property string $customer Gets the customer element.
 * 
 * @method PartnerAPITypeOrderParameters setLanguage(string $value) Sets the language element.
 * @method string getLanguage() Gets the language element or NULL.
 * @property string $language Gets the language element or NULL.
 * 
 * @method PartnerAPITypeOrderParameters setOrderID(string $value) Sets the orderID element.
 * @method string getOrderID() Gets the orderID element or NULL.
 * @property string $orderID Gets the orderID element or NULL.
 * 
 * @method PartnerAPITypeOrderParameters setProductCode(string $value) Sets the productCode element.
 * @method string getProductCode() Gets the productCode element.
 * @property string $productCode Gets the productCode element.
 * 
 * @method PartnerAPITypeOrderParameters setUserAgent(string $value) Sets the userAgent element.
 * @method string getUserAgent() Gets the userAgent element or NULL.
 * @property string $userAgent Gets the userAgent element or NULL.
 * 
 * @method PartnerAPITypeOrderParameters setValidityPeriod(PartnerAPITypeValidityPeriod $value) Sets the validityPeriod element.
 * @method PartnerAPITypeValidityPeriod getValidityPeriod() Gets the validityPeriod element or NULL.
 * @property PartnerAPITypeValidityPeriod $validityPeriod Gets the validityPeriod element or NULL.
 * 
 * @method PartnerAPITypeOrderParameters setHashAlgorithm(string $value) Sets the hashAlgorithm element.
 * @method string getHashAlgorithm() Gets the hashAlgorithm element or NULL.
 * @property string $hashAlgorithm Gets the hashAlgorithm element or NULL.
 * 
 * @method PartnerAPITypeOrderParameters setEmail(string $value) Sets the email element.
 * @method string getEmail() Gets the email element or NULL.
 * @property string $email Gets the email element or NULL.
 *
 * @method PartnerAPITypeOrderParameters setCommonName(string $value) Sets the commonName element.
 * @method string getCommonName() Gets the commonName element or NULL.
 * @property string $commonName Gets the commonName element or NULL.
 *
 * @method PartnerAPITypeOrderParameters setOrganization(string $value) Sets the organization element.
 * @method string getOrganization() Gets the organization element or NULL.
 * @property string $organization Gets the organization element or NULL.
 *
 * @method PartnerAPITypeOrderParameters setOrganizationalUnit(string $value) Sets the organizationalUnit element.
 * @method string getOrganizationalUnit() Gets the organizationalUnit element or NULL.
 * @property string $organizationalUnit Gets the organizationalUnit element or NULL.
 *
 * @method PartnerAPITypeOrderParameters setLocality(string $value) Sets the locality element.
 * @method string getLocality() Gets the locality element or NULL.
 * @property string $locality Gets the locality element or NULL.
 *
 * @method PartnerAPITypeOrderParameters setCountry(string $value) Sets the country element.
 * @method string getCountry() Gets the country element or NULL.
 * @property string $country Gets the country element or NULL.
 *
 * @method PartnerAPITypeOrderParameters setState(string $value) Sets the state element.
 * @method string getState() Gets the state element or NULL.
 * @property string $state Gets the state element or NULL.
 *
 * @package types
 */
class PartnerAPITypeOrderParameters extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'CSR'            => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'customer'       => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'language'       => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'orderID'        => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'productCode'    => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'userAgent'      => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'validityPeriod' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'PartnerAPITypeValidityPeriod', 'nillable' => FALSE),
            'hashAlgorithm'  => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'email'          => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'commonName'         			=> array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'organization'          		=> array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'organizationalUnit'          	=> array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'locality'          			=> array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'country'          				=> array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'state'          				=> array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE)
        );
        return $n;
    }


}
