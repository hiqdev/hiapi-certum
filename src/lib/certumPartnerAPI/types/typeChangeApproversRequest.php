<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeRequest.php';
require_once 'typeApprover.php';

/*
<xs:complexType name="changeApproversRequest">
	<xs:complexContent>
		<xs:extension base="tns:request">
			<xs:sequence>
				<xs:element name="Approver" type="tns:approver"/>
				<xs:element name="orderID" type="xs:string"/>
				<xs:element minOccurs="0" name="verificationNotificationEnabled" type="xs:boolean"/>
			</xs:sequence>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the changeApproversRequest WSDL type.
 *
 * It is an extension to the PartnerAPITypeRequest class.
 * 
 * @method PartnerAPITypeChangeApproversRequest setApprover(PartnerAPITypeApprover $value) Sets the Approver element.
 * @method PartnerAPITypeApprover getApprover() Gets the Approver element.
 * @property PartnerAPITypeApprover $Approver Gets the Approver element.
 * 
 * @method PartnerAPITypeChangeApproversRequest setOrderID(string $value) Sets the orderID element.
 * @method string getOrderID() Gets the orderID element.
 * @property string $orderID Gets the orderID element.
 * 
 * @method PartnerAPITypeChangeApproversRequest setVerificationNotificationEnabled(boolean $value) Sets the verificationNotificationEnabled element.
 * @method boolean getVerificationNotificationEnabled() Gets the verificationNotificationEnabled element or NULL.
 * @property boolean $verificationNotificationEnabled Gets the verificationNotificationEnabled element or NULL.
 * 
 * @package types
 */
class PartnerAPITypeChangeApproversRequest extends PartnerAPITypeRequest {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
            'Approver'                        => array('min' => 1, 'max' => 1, 'value' => new PartnerAPITypeApprover(), 'type' => 'PartnerAPITypeApprover', 'nillable' => FALSE),
            'orderID'                         => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'verificationNotificationEnabled' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'boolean', 'nillable' => FALSE)
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
