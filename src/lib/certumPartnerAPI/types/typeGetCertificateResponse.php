<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeResponse.php';
require_once 'typeCertificateDetails.php';
require_once 'typeCaBundle.php';

/*
<xs:complexType name="getCertificateResponse">
	<xs:complexContent>
		<xs:extension base="tns:response">
			<xs:sequence>
				<xs:element minOccurs="0" name="certificateDetails" type="tns:certificateDetails"/>
				<xs:element minOccurs="0" name="caBundle" type="tns:caBundle"/>
			</xs:sequence>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the getCertificateResponse WSDL type.
 *
 * It is an extension to the PartnerAPITypeResponse class.
 * 
 * @method PartnerAPITypeGetCertificateResponse setCertificateDetails(PartnerAPITypeCertificateDetails $value) Sets the certificateDetails element.
 * @method PartnerAPITypeCertificateDetails getCertificateDetails() Gets the certificateDetails element or NULL.
 * @property PartnerAPITypeCertificateDetails $certificateDetails Gets the certificateDetails element or NULL.
 * 
 * @method PartnerAPITypeGetCertificateResponse setCaBundle(PartnerAPITypeCaBundle $value) Sets the caBundle element.
 * @method PartnerAPITypeCaBundle getCaBundle() Gets the caBundle element or NULL.
 * @property PartnerAPITypeCaBundle $caBundle Gets the caBundle element or NULL.
 * 
 * @package types
 */
class PartnerAPITypeGetCertificateResponse extends PartnerAPITypeResponse {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
            'certificateDetails' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'PartnerAPITypeCertificateDetails', 'nillable' => FALSE),
            'caBundle'           => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'PartnerAPITypeCaBundle', 'nillable' => FALSE)
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
