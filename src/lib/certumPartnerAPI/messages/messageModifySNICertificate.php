<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'message.php';
require_once 'certumPartnerAPI/types/typeModifySNICertificateRequest.php';

/*
<message name="PartnerServicePortType_modifySNICertificate">
	<part element="tns:modifySNICertificate" name="modifySNICertificate">
	</part>
</message>
<xs:element name="modifySNICertificate" nillable="true" type="tns:modifySNICertificateRequest"/>
*/

/**
 * This class represents the PartnerServicePortType_modifySNICertificate WSDL message.
 *
 * It has one part 'modifySNICertificate' accessible as property or by invoking a getter method.
 *
 * @method PartnerAPIMessageModifySNICertificate setCredentials(string $userName, string $password) Overriden method. Read documentation for PartnerAPIMessage class
 * @property PartnerAPITypeModifySNICertificateRequest $modifySNICertificate
 * @method PartnerAPITypeModifySNICertificateRequest getModifySNICertificate()
 * 
 * @package messages
 */
class PartnerAPIMessageModifySNICertificate extends PartnerAPIMessage {
    
    /**
     * Defines the part with credentials data.
     * 
     * @var string
     */
    protected $partWithCredentials = 'modifySNICertificate';
    
    /**
     * This method returns initial data for the message's parts.
     * 
     * @return array
     */
    protected function initParts() {
        return array(
            'modifySNICertificate' => new PartnerAPITypeModifySNICertificateRequest()
        );
    }


}
