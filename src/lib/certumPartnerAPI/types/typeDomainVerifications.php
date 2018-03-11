<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';
require_once 'typeDomainVerification.php';

/*
<xs:complexType name="domainVerifications">
	<xs:sequence>
		<xs:element maxOccurs="unbounded" name="domainVerification" type="tns:domainVerification"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the domainVerifications WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeDomainVerifications setDomainVerification(PartnerAPITypeDomainVerification $value) Sets the domainVerification element. This method removes all previously added domainVerification elements and creates a new set of domainVerification elements.
 * @method PartnerAPITypeDomainVerifications addDomainVerification(PartnerAPITypeDomainVerification $value) Adds a new domainVerification element to the existing set.
 * @method PartnerAPITypeDomainVerification|PartnerAPITypeDomainVerification[] getDomainVerification() Gets the domainVerification element. If there is only one element, it will be returned, otherwise an array of PartnerAPITypeDomainVerification objects will be returned.
 * @property PartnerAPITypeDomainVerification|PartnerAPITypeDomainVerification[] $domainVerification Gets the domainVerification element. If there is only one element, it will be returned, otherwise an array of PartnerAPITypeDomainVerification objects will be returned.
 * 
 * @package types
 */
class PartnerAPITypeDomainVerifications extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'domainVerification' => array('min' => 1, 'max' => NULL, 'value' => new PartnerAPITypeDomainVerification(), 'type' => 'PartnerAPITypeDomainVerification', 'nillable' => FALSE)
        );
        return $n;
    }


}
