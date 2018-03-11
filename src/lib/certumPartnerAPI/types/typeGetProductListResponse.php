<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeResponse.php';
require_once 'typeGetProductListResponse_Products.php';

/*
<xs:complexType name="getProductListResponse">
	<xs:complexContent>
		<xs:extension base="tns:response">
			<xs:sequence>
				<xs:element minOccurs="0" name="products">
					<xs:complexType>
						<xs:sequence>
							<xs:element maxOccurs="unbounded" name="product" type="tns:product"/>
						</xs:sequence>
					</xs:complexType>
				</xs:element>
			</xs:sequence>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the getProductListResponse WSDL type.
 *
 * It is an extension to the PartnerAPITypeResponse class.
 * 
 * @method PartnerAPITypeGetProductListResponse setProducts(PartnerAPITypeGetProductListResponse_Products $value) Sets the products element.
 * @method PartnerAPITypeGetProductListResponse_Products getProducts() Gets the products element or NULL.
 * @property PartnerAPITypeGetProductListResponse_Products $products Gets the products element or NULL.
 * 
 * @package types
 */
class PartnerAPITypeGetProductListResponse extends PartnerAPITypeResponse {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
            'products' => array('min' => 0, 'max' => 1, 'value' => NULL, 'type' => 'PartnerAPITypeGetProductListResponse_Products', 'nillable' => FALSE)
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
