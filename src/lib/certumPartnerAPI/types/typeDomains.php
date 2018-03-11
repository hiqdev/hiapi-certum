<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';
require_once 'typeDomain.php';

/*
<xs:complexType name="domains">
	<xs:sequence>
		<xs:element maxOccurs="unbounded" name="domain" type="tns:domain"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the domains WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeDomains setDomain(PartnerAPITypeDomain $value) Sets the domain element. This method removes all previously added domain elements and creates a new set of domain elements.
 * @method PartnerAPITypeDomains addDomain(PartnerAPITypeDomain $value) Adds a new domain element to the existing set.
 * @method PartnerAPITypeDomain|PartnerAPITypeDomain[] getDomain() Gets the domain element. If there is only one element, it will be returned, otherwise an array of PartnerAPITypeDomain objects will be returned.
 * @property PartnerAPITypeDomain|PartnerAPITypeDomain[] $domain Gets the domain element. If there is only one element, it will be returned, otherwise an array of PartnerAPITypeDomain objects will be returned.
 * 
 * @package types
 */
class PartnerAPITypeDomains extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'domain' => array('min' => 1, 'max' => NULL, 'value' => new PartnerAPITypeDomain(), 'type' => 'PartnerAPITypeDomain', 'nillable' => FALSE)
        );
        return $n;
    }


}
