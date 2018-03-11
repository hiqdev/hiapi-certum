<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeChangeApproversRequest.php';

/*
<message name="PartnerServicePortType_changeApprovers">
	<part element="tns:changeApprovers" name="changeApprovers">
	</part>
</message>
<xs:element name="changeApprovers" nillable="true" type="tns:changeApproversRequest"/>
*/

/**
 * This class represents the PartnerServicePortType_changeApprovers WSDL message.
 *
 * It has one part 'changeApprovers' accessible as property or by invoking a getter method.
 *
 * @method PartnerAPIMessageChangeApprovers setCredentials(string $userName, string $password) Overriden method. Read documentation for PartnerAPIMessage class
 * @property PartnerAPITypeChangeApproversRequest $changeApprovers
 * @method PartnerAPITypeChangeApproversRequest getChangeApprovers()
 * 
 * @package messages
 */
class PartnerAPIMessageChangeApprovers extends PartnerAPIMessage {
    
    /**
     * Defines the part with credentials data.
     * 
     * @var string
     */
    protected $partWithCredentials = 'changeApprovers';
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'changeApprovers' => new PartnerAPITypeChangeApproversRequest()
        );
    }


}
