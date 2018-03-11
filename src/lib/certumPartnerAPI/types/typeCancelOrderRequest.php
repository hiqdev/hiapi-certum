<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'typeRequest.php';
require_once 'typeCancelParameters.php';

/*
<xs:complexType name="cancelOrderRequest">
	<xs:complexContent>
		<xs:extension base="tns:request">
			<xs:sequence>
				<xs:element name="cancelParameters" type="tns:cancelParameters"/>
			</xs:sequence>
		</xs:extension>
	</xs:complexContent>
</xs:complexType>
*/

/**
 * This class represents the cancelOrderRequest WSDL type.
 *
 * It is an extension to the PartnerAPITypeRequest class.
 * 
 * @method PartnerAPITypeCancelOrderRequest setCancelParameters(PartnerAPITypeCancelParameters $value) Sets the cancelParameters element.
 * @method PartnerAPITypeCancelParameters getCancelParameters() Gets the cancelParameters element.
 * @property PartnerAPITypeCancelParameters $cancelParameters Gets the cancelParameters element.
 * 
 * @package types
 */
class PartnerAPITypeCancelOrderRequest extends PartnerAPITypeRequest {
    
    protected function initData() {
        $p = parent::initData();
        $n = array(
            'cancelParameters' => array('min' => 1, 'max' => 1, 'value' => new PartnerAPITypeCancelParameters(), 'type' => 'PartnerAPITypeCancelParameters', 'nillable' => FALSE)
        );
        $n = array_merge($p, $n);
        return $n;
    }


}
