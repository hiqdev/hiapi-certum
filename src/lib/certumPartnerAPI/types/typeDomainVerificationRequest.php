<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeRequest.php';

/*
<xs:complexType name="domainVerificationRequest">
	<xs:complexContent>
		<xs:extension base="tns:request">
			<xs:sequence>
				<xs:element name="code" type="xs:string"/>
			</xs:sequence>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the domainVerificationRequest WSDL type.
 *
 * It is an extension to the PartnerAPITypeRequest class.
 * 
 * @method PartnerAPITypeDomainVerificationRequest setCode(string $value) Sets the code element.
 * @method string getCode() Gets the code element.
 * @property string $code Gets the code element.
 * 
 * @package types
 */
class PartnerAPITypeDomainVerificationRequest extends PartnerAPITypeRequest {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
            'code' => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE)
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
