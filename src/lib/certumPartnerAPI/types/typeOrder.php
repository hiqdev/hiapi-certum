<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';
require_once 'typeCertificateDetails.php';
require_once 'typeOrderDetails.php';
require_once 'typeOrderStatus.php';

/*
<xs:complexType name="order">
	<xs:sequence>
		<xs:element minOccurs="0" name="certificateDetails" type="tns:certificateDetails"/>
		<xs:element minOccurs="0" name="orderDetails" type="tns:orderDetails"/>
		<xs:element minOccurs="0" name="orderStatus" type="tns:orderStatus"/>
	</xs:sequence>
	<xs:attribute default="false" name="reissue" required="false" type="xs:boolean"/>
</xs:complexType>
*/

/**
 * This class represents the order WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeOrder setReissue(boolean $value) Sets the reissue attribute.
 * @method boolean getReissue() Gets the reissue attribute or NULL.
 * @property boolean $reissue Gets the reissue attribute or NULL.
 * 
 * @method PartnerAPITypeOrder setCertificateDetails(PartnerAPITypeCertificateDetails $value) Sets the certificateDetails element.
 * @method PartnerAPITypeCertificateDetails getCertificateDetails() Gets the certificateDetails element or NULL.
 * @property PartnerAPITypeCertificateDetails $certificateDetails Gets the certificateDetails element or NULL.
 * 
 * @method PartnerAPITypeOrder setOrderDetails(PartnerAPITypeOrderDetails $value) Sets the orderDetails element.
 * @method PartnerAPITypeOrderDetails getOrderDetails() Gets the orderDetails element or NULL.
 * @property PartnerAPITypeOrderDetails $orderDetails Gets the orderDetails element or NULL.
 * 
 * @method PartnerAPITypeOrder setOrderStatus(PartnerAPITypeOrderStatus $value) Sets the orderStatus element.
 * @method PartnerAPITypeOrderStatus getOrderStatus() Gets the orderStatus element or NULL.
 * @property PartnerAPITypeOrderStatus $orderStatus Gets the orderStatus element or NULL.
 * 
 * @package types
 */
class PartnerAPITypeOrder extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'reissue'            => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'boolean', 'nillable' => FALSE),
            'certificateDetails' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'PartnerAPITypeCertificateDetails', 'nillable' => FALSE),
            'orderDetails'       => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'PartnerAPITypeOrderDetails', 'nillable' => FALSE),
            'orderStatus'        => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'PartnerAPITypeOrderStatus', 'nillable' => FALSE)
        );
        return $n;
    }


}
