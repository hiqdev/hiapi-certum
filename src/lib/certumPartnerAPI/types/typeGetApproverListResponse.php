<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeResponse.php';
require_once 'typeApprovers.php';

/*
<xs:complexType name="getApproverListResponse">
	<xs:complexContent>
		<xs:extension base="tns:response">
			<xs:sequence>
				<xs:element minOccurs="0" name="approvers" type="tns:approvers"/>
			</xs:sequence>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the getApproverListResponse WSDL type.
 *
 * It is an extension to the PartnerAPITypeResponse class.
 * 
 * @method PartnerAPITypeGetApproverListResponse setApprovers(PartnerAPITypeApprovers $value) Sets the approvers element.
 * @method PartnerAPITypeApprovers getApprovers() Gets the approvers element or NULL.
 * @property PartnerAPITypeApprovers $approvers Gets the approvers element or NULL.
 * 
 * @package types
 */
class PartnerAPITypeGetApproverListResponse extends PartnerAPITypeResponse {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
            'approvers' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'PartnerAPITypeApprovers', 'nillable' => FALSE)
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
