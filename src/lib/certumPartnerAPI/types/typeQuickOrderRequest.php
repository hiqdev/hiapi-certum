<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeOrderRequest.php';

/*
<xs:complexType name="quickOrderRequest">
	<xs:complexContent>
		<xs:extension base="tns:orderRequest">
			<xs:sequence/>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the quickOrderRequest WSDL type.
 *
 * It is an extension to the PartnerAPITypeOrderRequest class.
 * 
 * @package types
 */
class PartnerAPITypeQuickOrderRequest extends PartnerAPITypeOrderRequest {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
