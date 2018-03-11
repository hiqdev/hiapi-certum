<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeRequest.php';
require_once 'typeFqdNs.php';

/*
<xs:complexType name="getApproverListRequest">
	<xs:complexContent>
		<xs:extension base="tns:request">
			<xs:sequence>
				<xs:element name="FQDNs" type="tns:fqdNs"/>
			</xs:sequence>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the getApproverListRequest WSDL type.
 *
 * It is an extension to the PartnerAPITypeRequest class.
 * 
 * @method PartnerAPITypeGetApproverListRequest setFQDNs(PartnerAPITypeFqdNs $value) Sets the FQDNs element.
 * @method PartnerAPITypeFqdNs getFQDNs() Gets the FQDNs element.
 * @property PartnerAPITypeFqdNs $FQDNs Gets the FQDNs element.
 * 
 * @package types
 */
class PartnerAPITypeGetApproverListRequest extends PartnerAPITypeRequest {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
            'FQDNs' => array('min' => 1, 'max' => 1, 'value' => new PartnerAPITypeFqdNs(), 'type' => 'PartnerAPITypeFqdNs', 'nillable' => FALSE)
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
