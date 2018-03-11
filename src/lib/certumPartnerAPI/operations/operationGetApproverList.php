<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'operation.php';
require_once 'certumPartnerAPI/messages/messageGetApproverList.php';
require_once 'certumPartnerAPI/messages/messageGetApproverListResponse.php';

/*
<operation name="getApproverList" parameterOrder="getApproverList">
	<input message="tns:PartnerServicePortType_getApproverList">
	</input>
	<output message="tns:PartnerServicePortType_getApproverListResponse">
	</output>
</operation>
*/

/**
 * This class represents the getApproverList WSDL operation.
 *
 * It is based on the PartnerAPIOperation class and derives some properties and methods from that class.
 *
 * @method PartnerAPIMessageGetApproverListResponse getResponseMessage() A complete response from a service
 * 
 * @package operations
 */
class PartnerAPIOperationGetApproverList extends PartnerAPIOperation {

    /**
     * @var PartnerAPIMessageGetApproverList
     */
    protected $_input = NULL;
    
    /**
     * @var PartnerAPIMessageGetApproverListResponse
     */
    protected $_output = NULL;

    /**
     * @var string
     */
    protected $_operation = 'getApproverList';
    
    /**
     * The constructor.
     * 
     * It initializes input and output data.
     */
    public function __construct() {
        $this->_input  = new PartnerAPIMessageGetApproverList();
        $this->_output = new PartnerAPIMessageGetApproverListResponse();
    }

    /**
     * Adds a new domain name to the operation's data.
     * 
     * The $FQDN argument is a string containing a domain name. It can be also an array
     * of such strings.
     * This method can be invoked several times and all passed domain names
     * will be added to the existing set of domains.
     * 
     * @param string|array $FQDN FQDN to be added
     * @return PartnerAPIOperationGetApproverList
     */
    public function addFQDN($FQDN) {
        if (is_array($FQDN))
            foreach ($FQDN as $F)
                $this->_input->getApproverList->FQDNs->addFQDN($F);
        else
            $this->_input->getApproverList->FQDNs->addFQDN($FQDN);
        return $this;
    }
    
    /**
     * Returns approvers contained in a response.
     * 
     * This method always returns an array.
     * If there is no approver in the response an empty array is returned.
     * Otherwise, an array with one or more approvers is returned.
     * Keys in the array are strings containig domain names
     * and values are objects of type PartnerAPITypeApprover.
     * 
     * @return PartnerAPITypeApprover[]
     */
    public function getApprovers() {
        $approverList = array();
        $approvers = $this->_output->getApproverListResponse->approvers;
        if (is_null($approvers))
            return $approverList;
        $approver = $approvers->Approver;
        if (is_array($approver))
            foreach ($approver as $a)
                $approverList[$a->FQDN] = $a;
        else
            $approverList[$approver->FQDN] = $approver;
        return $approverList;
    }

}
