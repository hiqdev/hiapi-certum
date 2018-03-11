<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeResponse.php';

/*
<xs:complexType name="reissueCertificateResponse">
	<xs:complexContent>
		<xs:extension base="tns:response">
			<xs:sequence>
				<xs:element name="orderID" type="xs:string"/>
			</xs:sequence>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the reissueCertificateResponse WSDL type.
 *
 * It is an extension to the PartnerAPITypeResponse class.
 * 
 * @method PartnerAPITypeReissueCertificateResponse setOrderID(string $value) Sets the orderID element.
 * @method string getOrderID() Gets the orderID element.
 * @property string $orderID Gets the orderID element.
 * 
 * @package types
 */
class PartnerAPITypeReissueCertificateResponse extends PartnerAPITypeResponse {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
            'orderID' => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE)
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
