<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'operation.php';
require_once 'certumPartnerAPI/messages/messageQuickOrder.php';
require_once 'certumPartnerAPI/messages/messageQuickOrderResponse.php';

/*
<operation name="quickOrder" parameterOrder="quickOrder">
	<input message="tns:PartnerServicePortType_quickOrder">
	</input>
	<output message="tns:PartnerServicePortType_quickOrderResponse">
	</output>
</operation>
*/

/**
 * This class represents the quickOrder WSDL operation.
 *
 * It is based on the PartnerAPIOperation class and derives some properties and methods from that class.
 *
 * @method PartnerAPIMessageQuickOrderResponse getResponseMessage() A complete response from a service
 * 
 * @package operations
 */
class PartnerAPIOperationQuickOrder extends PartnerAPIOperation {

    /**
     * @var PartnerAPIMessageQuickOrder
     */
    protected $_input = NULL;

    /**
     * @var PartnerAPIMessageQuickOrderResponse
     */
    protected $_output = NULL;

    /**
     * @var string
     */
    protected $_operation = 'quickOrder';

    /**
     * The constructor.
     *
     * It initializes input and output data.
     */
    public function __construct() {
        $this->_input  = new PartnerAPIMessageQuickOrder();
        $this->_output = new PartnerAPIMessageQuickOrderResponse();
    }

    /**
     * Sets a CSR for the request.
     *
     * Setting this value is required.
     *
     * @param string $csr
     * @return PartnerAPIOperationQuickOrder
     */
    public function setCSR($csr) {
        $this->_input->quickOrder->orderParameters->setCSR($csr);
        return $this;
    }

    /**
     * Sets a customer name.
     *
     * Setting this value is required.
     *
     * @param string $customer
     * @return PartnerAPIOperationQuickOrder
     */
    public function setCustomer($customer) {
        $this->_input->quickOrder->orderParameters->setCustomer($customer);
        return $this;
    }

    /**
     * Sets a language to be used for e-mails.
     *
     * Default is 'pl'. Also acceptable are 'en' and 'ru'.
     *
     * @param string $lang
     * @return PartnerAPIOperationQuickOrder
     */
    public function setLanguage($lang) {
        $this->_input->quickOrder->orderParameters->setLanguage($lang);
        return $this;
    }

    /**
     * Sets an order identificator.
     *
     * If not set it will be generated automatically by the system.
     * This identificator have to be unique and it is used to refer to the request.
     *
     * @param string $id
     * @return PartnerAPIOperationQuickOrder
     */
    public function setOrderID($id) {
        $this->_input->quickOrder->orderParameters->setOrderID($id);
        return $this;
    }

    /**
     * Sets a three-letter product code.
     *
     * Setting this value is required.
     *
     * @param string $code
     * @return PartnerAPIOperationQuickOrder
     */
    public function setProductCode($code) {
        $this->_input->quickOrder->orderParameters->setProductCode($code);
        return $this;
    }

    /**
     * Sets a string identifying web browser and operating system.
     *
     * @param string $userAgent
     * @return PartnerAPIOperationQuickOrder
     */
    public function setUserAgent($userAgent) {
        $this->_input->quickOrder->orderParameters->setUserAgent($userAgent);
        return $this;
    }

    /**
     * Sets a certificate's validity period.
     *
     * @param string $notBefore The first day of validity period
     * @param string $notAfter The last day of validity period
     * @return PartnerAPIOperationQuickOrder
     */
    public function setValidityPeriod($notBefore, $notAfter) {
        $vp = $this->_input->quickOrder->orderParameters->validityPeriod;
        if (is_null($vp)) {
            $vp = new PartnerAPITypeValidityPeriod();
            $this->_input->quickOrder->orderParameters->setValidityPeriod($vp);
        }
        $vp->setNotBefore($notBefore);
        $vp->setNotAfter($notAfter);
        return $this;
    }

    /**
     * Sets a hash algorithm for a certificate.
     *
     * @param string $hashAlgorithm
     * @return PartnerAPIOperationQuickOrder
     */
    public function setHashAlgorithm($hashAlgorithm) {
        $this->_input->quickOrder->orderParameters->setHashAlgorithm($hashAlgorithm);
        return $this;
    }

    /**
     * Sets an email for a SSL certificate.
     *
     * @param string $email
     * @return PartnerAPIOperationQuickOrder
     */
    public function setEmail($email) {
        $this->_input->quickOrder->orderParameters->setEmail($email);
        return $this;
    }

    /**
     * Sets all the contact data of a requestor.
     *
     * All arguments are required apart from the last which can be NULL.
     *
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $phone
     * @param string $country
     * @param string $postalCode
     * @param string $city
     * @param string $addressLine1
     * @param string|null $addressLine2
     * @return PartnerAPIOperationQuickOrder
     */
    public function setRequestorInfo($firstName, $lastName, $email, $phone, $country, $postalCode, $city, $addressLine1, $addressLine2 = NULL) {
        $ri = $this->_input->quickOrder->requestorInfo;
        $ri->setFirstName($firstName)->setLastName($lastName)
           ->setEmail($email)->setPhone($phone)
           ->setCountry($country)->setPostalCode($postalCode)->setCity($city)
           ->setAddressLine1($addressLine1);
        if (! is_null($addressLine2))
            $ri->setAddressLine2($addressLine2);
        return $this;
    }

    /**
     * Sets an organization information.
     *
     * It is not required to set organization information but if you need or have to set it
     * all the arguments are required.
     *
     * @param string $name The name of an organization
     * @param string $taxNumber The tax identification number
     * @return PartnerAPIOperationQuickOrder
     */
    public function setOrganizationInfo($name, $taxNumber, $verificationPhoneNumber=NULL) {
        $oi = new PartnerAPITypeOrganizationInfo();
        $oi->setOrganizationName($name)->setTaxIdentificationNumber($taxNumber)->setVerificationPhoneNumber($verificationPhoneNumber);
        $this->_input->quickOrder->setOrganizationInfo($oi);
        return $this;
    }
	
    /**
     * Sets an overrided CSR commonName.
     *
     * It is not required to set this but if you need to override a commonName from CSR
     * then you have to change this as same as SAN entries and approvers.
     *
     * @param string $commonName The commonName to override CN given in CSR 
     * @return PartnerAPIOperationQuickOrder
     */
    public function setCommonName($commonName) {
        $this->_input->quickOrder->orderParameters->setCommonName($commonName);
        return $this;
    }
	
	/**
     * Sets an overrided CSR organization.
     *
     * It is not required to set this but if you need to override a organization from CSR
	 * use this method.
     *
     * @param string $organization The organization to override O given in CSR 
     * @return PartnerAPIOperationQuickOrder
     */
    public function setOrganization($organization) {
        $this->_input->quickOrder->orderParameters->setOrganization($organization);
        return $this;
    }
	
	/**
     * Sets an overrided CSR organizational unit.
     *
     * It is not required to set this but if you need to override a organizational unit from CSR
	 * use this method.
     *
     * @param string $organizationalUnit The Organizational Unit to override OU given in CSR 
     * @return PartnerAPIOperationQuickOrder
     */
    public function setOrganizationalUnit($organizationalUnit) {
        $this->_input->quickOrder->orderParameters->setOrganizationalUnit($organizationalUnit);
        return $this;
    }
	
	/**
     * Sets an overrided CSR locality.
     *
     * It is not required to set this but if you need to override a locality from CSR
	 * use this method.
     *
     * @param string $locality The locality to override L given in CSR 
     * @return PartnerAPIOperationQuickOrder
     */
    public function setLocality($locality) {
        $this->_input->quickOrder->orderParameters->setLocality($locality);
        return $this;
    }
	
	/**
     * Sets an overrided CSR country.
     *
     * It is not required to set this but if you need to override a country from CSR
	 * use this method.
     *
     * @param string $country The country to override C given in CSR 
     * @return PartnerAPIOperationQuickOrder
     */
    public function setCountry($country) {
        $this->_input->quickOrder->orderParameters->setCountry($country);
        return $this;
    }
	
	/**
     * Sets an overrided CSR state.
     *
     * It is not required to set this but if you need to override a state from CSR
	 * use this method.
     *
     * @param string $state The state to override state given in CSR 
     * @return PartnerAPIOperationQuickOrder
     */
    public function setState($state) {
        $this->_input->quickOrder->orderParameters->setState($state);
        return $this;
    }

	
    /**
     * Adds a domain name as a SAN entry in a certificate.
     *
     * SAN entries are optional.
     * If given, the $domain argument must be a correct domain name or an array
     * of such domain names.
     *
     * @param string|string[] $domain
     * @return PartnerAPIOperationQuickOrder
     */
    public function addSANEntry($domain) {
        if (! is_array($domain))
            $domain = array($domain);
        $SANEntries = $this->_input->quickOrder->SANEntries;
        if (is_null($SANEntries)) {
            $SANEntries = new PartnerAPITypeSanEntries();
            $this->_input->quickOrder->setSANEntries($SANEntries);
        }
        foreach ($domain as $d) {
            $san = new PartnerAPITypeSanEntry();
            $san->setDNSName($d);
            $SANEntries->addSANEntry($san);
        }
        return $this;
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
     * @return PartnerAPIOperationQuickOrder
     */
    public function addApprover($FQDN, $email = NULL, $method = NULL) {
        $approvers = $this->_input->quickOrder->approvers;
        if (is_null($approvers)) {
            $approvers = new PartnerAPITypeApprovers();
            $this->_input->quickOrder->setApprovers($approvers);
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
     * @return PartnerAPIOperationQuickOrder
     */
    public function setVerificationNotificationEnabled($yes_or_no) {
    	$approvers = $this->_input->quickOrder->approvers;
    	if (is_null($approvers)) {
    		$approvers = new PartnerAPITypeApprovers();
    		$this->_input->quickOrder->setApprovers($approvers);
    	}
    	$approvers->setVerificationNotificationEnabled($yes_or_no);
    	return $this;
    }

    /**
     * Gets an order ID returned in a response.
     *
     * Notice: this method returns the order ID returned in a response, not the order ID
     * set for the request. If an order ID has been set, it will be returned
     * in a response, but if it was not set, a new generated order ID will be returned.
     *
     * @return string
     */
    public function getOrderID() {
        return $this->_output->quickOrderResponse->orderID;
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
		
		try {
			$vers = $this->_output->quickOrderResponse->verifications;
		} catch (PartnerAPIException $e) {
			return $verList;
		}
		
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
