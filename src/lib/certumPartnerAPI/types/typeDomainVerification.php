<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';

/*
<xs:complexType name="domainVerification">
	<xs:sequence>
		<xs:element name="email" type="xs:string"/>
		<xs:element name="sendDate" type="xs:dateTime"/>
		<xs:element name="verificationLinkValidityDate" type="xs:dateTime"/>
		<xs:element name="verificationMethod" type="tns:verificationMethodType"/>
		<xs:element name="verificationDate" type="xs:dateTime"/>
		<xs:element name="verificationValidity" type="xs:dateTime"/>
		<xs:element name="verified" type="xs:boolean"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the domainVerification WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeDomainVerification setEmail(string $value) Sets the email element.
 * @method string getEmail() Gets the email element.
 * @property string $email Gets the email element.
 * 
 * @method PartnerAPITypeDomainVerification setSendDate(string $value) Sets the sendDate element.
 * @method string getSendDate() Gets the sendDate element.
 * @property string $sendDate Gets the sendDate element.
 * 
 * @method PartnerAPITypeDomainVerification setVerificationLinkValidityDate(string $value) Sets the verificationLinkValidityDate element.
 * @method string getVerificationLinkValidityDate() Gets the verificationLinkValidityDate element.
 * @property string $verificationLinkValidityDate Gets the verificationLinkValidityDate element.
 * 
 * @method PartnerAPITypeDomainVerification setVerificationMethod(string $value) Sets the verificationMethod element.
 * @method string getVerificationMethod() Gets the verificationMethod element.
 * @property string $verificationMethod Gets the verificationMethod element.
 * 
 * @method PartnerAPITypeDomainVerification setVerificationDate(string $value) Sets the verificationDate element.
 * @method string getVerificationDate() Gets the verificationDate element.
 * @property string $verificationDate Gets the verificationDate element.
 * 
 * @method PartnerAPITypeDomainVerification setVerificationValidity(string $value) Sets the verificationValidity element.
 * @method string getVerificationValidity() Gets the verificationValidity element.
 * @property string $verificationValidity Gets the verificationValidity element.
 * 
 * @method PartnerAPITypeDomainVerification setVerified(boolean $value) Sets the verified element.
 * @method boolean getVerified() Gets the verified element.
 * @property boolean $verified Gets the verified element.
 * 
 * @package types
 */
class PartnerAPITypeDomainVerification extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'email'                        => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'sendDate'                     => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'verificationLinkValidityDate' => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'verificationMethod'           => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'verificationDate'             => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'verificationValidity'         => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'verified'                     => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'boolean', 'nillable' => FALSE)
        );
        return $n;
    }


}
