<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';

/*
<xs:complexType name="expiringCertificates">
	<xs:sequence>
		<xs:element name="orderID" type="xs:string"/>
		<xs:element name="serialNumber" type="xs:string"/>
		<xs:element name="expiringDate" type="xs:dateTime"/>
		<xs:element name="validityDaysLeft" type="xs:int"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the expiringCertificates WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeExpiringCertificates setOrderID(string $value) Sets the orderID element.
 * @method string getOrderID() Gets the orderID element.
 * @property string $orderID Gets the orderID element.
 * 
 * @method PartnerAPITypeExpiringCertificates setSerialNumber(string $value) Sets the serialNumber element.
 * @method string getSerialNumber() Gets the serialNumber element.
 * @property string $serialNumber Gets the serialNumber element.
 * 
 * @method PartnerAPITypeExpiringCertificates setExpiringDate(string $value) Sets the expiringDate element.
 * @method string getExpiringDate() Gets the expiringDate element.
 * @property string $expiringDate Gets the expiringDate element.
 * 
 * @method PartnerAPITypeExpiringCertificates setValidityDaysLeft(int $value) Sets the validityDaysLeft element.
 * @method int getValidityDaysLeft() Gets the validityDaysLeft element.
 * @property int $validityDaysLeft Gets the validityDaysLeft element.
 * 
 * @package types
 */
class PartnerAPITypeExpiringCertificates extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'orderID'          => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'serialNumber'     => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'expiringDate'     => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'validityDaysLeft' => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'int', 'nillable' => FALSE)
        );
        return $n;
    }


}
