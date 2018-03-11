<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeRequest.php';
require_once 'typeDocuments.php';

/*
<xs:complexType name="updateDocumentsRequest">
	<xs:complexContent>
		<xs:extension base="tns:request">
			<xs:sequence>
				<xs:element name="documents" type="tns:documents"/>
			</xs:sequence>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the updateDocumentsRequest WSDL type.
 *
 * It is an extension to the PartnerAPITypeRequest class.
 * 
 * @method PartnerAPITypeUpdateDocumentsRequest setDocuments(PartnerAPITypeDocuments $value) Sets the documents element.
 * @method PartnerAPITypeDocuments getDocuments() Gets the documents element.
 * @property PartnerAPITypeDocuments $documents Gets the documents element.
 * 
 * @package types
 */
class PartnerAPITypeUpdateDocumentsRequest extends PartnerAPITypeRequest {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
            'documents' => array('min' => 1, 'max' => 1, 'value' => new PartnerAPITypeDocuments(), 'type' => 'PartnerAPITypeDocuments', 'nillable' => FALSE)
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
