<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';

/*
<xs:complexType name="approver">
	<xs:sequence>
		<xs:element name="FQDN" type="xs:string"/>
		<xs:element maxOccurs="unbounded" minOccurs="0" name="approverEmail" type="xs:string"/>
		<xs:element maxOccurs="unbounded" minOccurs="0" name="approveMethod" type="tns:verificationMethodType"/>
	</xs:sequence>
	<xs:attribute default="false" name="mainDomain" type="xs:boolean"/>
</xs:complexType>
*/

/**
 * This class represents the approver WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeApprover setMainDomain(boolean $value) Sets the mainDomain attribute.
 * @method boolean getMainDomain() Gets the mainDomain attribute.
 * @property boolean $mainDomain Gets the mainDomain attribute.
 * 
 * @method PartnerAPITypeApprover setFQDN(string $value) Sets the FQDN element.
 * @method string getFQDN() Gets the FQDN element.
 * @property string $FQDN Gets the FQDN element.
 * 
 * @method PartnerAPITypeApprover setApproverEmail(string $value) Sets the approverEmail element. This method removes all previously added approverEmail elements and creates a new set of approverEmail elements.
 * @method PartnerAPITypeApprover addApproverEmail(string $value) Adds a new approverEmail element to the existing set.
 * @method string|string[] getApproverEmail() Gets the approverEmail element or NULL. If there is only one element, it will be returned, otherwise an array of string values will be returned.
 * @property string|string[] $approverEmail Gets the approverEmail element or NULL. If there is only one element, it will be returned, otherwise an array of string values will be returned.
 * 
 * @method PartnerAPITypeApprover setApproveMethod(string $value) Sets the approveMethod element. This method removes all previously added approveMethod elements and creates a new set of approveMethod elements.
 * @method PartnerAPITypeApprover addApproveMethod(string $value) Adds a new approveMethod element to the existing set.
 * @method string|string[] getApproveMethod() Gets the approveMethod element or NULL. If there is only one element, it will be returned, otherwise an array of string values will be returned.
 * @property string|string[] $approveMethod Gets the approveMethod element or NULL. If there is only one element, it will be returned, otherwise an array of string values will be returned.
 * 
 * @package types
 */
class PartnerAPITypeApprover extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'mainDomain'    => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'boolean', 'nillable' => FALSE),
            'FQDN'          => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'approverEmail' => array('min' => 0, 'max' => NULL, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'approveMethod' => array('min' => 0, 'max' => NULL, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE)
        );
        return $n;
    }


}
