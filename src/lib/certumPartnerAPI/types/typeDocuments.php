<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';
require_once 'typeDocument.php';

/*
<xs:complexType name="documents">
	<xs:sequence>
		<xs:element maxOccurs="unbounded" name="document" type="tns:document"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the documents WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeDocuments setDocument(PartnerAPITypeDocument $value) Sets the document element. This method removes all previously added document elements and creates a new set of document elements.
 * @method PartnerAPITypeDocuments addDocument(PartnerAPITypeDocument $value) Adds a new document element to the existing set.
 * @method PartnerAPITypeDocument|PartnerAPITypeDocument[] getDocument() Gets the document element. If there is only one element, it will be returned, otherwise an array of PartnerAPITypeDocument objects will be returned.
 * @property PartnerAPITypeDocument|PartnerAPITypeDocument[] $document Gets the document element. If there is only one element, it will be returned, otherwise an array of PartnerAPITypeDocument objects will be returned.
 * 
 * @package types
 */
class PartnerAPITypeDocuments extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'document' => array('min' => 1, 'max' => NULL, 'value' => new PartnerAPITypeDocument(), 'type' => 'PartnerAPITypeDocument', 'nillable' => FALSE)
        );
        return $n;
    }


}
