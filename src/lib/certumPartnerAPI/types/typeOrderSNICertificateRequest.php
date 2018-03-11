<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeRequest.php';
require_once 'typeOrderSNIParameters.php';
require_once 'typeSerialNumbers.php';
require_once 'typeRequestorInfo.php';
require_once 'typeOrganizationInfo.php';

/*
<xs:complexType name="orderSNICertificateRequest">
	<xs:complexContent>
		<xs:extension base="tns:request">
			<xs:sequence>
				<xs:element name="orderSNIParameters" type="tns:orderSNIParameters"/>
				<xs:element name="serialNumbers" type="tns:serialNumbers"/>
				<xs:element name="requestorInfo" type="tns:requestorInfo"/>
				<xs:element minOccurs="0" name="organizationInfo" type="tns:organizationInfo"/>
			</xs:sequence>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the orderSNICertificateRequest WSDL type.
 *
 * It is an extension to the PartnerAPITypeRequest class.
 * 
 * @method PartnerAPITypeOrderSNICertificateRequest setOrderSNIParameters(PartnerAPITypeOrderSNIParameters $value) Sets the orderSNIParameters element.
 * @method PartnerAPITypeOrderSNIParameters getOrderSNIParameters() Gets the orderSNIParameters element.
 * @property PartnerAPITypeOrderSNIParameters $orderSNIParameters Gets the orderSNIParameters element.
 * 
 * @method PartnerAPITypeOrderSNICertificateRequest setSerialNumbers(PartnerAPITypeSerialNumbers $value) Sets the serialNumbers element.
 * @method PartnerAPITypeSerialNumbers getSerialNumbers() Gets the serialNumbers element.
 * @property PartnerAPITypeSerialNumbers $serialNumbers Gets the serialNumbers element.
 * 
 * @method PartnerAPITypeOrderSNICertificateRequest setRequestorInfo(PartnerAPITypeRequestorInfo $value) Sets the requestorInfo element.
 * @method PartnerAPITypeRequestorInfo getRequestorInfo() Gets the requestorInfo element.
 * @property PartnerAPITypeRequestorInfo $requestorInfo Gets the requestorInfo element.
 * 
 * @method PartnerAPITypeOrderSNICertificateRequest setOrganizationInfo(PartnerAPITypeOrganizationInfo $value) Sets the organizationInfo element.
 * @method PartnerAPITypeOrganizationInfo getOrganizationInfo() Gets the organizationInfo element or NULL.
 * @property PartnerAPITypeOrganizationInfo $organizationInfo Gets the organizationInfo element or NULL.
 * 
 * @package types
 */
class PartnerAPITypeOrderSNICertificateRequest extends PartnerAPITypeRequest {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
            'orderSNIParameters' => array('min' => 1, 'max' => 1, 'value' => new PartnerAPITypeOrderSNIParameters(), 'type' => 'PartnerAPITypeOrderSNIParameters', 'nillable' => FALSE),
            'serialNumbers'      => array('min' => 1, 'max' => 1, 'value' => new PartnerAPITypeSerialNumbers(), 'type' => 'PartnerAPITypeSerialNumbers', 'nillable' => FALSE),
            'requestorInfo'      => array('min' => 1, 'max' => 1, 'value' => new PartnerAPITypeRequestorInfo(), 'type' => 'PartnerAPITypeRequestorInfo', 'nillable' => FALSE),
            'organizationInfo'   => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'PartnerAPITypeOrganizationInfo', 'nillable' => FALSE)
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
