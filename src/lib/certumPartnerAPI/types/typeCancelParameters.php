<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';

/*
<xs:complexType name="cancelParameters">
	<xs:sequence>
		<xs:element minOccurs="0" name="note" type="xs:string"/>
		<xs:element name="orderID" type="xs:string"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the cancelParameters WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeCancelParameters setNote(string $value) Sets the note element.
 * @method string getNote() Gets the note element or NULL.
 * @property string $note Gets the note element or NULL.
 * 
 * @method PartnerAPITypeCancelParameters setOrderID(string $value) Sets the orderID element.
 * @method string getOrderID() Gets the orderID element.
 * @property string $orderID Gets the orderID element.
 * 
 * @package types
 */
class PartnerAPITypeCancelParameters extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'note'    => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'orderID' => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE)
        );
        return $n;
    }


}
