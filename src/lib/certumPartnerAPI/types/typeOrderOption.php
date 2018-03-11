<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';

/*
<xs:complexType name="orderOption">
	<xs:sequence>
		<xs:element minOccurs="0" name="certificateDetails" type="xs:boolean"/>
		<xs:element minOccurs="0" name="orderDetails" type="xs:boolean"/>
		<xs:element minOccurs="0" name="orderStatus" type="xs:boolean"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the orderOption WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeOrderOption setCertificateDetails(boolean $value) Sets the certificateDetails element.
 * @method boolean getCertificateDetails() Gets the certificateDetails element or NULL.
 * @property boolean $certificateDetails Gets the certificateDetails element or NULL.
 * 
 * @method PartnerAPITypeOrderOption setOrderDetails(boolean $value) Sets the orderDetails element.
 * @method boolean getOrderDetails() Gets the orderDetails element or NULL.
 * @property boolean $orderDetails Gets the orderDetails element or NULL.
 * 
 * @method PartnerAPITypeOrderOption setOrderStatus(boolean $value) Sets the orderStatus element.
 * @method boolean getOrderStatus() Gets the orderStatus element or NULL.
 * @property boolean $orderStatus Gets the orderStatus element or NULL.
 * 
 * @package types
 */
class PartnerAPITypeOrderOption extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'certificateDetails' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'boolean', 'nillable' => FALSE),
            'orderDetails'       => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'boolean', 'nillable' => FALSE),
            'orderStatus'        => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'boolean', 'nillable' => FALSE)
        );
        return $n;
    }


}
