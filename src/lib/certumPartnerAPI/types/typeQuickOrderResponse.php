<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeResponse.php';
require_once 'typeVerifications.php';

/*
<xs:complexType name="quickOrderResponse">
	<xs:complexContent>
		<xs:extension base="tns:response">
			<xs:sequence>
				<xs:element name="orderID" type="xs:string"/>
				<xs:element minOccurs="0" name="verifications" type="tns:verifications"/>
			</xs:sequence>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the quickOrderResponse WSDL type.
 *
 * It is an extension to the PartnerAPITypeResponse class.
 * 
 * @method PartnerAPITypeQuickOrderResponse setOrderID(string $value) Sets the orderID element.
 * @method string getOrderID() Gets the orderID element.
 * @property string $orderID Gets the orderID element.
 * 
 * @method PartnerAPITypeQuickOrderResponse setVerifications(PartnerAPITypeVerifications $value) Sets the verifications element.
 * @method PartnerAPITypeVerifications getVerifications() Gets the verifications element or NULL.
 * @property PartnerAPITypeVerifications $verifications Gets the verifications element or NULL.
 * 
 * @package types
 */
class PartnerAPITypeQuickOrderResponse extends PartnerAPITypeResponse {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
            'orderID'       => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'verifications' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'PartnerAPITypeVerifications', 'nillable' => FALSE)
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
