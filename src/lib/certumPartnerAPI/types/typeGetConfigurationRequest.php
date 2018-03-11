<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeRequest.php';

/*
<xs:complexType name="getConfigurationRequest">
	<xs:complexContent>
		<xs:extension base="tns:request">
			<xs:sequence/>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the getConfigurationRequest WSDL type.
 *
 * It is an extension to the PartnerAPITypeRequest class.
 * 
 * @package types
 */
class PartnerAPITypeGetConfigurationRequest extends PartnerAPITypeRequest {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
