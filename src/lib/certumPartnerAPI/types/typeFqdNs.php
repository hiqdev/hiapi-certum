<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';

/*
<xs:complexType name="fqdNs">
	<xs:sequence>
		<xs:element maxOccurs="unbounded" name="FQDN" type="xs:string"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the fqdNs WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeFqdNs setFQDN(string $value) Sets the FQDN element. This method removes all previously added FQDN elements and creates a new set of FQDN elements.
 * @method PartnerAPITypeFqdNs addFQDN(string $value) Adds a new FQDN element to the existing set.
 * @method string|string[] getFQDN() Gets the FQDN element. If there is only one element, it will be returned, otherwise an array of string values will be returned.
 * @property string|string[] $FQDN Gets the FQDN element. If there is only one element, it will be returned, otherwise an array of string values will be returned.
 * 
 * @package types
 */
class PartnerAPITypeFqdNs extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'FQDN' => array('min' => 1, 'max' => NULL, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE)
        );
        return $n;
    }


}
