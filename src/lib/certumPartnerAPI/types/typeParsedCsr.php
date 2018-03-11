<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';

/*
<xs:complexType name="parsedCsr">
	<xs:sequence>
		<xs:element minOccurs="0" name="commonName" type="xs:string"/>
		<xs:element minOccurs="0" name="country" type="xs:string"/>
		<xs:element minOccurs="0" name="email" type="xs:string"/>
		<xs:element minOccurs="0" name="joISoCN" type="xs:string"/>
		<xs:element minOccurs="0" name="joILN" type="xs:string"/>
		<xs:element minOccurs="0" name="joISoPN" type="xs:string"/>
		<xs:element minOccurs="0" name="locality" type="xs:string"/>
		<xs:element minOccurs="0" name="organization" type="xs:string"/>
		<xs:element minOccurs="0" name="organizationalUnit" type="xs:string"/>
		<xs:element minOccurs="0" name="postalCode" type="xs:string"/>
		<xs:element minOccurs="0" name="serialNumber" type="xs:string"/>
		<xs:element minOccurs="0" name="street" type="xs:string"/>
		<xs:element minOccurs="0" name="state" type="xs:string"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the parsedCsr WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeParsedCsr setCommonName(string $value) Sets the commonName element.
 * @method string getCommonName() Gets the commonName element or NULL.
 * @property string $commonName Gets the commonName element or NULL.
 * 
 * @method PartnerAPITypeParsedCsr setCountry(string $value) Sets the country element.
 * @method string getCountry() Gets the country element or NULL.
 * @property string $country Gets the country element or NULL.
 * 
 * @method PartnerAPITypeParsedCsr setEmail(string $value) Sets the email element.
 * @method string getEmail() Gets the email element or NULL.
 * @property string $email Gets the email element or NULL.
 * 
 * @method PartnerAPITypeParsedCsr setJoISoCN(string $value) Sets the joISoCN element.
 * @method string getJoISoCN() Gets the joISoCN element or NULL.
 * @property string $joISoCN Gets the joISoCN element or NULL.
 * 
 * @method PartnerAPITypeParsedCsr setJoILN(string $value) Sets the joILN element.
 * @method string getJoILN() Gets the joILN element or NULL.
 * @property string $joILN Gets the joILN element or NULL.
 * 
 * @method PartnerAPITypeParsedCsr setJoISoPN(string $value) Sets the joISoPN element.
 * @method string getJoISoPN() Gets the joISoPN element or NULL.
 * @property string $joISoPN Gets the joISoPN element or NULL.
 * 
 * @method PartnerAPITypeParsedCsr setLocality(string $value) Sets the locality element.
 * @method string getLocality() Gets the locality element or NULL.
 * @property string $locality Gets the locality element or NULL.
 * 
 * @method PartnerAPITypeParsedCsr setOrganization(string $value) Sets the organization element.
 * @method string getOrganization() Gets the organization element or NULL.
 * @property string $organization Gets the organization element or NULL.
 * 
 * @method PartnerAPITypeParsedCsr setOrganizationalUnit(string $value) Sets the organizationalUnit element.
 * @method string getOrganizationalUnit() Gets the organizationalUnit element or NULL.
 * @property string $organizationalUnit Gets the organizationalUnit element or NULL.
 * 
 * @method PartnerAPITypeParsedCsr setPostalCode(string $value) Sets the postalCode element.
 * @method string getPostalCode() Gets the postalCode element or NULL.
 * @property string $postalCode Gets the postalCode element or NULL.
 * 
 * @method PartnerAPITypeParsedCsr setSerialNumber(string $value) Sets the serialNumber element.
 * @method string getSerialNumber() Gets the serialNumber element or NULL.
 * @property string $serialNumber Gets the serialNumber element or NULL.
 * 
 * @method PartnerAPITypeParsedCsr setStreet(string $value) Sets the street element.
 * @method string getStreet() Gets the street element or NULL.
 * @property string $street Gets the street element or NULL.
 * 
 * @method PartnerAPITypeParsedCsr setState(string $value) Sets the state element.
 * @method string getState() Gets the state element or NULL.
 * @property string $state Gets the state element or NULL.
 * 
 * @package types
 */
class PartnerAPITypeParsedCsr extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'commonName'         => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'country'            => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'email'              => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'joISoCN'            => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'joILN'              => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'joISoPN'            => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'locality'           => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'organization'       => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'organizationalUnit' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'postalCode'         => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'serialNumber'       => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'street'             => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'state'              => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE)
        );
        return $n;
    }


}
