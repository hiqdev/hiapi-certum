<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeGetStatementRequest.php';

/*
<message name="PartnerServicePortType_getStatement">
	<part element="tns:getStatement" name="getStatement">
	</part>
</message>
<xs:element name="getStatement" nillable="true" type="tns:getStatementRequest"/>
*/

/**
 * This class represents the PartnerServicePortType_getStatement WSDL message.
 *
 * It has one part 'getStatement' accessible as property or by invoking a getter method.
 *
 * @method PartnerAPIMessageGetStatement setCredentials(string $userName, string $password) Overriden method. Read documentation for PartnerAPIMessage class
 * @property PartnerAPITypeGetStatementRequest $getStatement
 * @method PartnerAPITypeGetStatementRequest getGetStatement()
 * 
 * @package messages
 */
class PartnerAPIMessageGetStatement extends PartnerAPIMessage {
    
    /**
     * Defines the part with credentials data.
     * 
     * @var string
     */
    protected $partWithCredentials = 'getStatement';
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'getStatement' => new PartnerAPITypeGetStatementRequest()
        );
    }


}
