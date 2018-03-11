<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';
require_once 'typeErrors.php';

/*
<xs:complexType name="responseHeader">
	<xs:sequence>
		<xs:element minOccurs="0" name="currentPage" type="xs:int"/>
		<xs:element minOccurs="0" name="errors" type="tns:errors"/>
		<xs:element minOccurs="0" name="pagesCount" type="xs:int"/>
		<xs:element minOccurs="0" name="returnCount" type="xs:int"/>
		<xs:element name="successCode" type="xs:int"/>
		<xs:element name="timestamp" type="xs:dateTime"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the responseHeader WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeResponseHeader setCurrentPage(int $value) Sets the currentPage element.
 * @method int getCurrentPage() Gets the currentPage element or NULL.
 * @property int $currentPage Gets the currentPage element or NULL.
 * 
 * @method PartnerAPITypeResponseHeader setErrors(PartnerAPITypeErrors $value) Sets the errors element.
 * @method PartnerAPITypeErrors getErrors() Gets the errors element or NULL.
 * @property PartnerAPITypeErrors $errors Gets the errors element or NULL.
 * 
 * @method PartnerAPITypeResponseHeader setPagesCount(int $value) Sets the pagesCount element.
 * @method int getPagesCount() Gets the pagesCount element or NULL.
 * @property int $pagesCount Gets the pagesCount element or NULL.
 * 
 * @method PartnerAPITypeResponseHeader setReturnCount(int $value) Sets the returnCount element.
 * @method int getReturnCount() Gets the returnCount element or NULL.
 * @property int $returnCount Gets the returnCount element or NULL.
 * 
 * @method PartnerAPITypeResponseHeader setSuccessCode(int $value) Sets the successCode element.
 * @method int getSuccessCode() Gets the successCode element.
 * @property int $successCode Gets the successCode element.
 * 
 * @method PartnerAPITypeResponseHeader setTimestamp(string $value) Sets the timestamp element.
 * @method string getTimestamp() Gets the timestamp element.
 * @property string $timestamp Gets the timestamp element.
 * 
 * @package types
 */
class PartnerAPITypeResponseHeader extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'currentPage' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'int', 'nillable' => FALSE),
            'errors'      => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'PartnerAPITypeErrors', 'nillable' => FALSE),
            'pagesCount'  => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'int', 'nillable' => FALSE),
            'returnCount' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'int', 'nillable' => FALSE),
            'successCode' => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'int', 'nillable' => FALSE),
            'timestamp'   => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE)
        );
        return $n;
    }


}
