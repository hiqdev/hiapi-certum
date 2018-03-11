<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';
require_once 'typeVerification.php';

/*
<xs:complexType name="verifications">
	<xs:sequence>
		<xs:element maxOccurs="unbounded" minOccurs="0" name="verification" type="tns:verification"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the verifications WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeVerifications setVerification(PartnerAPITypeVerification $value) Sets the verification element. This method removes all previously added verification elements and creates a new set of verification elements.
 * @method PartnerAPITypeVerifications addVerification(PartnerAPITypeVerification $value) Adds a new verification element to the existing set.
 * @method PartnerAPITypeVerification|PartnerAPITypeVerification[] getVerification() Gets the verification element or NULL. If there is only one element, it will be returned, otherwise an array of PartnerAPITypeVerification objects will be returned.
 * @property PartnerAPITypeVerification|PartnerAPITypeVerification[] $verification Gets the verification element or NULL. If there is only one element, it will be returned, otherwise an array of PartnerAPITypeVerification objects will be returned.
 * 
 * @package types
 */
class PartnerAPITypeVerifications extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'verification' => array('min' => 0, 'max' => NULL, 'value' => NULL, 'type' => 'PartnerAPITypeVerification', 'nillable' => FALSE)
        );
        return $n;
    }


}
