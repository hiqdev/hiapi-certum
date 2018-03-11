<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'operation.php';
require_once 'certumPartnerAPI/messages/messageGetDomainVerification.php';
require_once 'certumPartnerAPI/messages/messageGetDomainVerificationResponse.php';

/*
<operation name="getDomainVerification" parameterOrder="getDomainVerification">
	<input message="tns:PartnerServicePortType_getDomainVerification">
	</input>
	<output message="tns:PartnerServicePortType_getDomainVerificationResponse">
	</output>
</operation>
*/

/**
 * This class represents the getDomainVerification WSDL operation.
 *
 * It is based on the PartnerAPIOperation class and derives some properties and methods from that class.
 *
 * @method PartnerAPIMessageGetDomainVerificationResponse getResponseMessage() A complete response from a service
 * 
 * @package operations
 */
class PartnerAPIOperationGetDomainVerification extends PartnerAPIOperation {

    /**
     * @var PartnerAPIMessageGetDomainVerification
     */
    protected $_input = NULL;

    /**
     * @var PartnerAPIMessageGetDomainVerificationResponse
     */
    protected $_output = NULL;

    /**
     * @var string
     */
    protected $_operation = 'getDomainVerification';

    /**
     * The constructor.
     *
     * It initializes input and output data.
     */
    public function __construct() {
        $this->_input  = new PartnerAPIMessageGetDomainVerification();
        $this->_output = new PartnerAPIMessageGetDomainVerificationResponse();
    }

    /**
     * Sets an order ID for the request.
     *
     * Setting this value is required.
     *
     * @param string $orderID
     * @return PartnerAPIOperationGetDomainVerification
     */
    public function setOrderID($orderID) {
        $this->_input->getDomainVerification->setOrderID($orderID);
        return $this;
    }

    /**
     * Sets whether or not to show all verification methods.
     *
     * @param boolean $showArchived
     * @return PartnerAPIOperationGetDomainVerification
     */
    public function setShowArchived($showArchived) {
        $this->_input->getDomainVerification->setShowArchived($showArchived);
        return $this;
    }

    /**
     * Returns domains contained in a response.
     *
     * This method always returns an array.
     * If there is no domain in the response an empty array is returned.
     * Otherwise, an array with one or more domains is returned.
     * Keys in the array are domain names
     * and values are objects of type PartnerAPITypeDomain.
     *
     * @return PartnerAPITypeDomain[]
     */
    public function getDomains() {
        $domainList = array();
        $domains = $this->_output->getDomainVerificationResponse->domains;
        if (is_null($domains))
            return $domainList;
        $domain = $domains->domain;
        if (is_array($domain))
            foreach ($domain as $d)
                $domainList[$d->domainName] = $d;
        else
            $domainList[$domain->domainName] = $domain;
        return $domainList;
    }

}
