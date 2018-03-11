<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeRequest.php';

/*
<xs:complexType name="getProductListRequest">
	<xs:complexContent>
		<xs:extension base="tns:request">
			<xs:sequence>
				<xs:element minOccurs="0" name="hashAlgorithm" type="xs:boolean"/>
			</xs:sequence>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the getProductListRequest WSDL type.
 *
 * It is an extension to the PartnerAPITypeRequest class.
 * 
 * @method PartnerAPITypeGetProductListRequest setHashAlgorithm(boolean $value) Sets the hashAlgorithm element.
 * @method boolean getHashAlgorithm() Gets the hashAlgorithm element or NULL.
 * @property boolean $hashAlgorithm Gets the hashAlgorithm element or NULL.
 * 
 * @package types
 */
class PartnerAPITypeGetProductListRequest extends PartnerAPITypeRequest {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
            'hashAlgorithm' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'boolean', 'nillable' => FALSE)
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
