<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';

/*
<xs:complexType name="requestorInfo">
	<xs:sequence>
		<xs:element name="addressLine1" type="xs:string"/>
		<xs:element minOccurs="0" name="addressLine2" type="xs:string"/>
		<xs:element name="city" type="xs:string"/>
		<xs:element name="country" type="xs:string"/>
		<xs:element name="email" type="xs:string"/>
		<xs:element name="firstName" type="xs:string"/>
		<xs:element name="lastName" type="xs:string"/>
		<xs:element name="phone" type="xs:string"/>
		<xs:element name="postalCode" type="xs:string"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the requestorInfo WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeRequestorInfo setAddressLine1(string $value) Sets the addressLine1 element.
 * @method string getAddressLine1() Gets the addressLine1 element.
 * @property string $addressLine1 Gets the addressLine1 element.
 * 
 * @method PartnerAPITypeRequestorInfo setAddressLine2(string $value) Sets the addressLine2 element.
 * @method string getAddressLine2() Gets the addressLine2 element or NULL.
 * @property string $addressLine2 Gets the addressLine2 element or NULL.
 * 
 * @method PartnerAPITypeRequestorInfo setCity(string $value) Sets the city element.
 * @method string getCity() Gets the city element.
 * @property string $city Gets the city element.
 * 
 * @method PartnerAPITypeRequestorInfo setCountry(string $value) Sets the country element.
 * @method string getCountry() Gets the country element.
 * @property string $country Gets the country element.
 * 
 * @method PartnerAPITypeRequestorInfo setEmail(string $value) Sets the email element.
 * @method string getEmail() Gets the email element.
 * @property string $email Gets the email element.
 * 
 * @method PartnerAPITypeRequestorInfo setFirstName(string $value) Sets the firstName element.
 * @method string getFirstName() Gets the firstName element.
 * @property string $firstName Gets the firstName element.
 * 
 * @method PartnerAPITypeRequestorInfo setLastName(string $value) Sets the lastName element.
 * @method string getLastName() Gets the lastName element.
 * @property string $lastName Gets the lastName element.
 * 
 * @method PartnerAPITypeRequestorInfo setPhone(string $value) Sets the phone element.
 * @method string getPhone() Gets the phone element.
 * @property string $phone Gets the phone element.
 * 
 * @method PartnerAPITypeRequestorInfo setPostalCode(string $value) Sets the postalCode element.
 * @method string getPostalCode() Gets the postalCode element.
 * @property string $postalCode Gets the postalCode element.
 * 
 * @package types
 */
class PartnerAPITypeRequestorInfo extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'addressLine1' => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'addressLine2' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'city'         => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'country'      => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'email'        => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'firstName'    => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'lastName'     => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'phone'        => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'postalCode'   => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE)
        );
        return $n;
    }


}
