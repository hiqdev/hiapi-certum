<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';

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
 * This class represents the verifyOrderResponse > documents > document WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeVerifyOrderResponse_Documents_Document setId(long $value) Sets the id element.
 * @method long getId() Gets the id element.
 * @property long $id Gets the id element.
 * 
 * @package types
 */
class PartnerAPITypeVerifyOrderResponse_Documents_Document extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'id' => array('min' => 1, 'max' => 1, 'value' => NULL, 'type' => 'long', 'nillable' => FALSE)
        );
        return $n;
    }


}
