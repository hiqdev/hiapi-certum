<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';
require_once 'typeError.php';

/*
<xs:complexType name="errors">
	<xs:sequence>
		<xs:element maxOccurs="unbounded" name="Error" type="tns:error"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the errors WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeErrors setError(PartnerAPITypeError $value) Sets the Error element. This method removes all previously added Error elements and creates a new set of Error elements.
 * @method PartnerAPITypeErrors addError(PartnerAPITypeError $value) Adds a new Error element to the existing set.
 * @method PartnerAPITypeError|PartnerAPITypeError[] getError() Gets the Error element. If there is only one element, it will be returned, otherwise an array of PartnerAPITypeError objects will be returned.
 * @property PartnerAPITypeError|PartnerAPITypeError[] $Error Gets the Error element. If there is only one element, it will be returned, otherwise an array of PartnerAPITypeError objects will be returned.
 * 
 * @package types
 */
class PartnerAPITypeErrors extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'Error' => array('min' => 1, 'max' => NULL, 'value' => new PartnerAPITypeError(), 'type' => 'PartnerAPITypeError', 'nillable' => FALSE)
        );
        return $n;
    }


}
