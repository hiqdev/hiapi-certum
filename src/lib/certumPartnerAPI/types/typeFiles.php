<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'type.php';
require_once 'typeFile.php';

/*
<xs:complexType name="files">
	<xs:sequence>
		<xs:element maxOccurs="unbounded" name="file" type="tns:file"/>
	</xs:sequence>
</xs:complexType>
*/

/**
 * This class represents the files WSDL type.
 *
 * It is based on the PartnerAPIType class and derives properties and methods from that class.
 * 
 * @method PartnerAPITypeFiles setFile(PartnerAPITypeFile $value) Sets the file element. This method removes all previously added file elements and creates a new set of file elements.
 * @method PartnerAPITypeFiles addFile(PartnerAPITypeFile $value) Adds a new file element to the existing set.
 * @method PartnerAPITypeFile|PartnerAPITypeFile[] getFile() Gets the file element. If there is only one element, it will be returned, otherwise an array of PartnerAPITypeFile objects will be returned.
 * @property PartnerAPITypeFile|PartnerAPITypeFile[] $file Gets the file element. If there is only one element, it will be returned, otherwise an array of PartnerAPITypeFile objects will be returned.
 * 
 * @package types
 */
class PartnerAPITypeFiles extends PartnerAPIType {
    
    protected function initData() {
        $n = array(
            'file' => array('min' => 1, 'max' => NULL, 'value' => new PartnerAPITypeFile(), 'type' => 'PartnerAPITypeFile', 'nillable' => FALSE)
        );
        return $n;
    }


}
