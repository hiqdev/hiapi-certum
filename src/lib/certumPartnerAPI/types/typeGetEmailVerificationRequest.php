<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeRequest.php';

/*
<xs:complexType name="getEmailVerificationRequest">
	<xs:complexContent>
		<xs:extension base="tns:request">
			<xs:sequence>
				<xs:element name="orderID" type="xs:string"/>
				<xs:element minOccurs="0" name="showArchived" type="xs:boolean"/>
			</xs:sequence>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the getEmailVerificationRequest WSDL type.
 *
 * It is an extension to the PartnerAPITypeRequest class.
 * 
 * @method PartnerAPITypeGetEmailVerificationRequest setOrderID(string $value) Sets the orderID element.
 * @method string getOrderID() Gets the orderID element.
 * @property string $orderID Gets the orderID element.
 * 
 * @method PartnerAPITypeGetEmailVerificationRequest setShowArchived(boolean $value) Sets the showArchived element.
 * @method boolean getShowArchived() Gets the showArchived element or NULL.
 * @property boolean $showArchived Gets the showArchived element or NULL.
 * 
 * @package types
 */
class PartnerAPITypeGetEmailVerificationRequest extends PartnerAPITypeRequest {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
            'orderID'      => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'showArchived' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'boolean', 'nillable' => FALSE)
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
