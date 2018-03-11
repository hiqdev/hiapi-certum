<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeGetConfigurationRequest.php';

/*
<message name="PartnerServicePortType_getConfiguration">
	<part element="tns:getConfiguration" name="getConfiguration">
	</part>
</message>
<xs:element name="getConfiguration" nillable="true" type="tns:getConfigurationRequest"/>
*/

/**
 * This class represents the PartnerServicePortType_getConfiguration WSDL message.
 *
 * It has one part 'getConfiguration' accessible as property or by invoking a getter method.
 *
 * @method PartnerAPIMessageGetConfiguration setCredentials(string $userName, string $password) Overriden method. Read documentation for PartnerAPIMessage class
 * @property PartnerAPITypeGetConfigurationRequest $getConfiguration
 * @method PartnerAPITypeGetConfigurationRequest getGetConfiguration()
 * 
 * @package messages
 */
class PartnerAPIMessageGetConfiguration extends PartnerAPIMessage {
    
    /**
     * Defines the part with credentials data.
     * 
     * @var string
     */
    protected $partWithCredentials = 'getConfiguration';
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'getConfiguration' => new PartnerAPITypeGetConfigurationRequest()
        );
    }


}
