<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeGetOrdersRequest.php';

/*
<xs:complexType name="getModifiedOrdersRequest">
	<xs:complexContent>
		<xs:extension base="tns:getOrdersRequest">
			<xs:sequence/>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the getModifiedOrdersRequest WSDL type.
 *
 * It is an extension to the PartnerAPITypeGetOrdersRequest class.
 * 
 * @package types
 */
class PartnerAPITypeGetModifiedOrdersRequest extends PartnerAPITypeGetOrdersRequest {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
