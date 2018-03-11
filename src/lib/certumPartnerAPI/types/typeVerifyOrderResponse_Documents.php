<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';
require_once 'typeVerifyOrderResponse_Documents_Document.php';

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
 * This class represents the verifyOrderResponse > documents WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeVerifyOrderResponse_Documents setDocument(PartnerAPITypeVerifyOrderResponse_Documents_Document $value) Sets the document element. This method removes all previously added document elements and creates a new set of document elements.
 * @method PartnerAPITypeVerifyOrderResponse_Documents addDocument(PartnerAPITypeVerifyOrderResponse_Documents_Document $value) Adds a new document element to the existing set.
 * @method PartnerAPITypeVerifyOrderResponse_Documents_Document|PartnerAPITypeVerifyOrderResponse_Documents_Document[] getDocument() Gets the document element. If there is only one element, it will be returned, otherwise an array of PartnerAPITypeVerifyOrderResponse_Documents_Document objects will be returned.
 * @property PartnerAPITypeVerifyOrderResponse_Documents_Document|PartnerAPITypeVerifyOrderResponse_Documents_Document[] $document Gets the document element. If there is only one element, it will be returned, otherwise an array of PartnerAPITypeVerifyOrderResponse_Documents_Document objects will be returned.
 * 
 * @package types
 */
class PartnerAPITypeVerifyOrderResponse_Documents extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'document' => array('min' => 1, 'max' => NULL, 'value' => new PartnerAPITypeVerifyOrderResponse_Documents_Document(), 'type' => 'PartnerAPITypeVerifyOrderResponse_Documents_Document', 'nillable' => FALSE)
        );
        return $n;
    }


}
