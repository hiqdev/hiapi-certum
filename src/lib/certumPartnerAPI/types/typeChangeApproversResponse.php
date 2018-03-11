<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeResponse.php';
require_once 'typeVerification.php';

/*
<xs:complexType name="changeApproversResponse">
	<xs:complexContent>
		<xs:extension base="tns:response">
			<xs:sequence>
				<xs:element minOccurs="0" name="verification" type="tns:verification"/>
			</xs:sequence>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the changeApproversResponse WSDL type.
 *
 * It is an extension to the PartnerAPITypeResponse class.
 * 
 * @method PartnerAPITypeChangeApproversResponse setVerification(PartnerAPITypeVerification $value) Sets the verification element.
 * @method PartnerAPITypeVerification getVerification() Gets the verification element or NULL.
 * @property PartnerAPITypeVerification $verification Gets the verification element or NULL.
 * 
 * @package types
 */
class PartnerAPITypeChangeApproversResponse extends PartnerAPITypeResponse {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
            'verification' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'PartnerAPITypeVerification', 'nillable' => FALSE)
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
