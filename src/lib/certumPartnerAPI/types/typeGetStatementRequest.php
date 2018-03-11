<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeRequest.php';

/*
<xs:complexType name="getStatementRequest">
	<xs:complexContent>
		<xs:extension base="tns:request">
			<xs:sequence>
				<xs:element name="language" type="xs:string"/>
			</xs:sequence>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the getStatementRequest WSDL type.
 *
 * It is an extension to the PartnerAPITypeRequest class.
 * 
 * @method PartnerAPITypeGetStatementRequest setLanguage(string $value) Sets the language element.
 * @method string getLanguage() Gets the language element.
 * @property string $language Gets the language element.
 * 
 * @package types
 */
class PartnerAPITypeGetStatementRequest extends PartnerAPITypeRequest {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
            'language' => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE)
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
