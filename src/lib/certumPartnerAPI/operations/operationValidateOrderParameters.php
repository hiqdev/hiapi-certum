<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'operation.php';
require_once 'certumPartnerAPI/messages/messageValidateOrderParameters.php';
require_once 'certumPartnerAPI/messages/messageValidateOrderParametersResponse.php';

/*
<operation name="validateOrderParameters" parameterOrder="validateOrderParameters">
	<input message="tns:PartnerServicePortType_validateOrderParameters">
	</input>
	<output message="tns:PartnerServicePortType_validateOrderParametersResponse">
	</output>
</operation>
*/

/**
 * This class represents the validateOrderParameters WSDL operation.
 *
 * It is based on the PartnerAPIOperation class and derives some properties and methods from that class.
 *
 * @method PartnerAPIMessageValidateOrderParametersResponse getResponseMessage() A complete response from a service
 * 
 * @package operations
 */
class PartnerAPIOperationValidateOrderParameters extends PartnerAPIOperation {

    /**
     * @var PartnerAPIMessageValidateOrderParameters
     */
    protected $_input = NULL;

    /**
     * @var PartnerAPIMessageValidateOrderParametersResponse
     */
    protected $_output = NULL;

    /**
     * @var string
     */
    protected $_operation = 'validateOrderParameters';

    /**
     * The constructor.
     *
     * It initializes input and output data.
     */
    public function __construct() {
        $this->_input  = new PartnerAPIMessageValidateOrderParameters();
        $this->_output = new PartnerAPIMessageValidateOrderParametersResponse();
    }

    /**
     * Sets a CSR for the request.
     *
     * Setting this value is required.
     *
     * @param string $csr
     * @return PartnerAPIOperationValidateOrderParameters
     */
    public function setCSR($csr) {
        $this->_input->validateOrderParameters->orderParameters->setCSR($csr);
        return $this;
    }

    /**
     * Sets a customer name.
     *
     * Setting this value is required.
     *
     * @param string $customer
     * @return PartnerAPIOperationValidateOrderParameters
     */
    public function setCustomer($customer) {
        $this->_input->validateOrderParameters->orderParameters->setCustomer($customer);
        return $this;
    }

    /**
     * Sets a language to be used for e-mails.
     *
     * Default is 'pl'. Also acceptable are 'en' and 'ru'.
     *
     * @param string $lang
     * @return PartnerAPIOperationValidateOrderParameters
     */
    public function setLanguage($lang) {
        $this->_input->validateOrderParameters->orderParameters->setLanguage($lang);
        return $this;
    }

    /**
     * Sets an order identificator.
     *
     * If not set it will be generated automatically by the system.
     * This identificator have to be unique and it is used to refer to the request.
     *
     * @param string $id
     * @return PartnerAPIOperationValidateOrderParameters
     */
    public function setOrderID($id) {
        $this->_input->validateOrderParameters->orderParameters->setOrderID($id);
        return $this;
    }

    /**
     * Sets a three-letter product code.
     *
     * Setting this value is required.
     *
     * @param string $code
     * @return PartnerAPIOperationValidateOrderParameters
     */
    public function setProductCode($code) {
        $this->_input->validateOrderParameters->orderParameters->setProductCode($code);
        return $this;
    }

    /**
     * Sets a string identifying web browser and operating system.
     *
     * @param string $userAgent
     * @return PartnerAPIOperationValidateOrderParameters
     */
    public function setUserAgent($userAgent) {
        $this->_input->validateOrderParameters->orderParameters->setUserAgent($userAgent);
        return $this;
    }

    /**
     * Sets a certificate's validity period.
     *
     * @param string $notBefore The first day of validity period
     * @param string $notAfter The last day of validity period
     * @return PartnerAPIOperationValidateOrderParameters
     */
    public function setValidityPeriod($notBefore, $notAfter) {
        $vp = $this->_input->validateOrderParameters->orderParameters->validityPeriod;
        if (is_null($vp)) {
            $vp = new PartnerAPITypeValidityPeriod();
            $this->_input->validateOrderParameters->orderParameters->setValidityPeriod($vp);
        }
        $vp->setNotBefore($notBefore);
        $vp->setNotAfter($notAfter);
        return $this;
    }

    /**
     * Sets a hash algorithm for a certificate.
     *
     * @param string $hashAlgorithm
     * @return PartnerAPIOperationValidateOrderParameters
     */
    public function setHashAlgorithm($hashAlgorithm) {
        $this->_input->validateOrderParameters->orderParameters->setHashAlgorithm($hashAlgorithm);
        return $this;
    }

    /**
     * Sets an email for a SSL certificate.
     *
     * @param string $email
     * @return PartnerAPIOperationValidateOrderParameters
     */
    public function setEmail($email) {
        $this->_input->validateOrderParameters->orderParameters->setEmail($email);
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
     * @return PartnerAPIOperationValidateOrderParameters
     */
    public function setRequestorInfo($firstName, $lastName, $email, $phone, $country, $postalCode, $city, $addressLine1, $addressLine2 = NULL) {
        $ri = $this->_input->validateOrderParameters->requestorInfo;
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
     * @return PartnerAPIOperationValidateOrderParameters
     */
    public function setOrganizationInfo($name, $taxNumber, $verificationPhoneNumber=NULL) {
        $oi = new PartnerAPITypeOrganizationInfo();
        $oi->setOrganizationName($name)->setTaxIdentificationNumber($taxNumber)->setVerificationPhoneNumber($verificationPhoneNumber);
        $this->_input->validateOrderParameters->setOrganizationInfo($oi);
        return $this;
    }
	
	
    /**
     * Sets an overrided CSR commonName.
     *
     * It is not required to set this but if you need to override a commonName from CSR
     * then you have to change this as same as SAN entries and approvers.
     *
     * @param string $commonName The commonName to override CN given in CSR 
     * @return PartnerAPIOperationValidateOrderParameters
     */
    public function setCommonName($commonName) {
        $this->_input->validateOrderParameters->orderParameters->setCommonName($commonName);
        return $this;
    }
	
	/**
     * Sets an overrided CSR organization.
     *
     * It is not required to set this but if you need to override a organization from CSR
	 * use this method.
     *
     * @param string $organization The organization to override O given in CSR 
     * @return PartnerAPIOperationValidateOrderParameters
     */
    public function setOrganization($organization) {
        $this->_input->validateOrderParameters->orderParameters->setOrganization($organization);
        return $this;
    }
	
	/**
     * Sets an overrided CSR organizational unit.
     *
     * It is not required to set this but if you need to override a organizational unit from CSR
	 * use this method.
     *
     * @param string $organizationalUnit The Organizational Unit to override OU given in CSR 
     * @return PartnerAPIOperationValidateOrderParameters
     */
    public function setOrganizationalUnit($organizationalUnit) {
        $this->_input->validateOrderParameters->orderParameters->setOrganizationalUnit($organizationalUnit);
        return $this;
    }
	
	/**
     * Sets an overrided CSR locality.
     *
     * It is not required to set this but if you need to override a locality from CSR
	 * use this method.
     *
     * @param string $locality The locality to override L given in CSR 
     * @return PartnerAPIOperationValidateOrderParameters
     */
    public function setLocality($locality) {
        $this->_input->validateOrderParameters->orderParameters->setLocality($locality);
        return $this;
    }
	
	/**
     * Sets an overrided CSR country.
     *
     * It is not required to set this but if you need to override a country from CSR
	 * use this method.
     *
     * @param string $country The country to override C given in CSR 
     * @return PartnerAPIOperationValidateOrderParameters
     */
    public function setCountry($country) {
        $this->_input->validateOrderParameters->orderParameters->setCountry($country);
        return $this;
    }
	
	/**
     * Sets an overrided CSR state.
     *
     * It is not required to set this but if you need to override a state from CSR
	 * use this method.
     *
     * @param string $state The state to override state given in CSR 
     * @return PartnerAPIOperationValidateOrderParameters
     */
    public function setState($state) {
        $this->_input->validateOrderParameters->orderParameters->setState($state);
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
     * @return PartnerAPIOperationValidateOrderParameters
     */
    public function addSANEntry($domain) {
        if (! is_array($domain))
            $domain = array($domain);
        $SANEntries = $this->_input->validateOrderParameters->SANEntries;
        if (is_null($SANEntries)) {
            $SANEntries = new PartnerAPITypeSanEntries();
            $this->_input->validateOrderParameters->setSANEntries($SANEntries);
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
     * @return PartnerAPIOperationValidateOrderParameters
     */
    public function addApprover($FQDN, $email = NULL, $method = NULL) {
        $approvers = $this->_input->validateOrderParameters->approvers;
        if (is_null($approvers)) {
            $approvers = new PartnerAPITypeApprovers();
            $this->_input->validateOrderParameters->setApprovers($approvers);
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
     * Gets parsed CSR returned as a response.
     *
     * The returned value can be an object of PartnerAPITypeParsedCsr class
     * or null.
     *
     * @return PartnerAPITypeParsedCsr
     */
    public function getParsedCSR() {
        return $this->_output->validateOrderParametersResponse->ParsedCSR;
    }

    /**
     * Prepares an object representing the quick order operation.
     *
     * This method is intended to improve coding and to avoid passing the same data twice.
     * A new object of type PartnerAPIOperationQuickOrder is created
     * and set up with the data set for validation in
     * the PartnerAPIOperationValidateOrderParameters object.
     * It means, all the data which have been set are copied to a new
     * quick order object.
     *
     * @return PartnerAPIOperationQuickOrder
     */
    public function prepareQuickOrderOperation() {
        require_once 'certumPartnerAPI/operations/operationQuickOrder.php';
        $op = new PartnerAPIOperationQuickOrder();
        $op->setService($this->_service);
        $p = $this->_input->validateOrderParameters->orderParameters;
        $op->setCSR($p->CSR)->setCustomer($p->customer)->setLanguage($p->language)
           ->setOrderID($p->orderID)->setUserAgent($p->userAgent)->setProductCode($p->productCode);
        if (! is_null($p->validityPeriod))
           $op->setValidityPeriod($p->validityPeriod->notBefore, $p->validityPeriod->notAfter);
        $r = $this->_input->validateOrderParameters->requestorInfo;
        $op->setRequestorInfo($r->firstName, $r->lastName, $r->email, $r->phone,
            $r->country, $r->postalCode, $r->city, $r->addressLine1, $r->addressLine2);
        $o = $this->_input->validateOrderParameters->organizationInfo;
        if (! is_null($o))
            $op->setOrganizationInfo($o->organizationName, $o->taxIdentificationNumber, $o->$verificationPhoneNumber);
        $a = $this->_input->validateOrderParameters->approvers;
        if (! is_null($a)) {
            if (is_array($a->Approver))
                foreach ($a->Approver as $app)
                    $op->addApprover($app->FQDN, $app->approverEmail, $app->approveMethod);
            else
                $op->addApprover($a->Approver->FQDN, $a->Approver->approverEmail, $a->Approver->approveMethod);
        }
        $s = $this->_input->validateOrderParameters->SANEntries;
        if (! is_null($s)) {
            if (is_array($s->SANEntry))
                foreach ($s->SANEntry as $san)
                    $op->addSANEntry($san->DNSName);
            else
                $op->addSANEntry($s->SANEntry->DNSName);
        }
        return $op;
    }
}
