<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';

/*
<xs:complexType name="revokeCertificateParameters">
	<xs:sequence>
		<xs:element minOccurs="0" name="keyCompromitationDate" type="xs:date"/>
		<xs:element minOccurs="0" name="note" type="xs:string"/>
		<xs:element minOccurs="0" name="revocationReason" type="tns:revocationReasonEnum"/>
		<xs:element name="serialNumber" type="xs:string"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the revokeCertificateParameters WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeRevokeCertificateParameters setKeyCompromitationDate(string $value) Sets the keyCompromitationDate element.
 * @method string getKeyCompromitationDate() Gets the keyCompromitationDate element or NULL.
 * @property string $keyCompromitationDate Gets the keyCompromitationDate element or NULL.
 * 
 * @method PartnerAPITypeRevokeCertificateParameters setNote(string $value) Sets the note element.
 * @method string getNote() Gets the note element or NULL.
 * @property string $note Gets the note element or NULL.
 * 
 * @method PartnerAPITypeRevokeCertificateParameters setRevocationReason(string $value) Sets the revocationReason element.
 * @method string getRevocationReason() Gets the revocationReason element or NULL.
 * @property string $revocationReason Gets the revocationReason element or NULL.
 * 
 * @method PartnerAPITypeRevokeCertificateParameters setSerialNumber(string $value) Sets the serialNumber element.
 * @method string getSerialNumber() Gets the serialNumber element.
 * @property string $serialNumber Gets the serialNumber element.
 * 
 * @package types
 */
class PartnerAPITypeRevokeCertificateParameters extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'keyCompromitationDate' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'note'                  => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'revocationReason'      => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'serialNumber'          => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE)
        );
        return $n;
    }


}
