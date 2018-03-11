<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeRequest.php';
require_once 'typeOrderOption.php';

/*
<xs:complexType name="getOrderByOrderIDRequest">
	<xs:complexContent>
		<xs:extension base="tns:request">
			<xs:sequence>
				<xs:element name="orderID" type="xs:string"/>
				<xs:element minOccurs="0" name="orderOption" type="tns:orderOption"/>
			</xs:sequence>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the getOrderByOrderIDRequest WSDL type.
 *
 * It is an extension to the PartnerAPITypeRequest class.
 * 
 * @method PartnerAPITypeGetOrderByOrderIDRequest setOrderID(string $value) Sets the orderID element.
 * @method string getOrderID() Gets the orderID element.
 * @property string $orderID Gets the orderID element.
 * 
 * @method PartnerAPITypeGetOrderByOrderIDRequest setOrderOption(PartnerAPITypeOrderOption $value) Sets the orderOption element.
 * @method PartnerAPITypeOrderOption getOrderOption() Gets the orderOption element or NULL.
 * @property PartnerAPITypeOrderOption $orderOption Gets the orderOption element or NULL.
 * 
 * @package types
 */
class PartnerAPITypeGetOrderByOrderIDRequest extends PartnerAPITypeRequest {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
            'orderID'     => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'orderOption' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'PartnerAPITypeOrderOption', 'nillable' => FALSE)
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
