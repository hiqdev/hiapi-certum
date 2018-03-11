<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';
require_once 'typeDocuments.php';

/*
<xs:complexType name="verifyOrderParameters">
	<xs:sequence>
		<xs:element name="note" type="xs:string"/>
		<xs:element name="orderID" type="xs:string"/>
		<xs:element minOccurs="0" name="documents" type="tns:documents"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the verifyOrderParameters WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeVerifyOrderParameters setNote(string $value) Sets the note element.
 * @method string getNote() Gets the note element.
 * @property string $note Gets the note element.
 * 
 * @method PartnerAPITypeVerifyOrderParameters setOrderID(string $value) Sets the orderID element.
 * @method string getOrderID() Gets the orderID element.
 * @property string $orderID Gets the orderID element.
 * 
 * @method PartnerAPITypeVerifyOrderParameters setDocuments(PartnerAPITypeDocuments $value) Sets the documents element.
 * @method PartnerAPITypeDocuments getDocuments() Gets the documents element or NULL.
 * @property PartnerAPITypeDocuments $documents Gets the documents element or NULL.
 * 
 * @package types
 */
class PartnerAPITypeVerifyOrderParameters extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'note'      => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'orderID'   => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'documents' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'PartnerAPITypeDocuments', 'nillable' => FALSE)
        );
        return $n;
    }


}
