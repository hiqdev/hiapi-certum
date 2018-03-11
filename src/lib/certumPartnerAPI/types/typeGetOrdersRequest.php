<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeRequest.php';
require_once 'typeOrderOption.php';

/*
<xs:complexType name="getOrdersRequest">
	<xs:complexContent>
		<xs:extension base="tns:request">
			<xs:sequence>
				<xs:element name="fromDate" type="xs:dateTime"/>
				<xs:element minOccurs="0" name="orderOption" type="tns:orderOption"/>
				<xs:element default="1" minOccurs="0" name="pageNumber" type="xs:int"/>
				<xs:element name="toDate" type="xs:dateTime"/>
			</xs:sequence>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the getOrdersRequest WSDL type.
 *
 * It is an extension to the PartnerAPITypeRequest class.
 * 
 * @method PartnerAPITypeGetOrdersRequest setFromDate(string $value) Sets the fromDate element.
 * @method string getFromDate() Gets the fromDate element.
 * @property string $fromDate Gets the fromDate element.
 * 
 * @method PartnerAPITypeGetOrdersRequest setOrderOption(PartnerAPITypeOrderOption $value) Sets the orderOption element.
 * @method PartnerAPITypeOrderOption getOrderOption() Gets the orderOption element or NULL.
 * @property PartnerAPITypeOrderOption $orderOption Gets the orderOption element or NULL.
 * 
 * @method PartnerAPITypeGetOrdersRequest setPageNumber(int $value) Sets the pageNumber element.
 * @method int getPageNumber() Gets the pageNumber element or NULL.
 * @property int $pageNumber Gets the pageNumber element or NULL.
 * 
 * @method PartnerAPITypeGetOrdersRequest setToDate(string $value) Sets the toDate element.
 * @method string getToDate() Gets the toDate element.
 * @property string $toDate Gets the toDate element.
 * 
 * @package types
 */
class PartnerAPITypeGetOrdersRequest extends PartnerAPITypeRequest {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
            'fromDate'    => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE),
            'orderOption' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'PartnerAPITypeOrderOption', 'nillable' => FALSE),
            'pageNumber'  => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'int', 'nillable' => FALSE),
            'toDate'      => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'string', 'nillable' => FALSE)
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
