<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'operation.php';
require_once 'certumPartnerAPI/messages/messageGetExpiringCertificates.php';
require_once 'certumPartnerAPI/messages/messageGetExpiringCertificatesResponse.php';

/*
<operation name="getExpiringCertificates" parameterOrder="getExpiringCertificates">
	<input message="tns:PartnerServicePortType_getExpiringCertificates">
	</input>
	<output message="tns:PartnerServicePortType_getExpiringCertificatesResponse">
	</output>
</operation>
*/

/**
 * This class represents the getExpiringCertificates WSDL operation.
 *
 * It is based on the PartnerAPIOperation class and derives some properties and methods from that class.
 *
 * @method PartnerAPIMessageGetExpiringCertificatesResponse getResponseMessage() A complete response from a service
 * 
 * @package operations
 */
class PartnerAPIOperationGetExpiringCertificates extends PartnerAPIOperation {

    /**
     * @var PartnerAPIMessageGetExpiringCertificates
     */
    protected $_input = NULL;
    
    /**
     * @var PartnerAPIMessageGetExpiringCertificatesResponse
     */
    protected $_output = NULL;

    /**
     * @var string
     */
    protected $_operation = 'getExpiringCertificates';
    
    /**
     * The constructor.
     * 
     * It initializes input and output data.
     */
    public function __construct() {
        $this->_input  = new PartnerAPIMessageGetExpiringCertificates();
        $this->_output = new PartnerAPIMessageGetExpiringCertificatesResponse();
    }
    
    /**
     * Sets the minimum number of days that a certificate is still valid.
     *
     * It is required to set this value. 
     *
     * @param int $validityDaysLeft
     * @return PartnerAPIOperationGetExpiringCertificates
     */
    public function setValidityDaysLeft($validityDaysLeft) {
        $this->_input->getExpiringCertificates->setValidityDaysLeft($validityDaysLeft);
        return $this;
    }

    /**
     * Sets a page number for a request.
     * 
     * @param int|null $number
     * @return PartnerAPIOperationGetExpiringCertificates
     */
    public function setPageNumber($number) {
        $this->_input->getExpiringCertificates->setPageNumber($number);
        return $this;
    }
    
    /**
     * Returns expiring certificates contained in a response.
     *
     * This method always returns an array.
     * If there is no expiring certificate in a response an empty array is returned.
     * Otherwise, an array with one or more expiring certificates is returned.
     * 
     * @return PartnerAPITypeExpiringCertificates[]
     */
    public function getExpiringCertificates() {
        $list = array();
        $certs = $this->_output->getExpiringCertificatesResponse->expiringCertificates;
        if (is_null($certs))
            return $list;
        if (is_array($certs))
            foreach ($cert as $c)
                $list[$c->serialNumber] = $c;
        else
            $list[$certs->serialNumber] = $certs;
        return $list;
    }
    
}
