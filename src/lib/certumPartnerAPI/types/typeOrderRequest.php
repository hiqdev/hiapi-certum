<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeRequest.php';
require_once 'typeApprovers.php';
require_once 'typeOrderParameters.php';
require_once 'typeOrganizationInfo.php';
require_once 'typeRequestorInfo.php';
require_once 'typeSanEntries.php';

/*
<xs:complexType name="orderRequest">
	<xs:complexContent>
		<xs:extension base="tns:request">
			<xs:sequence>
				<xs:element minOccurs="0" name="approvers" type="tns:approvers"/>
				<xs:element name="orderParameters" type="tns:orderParameters"/>
				<xs:element minOccurs="0" name="organizationInfo" type="tns:organizationInfo"/>
				<xs:element name="requestorInfo" type="tns:requestorInfo"/>
				<xs:element minOccurs="0" name="SANEntries" type="tns:sanEntries"/>
			</xs:sequence>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the orderRequest WSDL type.
 *
 * It is an extension to the PartnerAPITypeRequest class.
 * 
 * @method PartnerAPITypeOrderRequest setApprovers(PartnerAPITypeApprovers $value) Sets the approvers element.
 * @method PartnerAPITypeApprovers getApprovers() Gets the approvers element or NULL.
 * @property PartnerAPITypeApprovers $approvers Gets the approvers element or NULL.
 * 
 * @method PartnerAPITypeOrderRequest setOrderParameters(PartnerAPITypeOrderParameters $value) Sets the orderParameters element.
 * @method PartnerAPITypeOrderParameters getOrderParameters() Gets the orderParameters element.
 * @property PartnerAPITypeOrderParameters $orderParameters Gets the orderParameters element.
 * 
 * @method PartnerAPITypeOrderRequest setOrganizationInfo(PartnerAPITypeOrganizationInfo $value) Sets the organizationInfo element.
 * @method PartnerAPITypeOrganizationInfo getOrganizationInfo() Gets the organizationInfo element or NULL.
 * @property PartnerAPITypeOrganizationInfo $organizationInfo Gets the organizationInfo element or NULL.
 * 
 * @method PartnerAPITypeOrderRequest setRequestorInfo(PartnerAPITypeRequestorInfo $value) Sets the requestorInfo element.
 * @method PartnerAPITypeRequestorInfo getRequestorInfo() Gets the requestorInfo element.
 * @property PartnerAPITypeRequestorInfo $requestorInfo Gets the requestorInfo element.
 * 
 * @method PartnerAPITypeOrderRequest setSANEntries(PartnerAPITypeSanEntries $value) Sets the SANEntries element.
 * @method PartnerAPITypeSanEntries getSANEntries() Gets the SANEntries element or NULL.
 * @property PartnerAPITypeSanEntries $SANEntries Gets the SANEntries element or NULL.
 * 
 * @package types
 */
class PartnerAPITypeOrderRequest extends PartnerAPITypeRequest {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
            'approvers'        => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'PartnerAPITypeApprovers', 'nillable' => FALSE),
            'orderParameters'  => array('min' => 1, 'max' => 1, 'value' => new PartnerAPITypeOrderParameters(), 'type' => 'PartnerAPITypeOrderParameters', 'nillable' => FALSE),
            'organizationInfo' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'PartnerAPITypeOrganizationInfo', 'nillable' => FALSE),
            'requestorInfo'    => array('min' => 1, 'max' => 1, 'value' => new PartnerAPITypeRequestorInfo(), 'type' => 'PartnerAPITypeRequestorInfo', 'nillable' => FALSE),
            'SANEntries'       => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'PartnerAPITypeSanEntries', 'nillable' => FALSE)
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
