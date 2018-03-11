<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeResponse.php';
require_once 'typeVerifyOrderResponse_Documents.php';

/*
<xs:complexType name="verifyOrderResponse">
	<xs:complexContent>
		<xs:extension base="tns:response">
			<xs:sequence>
				<xs:element maxOccurs="1" minOccurs="0" name="documents">
					<xs:complexType>
						<xs:sequence>
							<xs:element maxOccurs="unbounded" minOccurs="1" name="document">
								<xs:complexType>
									<xs:sequence>
										<xs:element name="id" type="xs:long"/>
									</xs:sequence>
								</xs:complexType>
							</xs:element>
						</xs:sequence>
					</xs:complexType>
				</xs:element>
			</xs:sequence>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the verifyOrderResponse WSDL type.
 *
 * It is an extension to the PartnerAPITypeResponse class.
 * 
 * @method PartnerAPITypeVerifyOrderResponse setDocuments(PartnerAPITypeVerifyOrderResponse_Documents $value) Sets the documents element.
 * @method PartnerAPITypeVerifyOrderResponse_Documents getDocuments() Gets the documents element or NULL.
 * @property PartnerAPITypeVerifyOrderResponse_Documents $documents Gets the documents element or NULL.
 * 
 * @package types
 */
class PartnerAPITypeVerifyOrderResponse extends PartnerAPITypeResponse {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
            'documents' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'PartnerAPITypeVerifyOrderResponse_Documents', 'nillable' => FALSE)
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
