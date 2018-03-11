<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';

/*
<xs:complexType name="certificateDetails">
	<xs:sequence>
		<xs:element name="certificateStatus" type="tns:certificateStatusEnum"/>
		<xs:element name="commonName" type="xs:string"/>
		<xs:element minOccurs="0" name="DNSNames" type="xs:string"/>
		<xs:element name="endDate" type="xs:dateTime"/>
		<xs:element minOccurs="0" name="revokedDate" type="xs:dateTime"/>
		<xs:element name="serialNumber" type="xs:string"/>
		<xs:element name="startDate" type="xs:dateTime"/>
		<xs:element name="subjectName" type="xs:string"/>
		<xs:element name="X509Cert" type="xs:string"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the certificateDetails WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeCertificateDetails setCertificateStatus(string $value) Sets the certificateStatus element.
 * @method string getCertificateStatus() Gets the certificateStatus element.
 * @property string $certificateStatus Gets the certificateStatus element.
 * 
 * @method PartnerAPITypeCertificateDetails setCommonName(string $value) Sets the commonName element.
 * @method string getCommonName() Gets the commonName element.
 * @property string $commonName Gets the commonName element.
 * 
 * @method PartnerAPITypeCertificateDetails setDNSNames(string $value) Sets the DNSNames element.
 * @method string getDNSNames() Gets the DNSNames element or NULL.
 * @property string $DNSNames Gets the DNSNames element or NULL.
 * 
 * @method PartnerAPITypeCertificateDetails setEndDate(string $value) Sets the endDate element.
 * @method string getEndDate() Gets the endDate element.
 * @property string $endDate Gets the endDate element.
 * 
 * @method PartnerAPITypeCertificateDetails setRevokedDate(string $value) Sets the revokedDate element.
 * @method string getRevokedDate() Gets the revokedDate element or NULL.
 * @property string $revokedDate Gets the revokedDate element or NULL.
 * 
 * @method PartnerAPITypeCertificateDetails setSerialNumber(string $value) Sets the serialNumber element.
 * @method string getSerialNumber() Gets the serialNumber element.
 * @property string $serialNumber Gets the serialNumber element.
 * 
 * @method PartnerAPITypeCertificateDetails setStartDate(string $value) Sets the startDate element.
 * @method string getStartDate() Gets the startDate element.
 * @property string $startDate Gets the startDate element.
 * 
 * @method PartnerAPITypeCertificateDetails setSubjectName(string $value) Sets the subjectName element.
 * @method string getSubjectName() Gets the subjectName element.
 * @property string $subjectName Gets the subjectName element.
 * 
 * @method PartnerAPITypeCertificateDetails setX509Cert(string $value) Sets the X509Cert element.
 * @method string getX509Cert() Gets the X509Cert element.
 * @property string $X509Cert Gets the X509Cert element.
 * 
 * @package types
 */
class PartnerAPITypeCertificateDetails extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'certificateStatus' => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'commonName'        => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'DNSNames'          => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'endDate'           => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'revokedDate'       => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'serialNumber'      => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'startDate'         => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'subjectName'       => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'X509Cert'          => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE)
        );
        return $n;
    }


}
