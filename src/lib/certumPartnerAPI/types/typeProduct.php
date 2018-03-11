<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';
require_once 'typeProduct_SupportedHashAlgorithms.php';

/*
<xs:complexType name="product">
	<xs:sequence>
		<xs:element minOccurs="0" name="code" type="xs:long"/>
		<xs:element minOccurs="0" name="type" type="xs:string"/>
		<xs:element minOccurs="0" name="validityPeriod" type="xs:int"/>
		<xs:element minOccurs="0" name="autoEnrollmentEnabled" type="xs:boolean"/>
		<xs:element minOccurs="0" name="certificateNotificationEnabled" type="xs:boolean"/>
		<xs:element minOccurs="0" name="verificationNotificationEnabled" type="xs:boolean"/>
		<xs:element minOccurs="0" name="defaultHashAlgorithm" type="tns:hashAlgorithmEnum"/>
		<xs:sequence>
			<xs:element minOccurs="0" name="supportedHashAlgorithms">
				<xs:complexType>
					<xs:sequence>
						<xs:element maxOccurs="unbounded" name="hashAlgorithm" type="tns:hashAlgorithmEnum"/>
					</xs:sequence>
				</xs:complexType>
			</xs:element>
		</xs:sequence>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the product WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeProduct setSupportedHashAlgorithms(PartnerAPITypeProduct_SupportedHashAlgorithms $value) Sets the supportedHashAlgorithms element.
 * @method PartnerAPITypeProduct_SupportedHashAlgorithms getSupportedHashAlgorithms() Gets the supportedHashAlgorithms element or NULL.
 * @property PartnerAPITypeProduct_SupportedHashAlgorithms $supportedHashAlgorithms Gets the supportedHashAlgorithms element or NULL.
 * 
 * @method PartnerAPITypeProduct setCode(long $value) Sets the code element.
 * @method long getCode() Gets the code element or NULL.
 * @property long $code Gets the code element or NULL.
 * 
 * @method PartnerAPITypeProduct setType(string $value) Sets the type element.
 * @method string getType() Gets the type element or NULL.
 * @property string $type Gets the type element or NULL.
 * 
 * @method PartnerAPITypeProduct setValidityPeriod(int $value) Sets the validityPeriod element.
 * @method int getValidityPeriod() Gets the validityPeriod element or NULL.
 * @property int $validityPeriod Gets the validityPeriod element or NULL.
 * 
 * @method PartnerAPITypeProduct setAutoEnrollmentEnabled(boolean $value) Sets the autoEnrollmentEnabled element.
 * @method boolean getAutoEnrollmentEnabled() Gets the autoEnrollmentEnabled element or NULL.
 * @property boolean $autoEnrollmentEnabled Gets the autoEnrollmentEnabled element or NULL.
 * 
 * @method PartnerAPITypeProduct setCertificateNotificationEnabled(boolean $value) Sets the certificateNotificationEnabled element.
 * @method boolean getCertificateNotificationEnabled() Gets the certificateNotificationEnabled element or NULL.
 * @property boolean $certificateNotificationEnabled Gets the certificateNotificationEnabled element or NULL.
 * 
 * @method PartnerAPITypeProduct setVerificationNotificationEnabled(boolean $value) Sets the verificationNotificationEnabled element.
 * @method boolean getVerificationNotificationEnabled() Gets the verificationNotificationEnabled element or NULL.
 * @property boolean $verificationNotificationEnabled Gets the verificationNotificationEnabled element or NULL.
 * 
 * @method PartnerAPITypeProduct setDefaultHashAlgorithm(string $value) Sets the defaultHashAlgorithm element.
 * @method string getDefaultHashAlgorithm() Gets the defaultHashAlgorithm element or NULL.
 * @property string $defaultHashAlgorithm Gets the defaultHashAlgorithm element or NULL.
 * 
 * @package types
 */
class PartnerAPITypeProduct extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'supportedHashAlgorithms'         => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'PartnerAPITypeProduct_SupportedHashAlgorithms', 'nillable' => FALSE),
            'code'                            => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'long', 'nillable' => FALSE),
            'type'                            => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'validityPeriod'                  => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'int', 'nillable' => FALSE),
            'autoEnrollmentEnabled'           => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'boolean', 'nillable' => FALSE),
            'certificateNotificationEnabled'  => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'boolean', 'nillable' => FALSE),
            'verificationNotificationEnabled' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'boolean', 'nillable' => FALSE),
            'defaultHashAlgorithm'            => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE)
        );
        return $n;
    }


}
