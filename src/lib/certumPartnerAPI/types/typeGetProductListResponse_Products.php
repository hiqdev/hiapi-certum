<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';
require_once 'typeProduct.php';

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
 * This class represents the getProductListResponse > products WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeGetProductListResponse_Products setProduct(PartnerAPITypeProduct $value) Sets the product element. This method removes all previously added product elements and creates a new set of product elements.
 * @method PartnerAPITypeGetProductListResponse_Products addProduct(PartnerAPITypeProduct $value) Adds a new product element to the existing set.
 * @method PartnerAPITypeProduct|PartnerAPITypeProduct[] getProduct() Gets the product element. If there is only one element, it will be returned, otherwise an array of PartnerAPITypeProduct objects will be returned.
 * @property PartnerAPITypeProduct|PartnerAPITypeProduct[] $product Gets the product element. If there is only one element, it will be returned, otherwise an array of PartnerAPITypeProduct objects will be returned.
 * 
 * @package types
 */
class PartnerAPITypeGetProductListResponse_Products extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'product' => array('min' => 1, 'max' => NULL, 'value' => new PartnerAPITypeProduct(), 'type' => 'PartnerAPITypeProduct', 'nillable' => FALSE)
        );
        return $n;
    }


}
