<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'operation.php';
require_once 'certumPartnerAPI/messages/messageRenewCertificate.php';
require_once 'certumPartnerAPI/messages/messageRenewCertificateResponse.php';

/*
<operation name="renewCertificate" parameterOrder="renewCertificate">
	<input message="tns:PartnerServicePortType_renewCertificate">
	</input>
	<output message="tns:PartnerServicePortType_renewCertificateResponse">
	</output>
</operation>
*/

/**
 * This class represents the renewCertificate WSDL operation.
 *
 * It is based on the PartnerAPIOperation class and derives some properties and methods from that class.
 *
 * @method PartnerAPIMessageRenewCertificateResponse getResponseMessage() A complete response from a service
 * 
 * @package operations
 */
class PartnerAPIOperationRenewCertificate extends PartnerAPIOperation {

    /**
     * @var PartnerAPIMessageRenewCertificate
     */
    protected $_input = NULL;

    /**
     * @var PartnerAPIMessageRenewCertificateResponse
     */
    protected $_output = NULL;

    /**
     * @var string
     */
    protected $_operation = 'renewCertificate';

    /**
     * The constructor.
     *
     * It initializes input and output data.
     */
    public function __construct() {
        $this->_input  = new PartnerAPIMessageRenewCertificate();
        $this->_output = new PartnerAPIMessageRenewCertificateResponse();
    }

    /**
     * Adds an approving method.
     *
     * Approvers are optional.
     * If any approver is needed, this method can be used to set it.
     * The $FQDN argument is required to be given.
     * The $email and $method arguments are optional and it depends on the kind
     * of a request which argument to pass (both of them can be passed as well).
     * Important: You may pass only one e-mail and only one method although the WSDL file
     * and the PartnerAPITypeApprover class have diffrent definitions.
     *
     * @param string $FQDN A domain name
     * @param string $email An e-mail used for verification
     * @param string $method A verification method
     * @return PartnerAPIOperationRenewCertificate
     */
    public function addApprover($FQDN, $email = NULL, $method = NULL) {
    	$approvers = $this->_input->renewCertificate->approvers;
    	if (is_null($approvers)) {
    		$approvers = new PartnerAPITypeApprovers();
    		$this->_input->renewCertificate->setApprovers($approvers);
    	}
    	$approver = new PartnerAPITypeApprover();
    	$approver->setFQDN($FQDN);
    	if (! is_null($email))
    		$approver->setApproverEmail($email);
    	if (! is_null($method))
    		$approver->setApproveMethod($method);
    	$approvers->addApprover($approver);
    	return $this;
    }

    /**
     * Sets the verificationNotificationEnabled option for approvers.
     *
     * This option determines if verification e-mails for all approvers will be sent or not.
     *
     * @param boolean $yes_or_no
     * @return PartnerAPIOperationRenewCertificate
     */
    public function setVerificationNotificationEnabled($yes_or_no) {
    	$approvers = $this->_input->renewCertificate->approvers;
    	if (is_null($approvers)) {
    		$approvers = new PartnerAPITypeApprovers();
    		$this->_input->renewCertificate->setApprovers($approvers);
    	}
    	$approvers->setVerificationNotificationEnabled($yes_or_no);
    	return $this;
    }

    /**
     * Sets a CSR for the request.
     *
     * Setting this value is required.
     *
     * @param string $csr
     * @return PartnerAPIOperationRenewCertificate
     */
    public function setCSR($csr) {
        $this->_input->renewCertificate->setCSR($csr);
        return $this;
    }

    /**
     * Sets a customer name for the request.
     *
     * Setting this value is required.
     *
     * @param string $customer
     * @return PartnerAPIOperationRenewCertificate
     */
    public function setCustomer($customer) {
        $this->_input->renewCertificate->setCustomer($customer);
        return $this;
    }

    /**
     * Sets a product code for the request.
     *
     * Setting this value is required.
     *
     * @param string $productCode
     * @return PartnerAPIOperationRenewCertificate
     */
    public function setProductCode($productCode) {
        $this->_input->renewCertificate->setProductCode($productCode);
        return $this;
    }

    /**
     * Sets the serial number of a certificate to be renew.
     *
     * It is required to set X509Cert or serialNumber value but only one
     * of them may be set. Setting both values is an error.
     *
     * @param string $serialNumber
     * @return PartnerAPIOperationRenewCertificate
     */
    public function setSerialNumber($serialNumber) {
    	$this->_input->renewCertificate->setSerialNumber($serialNumber);
    	return $this;
    }

    /**
     * Sets a certificate's validity period.
     *
     * @param string $notBefore The first day of validity period
     * @param string $notAfter The last day of validity period
     * @return PartnerAPIOperationRenewCertificate
     */
    public function setValidityPeriod($notBefore, $notAfter) {
    	$vp = $this->_input->renewCertificate->validityPeriod;
    	if (is_null($vp)) {
    		$vp = new PartnerAPITypeValidityPeriod();
    		$this->_input->renewCertificate->setValidityPeriod($vp);
    	}
    	$vp->setNotBefore($notBefore);
    	$vp->setNotAfter($notAfter);
    	return $this;
    }

    /**
     * Sets a certificate to be renew.
     *
     * It is required to set X509Cert or serialNumber value but only one
     * of them may be set. Setting both values is an error.
     *
     * @param string $x509cert
     * @return PartnerAPIOperationRenewCertificate
     */
    public function setX509Cert($x509cert) {
        $this->_input->renewCertificate->setX509Cert($x509cert);
        return $this;
    }

    /**
     * Sets a hash algorithm to be used.
     *
     * @param string $hashAlgorithm
     * @return PartnerAPIOperationRenewCertificate
     */
    public function setHashAlgorithm($hashAlgorithm) {
        $this->_input->renewCertificate->setHashAlgorithm($hashAlgorithm);
        return $this;
    }

    /**
     * Sets an email for a SSL certificate.
     *
     * @param string $email
     * @return PartnerAPIOperationRenewCertificate
     */
    public function setEmail($email) {
        $this->_input->renewCertificate->setEmail($email);
        return $this;
    }

    /**
     * Gets an order ID returned in a response.
     *
     * @return string
     */
    public function getOrderID() {
        return $this->_output->renewCertificateResponse->orderID;
    }

    /**
     * Returns verifications contained in a response.
     *
     * This method always returns an array.
     * If there is no verification in the response an empty array is returned.
     * Otherwise, an array with one or more verifications is returned.
     * Keys in the array are strings containig domain names
     * and values are objects of type PartnerAPITypeVerification.
     *
     * @return PartnerAPITypeVerification[]
     */
    public function getVerifications() {
    	$verList = array();
    	$vers = $this->_output->renewCertificateResponse->verifications;
    	if (is_null($vers))
    		return $verList;
    	$ver = $vers->verification;
    	if (is_null($ver))
    		return $verList;
    	if (is_array($ver))
    		foreach ($ver as $v)
    			$verList[$v->fQDN] = $v;
    	else
    		$verList[$ver->fQDN] = $ver;
    	return $verList;
    }

}
