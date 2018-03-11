<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeGetProductListResponse.php';

/*
<xs:complexType name="getConfigurationResponse">
	<xs:complexContent>
		<xs:extension base="tns:getProductListResponse">
			<xs:sequence/>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the getConfigurationResponse WSDL type.
 *
 * It is an extension to the PartnerAPITypeGetProductListResponse class.
 * 
 * @package types
 */
class PartnerAPITypeGetConfigurationResponse extends PartnerAPITypeGetProductListResponse {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
