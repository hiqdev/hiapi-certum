<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeResponse.php';
require_once 'typeParsedCsr.php';

/*
<xs:complexType name="validateOrderParametersResponse">
	<xs:complexContent>
		<xs:extension base="tns:response">
			<xs:sequence>
				<xs:element minOccurs="0" name="ParsedCSR" type="tns:parsedCsr"/>
			</xs:sequence>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the validateOrderParametersResponse WSDL type.
 *
 * It is an extension to the PartnerAPITypeResponse class.
 * 
 * @method PartnerAPITypeValidateOrderParametersResponse setParsedCSR(PartnerAPITypeParsedCsr $value) Sets the ParsedCSR element.
 * @method PartnerAPITypeParsedCsr getParsedCSR() Gets the ParsedCSR element or NULL.
 * @property PartnerAPITypeParsedCsr $ParsedCSR Gets the ParsedCSR element or NULL.
 * 
 * @package types
 */
class PartnerAPITypeValidateOrderParametersResponse extends PartnerAPITypeResponse {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
            'ParsedCSR' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'PartnerAPITypeParsedCsr', 'nillable' => FALSE)
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
