<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeResponse.php';

/*
<xs:complexType name="updateDocumentsResponse">
	<xs:complexContent>
		<xs:extension base="tns:response">
			<xs:sequence/>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the updateDocumentsResponse WSDL type.
 *
 * It is an extension to the PartnerAPITypeResponse class.
 * 
 * @package types
 */
class PartnerAPITypeUpdateDocumentsResponse extends PartnerAPITypeResponse {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
