<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';
require_once 'typeSanEntry.php';

/*
<xs:complexType name="sanEntries">
	<xs:sequence>
		<xs:element maxOccurs="unbounded" name="SANEntry" type="tns:sanEntry"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the sanEntries WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeSanEntries setSANEntry(PartnerAPITypeSanEntry $value) Sets the SANEntry element. This method removes all previously added SANEntry elements and creates a new set of SANEntry elements.
 * @method PartnerAPITypeSanEntries addSANEntry(PartnerAPITypeSanEntry $value) Adds a new SANEntry element to the existing set.
 * @method PartnerAPITypeSanEntry|PartnerAPITypeSanEntry[] getSANEntry() Gets the SANEntry element. If there is only one element, it will be returned, otherwise an array of PartnerAPITypeSanEntry objects will be returned.
 * @property PartnerAPITypeSanEntry|PartnerAPITypeSanEntry[] $SANEntry Gets the SANEntry element. If there is only one element, it will be returned, otherwise an array of PartnerAPITypeSanEntry objects will be returned.
 * 
 * @package types
 */
class PartnerAPITypeSanEntries extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'SANEntry' => array('min' => 1, 'max' => NULL, 'value' => new PartnerAPITypeSanEntry(), 'type' => 'PartnerAPITypeSanEntry', 'nillable' => FALSE)
        );
        return $n;
    }


}
