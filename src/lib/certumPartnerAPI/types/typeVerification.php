<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';

/*
<xs:complexType name="verification">
	<xs:sequence>
		<xs:element name="approveMethod" type="tns:verificationMethodType"/>
		<xs:element name="code" type="xs:string"/>
		<xs:element name="fQDN" type="xs:string"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the verification WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeVerification setApproveMethod(string $value) Sets the approveMethod element.
 * @method string getApproveMethod() Gets the approveMethod element.
 * @property string $approveMethod Gets the approveMethod element.
 * 
 * @method PartnerAPITypeVerification setCode(string $value) Sets the code element.
 * @method string getCode() Gets the code element.
 * @property string $code Gets the code element.
 * 
 * @method PartnerAPITypeVerification setFQDN(string $value) Sets the fQDN element.
 * @method string getFQDN() Gets the fQDN element.
 * @property string $fQDN Gets the fQDN element.
 * 
 * @package types
 */
class PartnerAPITypeVerification extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'approveMethod' => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'code'          => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'fQDN'          => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE)
        );
        return $n;
    }


}
