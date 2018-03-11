<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';
require_once 'typeApprover.php';

/*
<xs:complexType name="approvers">
	<xs:sequence>
		<xs:element maxOccurs="unbounded" name="Approver" type="tns:approver"/>
		<xs:element minOccurs="0" name="verificationNotificationEnabled" type="xs:boolean"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the approvers WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeApprovers setApprover(PartnerAPITypeApprover $value) Sets the Approver element. This method removes all previously added Approver elements and creates a new set of Approver elements.
 * @method PartnerAPITypeApprovers addApprover(PartnerAPITypeApprover $value) Adds a new Approver element to the existing set.
 * @method PartnerAPITypeApprover|PartnerAPITypeApprover[] getApprover() Gets the Approver element. If there is only one element, it will be returned, otherwise an array of PartnerAPITypeApprover objects will be returned.
 * @property PartnerAPITypeApprover|PartnerAPITypeApprover[] $Approver Gets the Approver element. If there is only one element, it will be returned, otherwise an array of PartnerAPITypeApprover objects will be returned.
 * 
 * @method PartnerAPITypeApprovers setVerificationNotificationEnabled(boolean $value) Sets the verificationNotificationEnabled element.
 * @method boolean getVerificationNotificationEnabled() Gets the verificationNotificationEnabled element or NULL.
 * @property boolean $verificationNotificationEnabled Gets the verificationNotificationEnabled element or NULL.
 * 
 * @package types
 */
class PartnerAPITypeApprovers extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'Approver'                        => array('min' => 1, 'max' => NULL, 'value' => new PartnerAPITypeApprover(), 'type' => 'PartnerAPITypeApprover', 'nillable' => FALSE),
            'verificationNotificationEnabled' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'boolean', 'nillable' => FALSE)
        );
        return $n;
    }


}
