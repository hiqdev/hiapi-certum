<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';
require_once 'typeDomainVerifications.php';

/*
<xs:complexType name="domain">
	<xs:sequence>
		<xs:element name="domainName" type="xs:string"/>
		<xs:element name="verificationLevel" type="tns:verificationLevelEnum"/>
		<xs:element name="verificationExpiryDate" type="xs:dateTime"/>
		<xs:element name="domainVerifications" type="tns:domainVerifications"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the domain WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeDomain setDomainName(string $value) Sets the domainName element.
 * @method string getDomainName() Gets the domainName element.
 * @property string $domainName Gets the domainName element.
 * 
 * @method PartnerAPITypeDomain setVerificationLevel(string $value) Sets the verificationLevel element.
 * @method string getVerificationLevel() Gets the verificationLevel element.
 * @property string $verificationLevel Gets the verificationLevel element.
 * 
 * @method PartnerAPITypeDomain setVerificationExpiryDate(string $value) Sets the verificationExpiryDate element.
 * @method string getVerificationExpiryDate() Gets the verificationExpiryDate element.
 * @property string $verificationExpiryDate Gets the verificationExpiryDate element.
 * 
 * @method PartnerAPITypeDomain setDomainVerifications(PartnerAPITypeDomainVerifications $value) Sets the domainVerifications element.
 * @method PartnerAPITypeDomainVerifications getDomainVerifications() Gets the domainVerifications element.
 * @property PartnerAPITypeDomainVerifications $domainVerifications Gets the domainVerifications element.
 * 
 * @package types
 */
class PartnerAPITypeDomain extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'domainName'             => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'verificationLevel'      => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'verificationExpiryDate' => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'domainVerifications'    => array('min' => 1, 'max' => 1, 'value' => new PartnerAPITypeDomainVerifications(), 'type' => 'PartnerAPITypeDomainVerifications', 'nillable' => FALSE)
        );
        return $n;
    }


}
