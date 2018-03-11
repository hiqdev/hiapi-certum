<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';
require_once 'typeRequestHeader.php';

/*
<xs:complexType name="request">
	<xs:sequence>
		<xs:element name="requestHeader" type="tns:requestHeader"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the request WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeRequest setRequestHeader(PartnerAPITypeRequestHeader $value) Sets the requestHeader element.
 * @method PartnerAPITypeRequestHeader getRequestHeader() Gets the requestHeader element.
 * @property PartnerAPITypeRequestHeader $requestHeader Gets the requestHeader element.
 * 
 * @package types
 */
class PartnerAPITypeRequest extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'requestHeader' => array('min' => 1, 'max' => 1, 'value' => new PartnerAPITypeRequestHeader(), 'type' => 'PartnerAPITypeRequestHeader', 'nillable' => FALSE)
        );
        return $n;
    }


}
