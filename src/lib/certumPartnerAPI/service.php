<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

/**
 * This class represents a Partner API WebService.
 * 
 * When constructing an object of this type you have to pass proper
 * user name and password as arguments. Optionally, you may specify a URL
 * for a WSDL file of a web service as the third argument. The fourth argument
 * can be used to specify a language used for some localized texts.
 * 
 * @package service
 */
class PartnerAPIService {

    /**
     * A constant field containing URL to a WSDL file in a testing web service
     * 
     * @var string
     */
    const WSDL_TEST = 'https://213.222.200.154/service/PartnerApi?wsdl';
    
    /**
     * A constant field containing URL to a WSDL file in a production web service
     * 
     * @var string
     */
    const WSDL_PROD = 'https://gs.certum.pl/service/PartnerApi?wsdl';
    
    /**
     * List of available languages used for some localized messages.
     * 
     * It is a list of two-letter language codes joined with a semicolon.
     * Currently only two languages are supported: English and Polish.
     * 
     * @var string
     */
    const LANGS = 'en;pl';
    
    //const METHOD_SOAP = "soap";
    //const METHOD_CURL = "curl";

    /**
     * A URL of currently used web service.
     * 
     * @var string
     */
    private $_wsdl = NULL;
    
    /**
     * A current language code.
     * 
     * @var string
     */
    private $_lang = NULL;
    
    /**
     * A user name used for authentication in the Partner API Service.
     * 
     * @var string
     */
    private $_userName = '';
    
    /**
     * A password used for authentication in the Partner API Service.
     * 
     * @var string
     */
    private $_password = '';
    
    //private $_method = NULL;
    
    /**
     * Indicates if SoapFault exceptions should be passed or catched.
     * If they are catched they are rethrown as PartnerAPIException.
     * 
     * @var boolean
     */
    private $_catchSoapFault = FALSE;

    /**
     * Indicates if debugging information should be writeten to a file.
     * 
     * If set to NULL, no debugging information will be stored anywhere.
     * Otherwise, $_debugFile should contain a file name or a URL supported by PHP.
     * 
     * @var string
     */
    private $_debugFile = NULL;
    
    // ========================================================================

    /**
     * The constructor.
     * 
     * The $userName and $password arguments are required. They are used
     * as credentials data in the Partner API WebService.
     * So, creating an object of this class you have to pass your user name
     * and password for the service.
     * The third argument $wsdl is optional and if it is NULL the object connects
     * to the testing web service using the URL defined in the WSDL_TEST field.
     * The fourth argument $lang is also optional. If given it must match one
     * of language codes in the LANGS constant field. Otherwise 'en' is used.
     * 
     * @param string $userName
     * @param string $password
     * @param string|null $wsdl Default: NULL
     * @param string $lang Default: en
     */
    public function __construct($userName = '', $password = '', $wsdl = NULL, $lang = 'en') {
        $this->setUserName($userName);
        $this->setPassword($password);
        $this->setWSDL($wsdl);
        $this->setLang($lang);
        /*
        if (class_exists('SoapClient')) {
            $this->_method = PartnerAPIService::METHOD_SOAP;
        } elseif (function_exists('curl_init')) {
            throw new PartnerAPIException("jakis tekst");
            $this->_method = PartnerAPIService::METHOD_CURL;
        } else {
            throw new PartnerAPIException("jakis tekst"); // w one click mają "Unable to start communication, no SoapClient or Curl availible"
        }
        */
    }

    // ========================================================================

    /**
     * Returns the user name
     * 
     * @return string
     */
    public function getUserName() {
        return $this->_userName;
    }
    
    /**
     * Sets the user name to be used for authentication in a web service.
     * 
     * @param string $userName
     * @return PartnerAPIService The object being called
     */
    public function setUserName($userName) {
        $this->_userName = (string) $userName;
        return $this;
    }
    
    /**
     * Returns the password
     * 
     * @return string
     */
    public function getPassword() {
        return $this->_password;
    }
    
    /**
     * Sets the password to be used for authentication in a web service.
     * 
     * @param string $password
     * @return PartnerAPIService The object being called
     */
    public function setPassword($password) {
        $this->_password = (string) $password;
        return $this;
    }

    /**
     * Returns current language
     * 
     * @return string
     */
    public function getLang() {
        return $this->_lang;
    }
    
    /**
     * Sets the current language
     * 
     * @param string $lang
     * @return PartnerAPIService The object being called
     */
    public function setLang($lang) {
        $langarray = explode(';', PartnerAPIService::LANGS);
        if (! in_array($lang, $langarray))
            $lang = 'en';
        $this->_lang = $lang;
        return $this;
    }
    
    /**
     * Returns current URL for a WSDL file.
     * 
     * @return string
     */
    public function getWSDL() {
        return $this->_wsdl;
    }
    
    /**
     * Sets the current URL for a WSDL file.
     * 
     * @param string|null $wsdl
     * @return PartnerAPIService The object being called
     */
    public function setWSDL($wsdl) {
        if (is_null($wsdl))
            $this->_wsdl = PartnerAPIService::WSDL_TEST;
        else
            $this->_wsdl = (string) $wsdl;
        return $this;
    }

    /**
     * Configures the service to pass or to catch SoapFault exceptions.
     * 
     * If SoapFault exceptions are catched they are rethrown as PartnerAPIException.
     * 
     * @param boolean $yes_or_no
     * @return PartnerAPIService
     */
    public function setCatchSoapFault($yes_or_no) {
        $this->_catchSoapFault = (bool) $yes_or_no;
        return $this;
    }
    
    /**
     * Tells if SoapFault exceptions are passed or catched.
     * 
     * @return boolean True if SoapFault exceptions are catched, False otherwise
     */
    public function getCatchSoapFault() {
        return $this->_catchSoapFault;
    }

    /**
     * Sets a file for storing debug information.
     *
     * The argument $fname should be null or a string containing a file name.
     * If it is null, no debug information will be stored anywhere.
     * Otherwise, it must be anything acceptable by the PHP function fopen() as the first argument.
     *
     * @param string|null $fname
     * @return PartnerAPIService
     * @throws PartnerAPIException
     */
    public function setDebugFile($fname = NULL) {
        if (! (is_null($fname) || is_string($fname))) {
            require_once 'certumPartnerAPI/exceptions/exceptions.php';
            throw new PartnerAPIException("Invalid file name. It should be a string or null.");
        }
        if (is_string($fname) && file_exists($fname) && ! is_writable($fname)) {
            require_once 'certumPartnerAPI/exceptions/exceptions.php';
            throw new PartnerAPIException("File '$fname' is not writable.");
        }
        $this->_debugFile = $fname;
        return $this;
    }
    
    /**
     * Return a file name for writing debug information.
     * 
     * It can also return null if no file name has been set.
     * 
     * @return string|null A file name
     */
    public function getDebugFile() {
        return $this->_debugFile;
    }
    
    /*  future implementation will also support CURL
    public function getMethod() {
        return $this->_method;
    }
    
    public function setMethod($method) {
        if ($method == PartnerAPIService::METHOD_SOAP) {
            if (class_exists('SoapClient'))
                $this->_method = PartnerAPIService::METHOD_SOAP;
            else
                throw new PartnerAPIException("nie można");
            return;
        }
        if ($method == PartnerAPIService::METHOD_CURL) {
            if (function_exists('curl_init'))
                $this->_method = PartnerAPIService::METHOD_CURL;
            else
                throw new PartnerAPIException;
            return;
        }
        throw new PartnerAPIException("jakis tekst"); // w one click mają "Unable to start communication, no SoapClient or Curl availible"
    }
    */

    // ========================================================================

    /**
     * Returns an object representing the getStatement operation.
     * 
     * @return PartnerAPIOperationGetStatement
     */
    public function operationGetStatement() {
        require_once 'certumPartnerAPI/operations/operationGetStatement.php';
        $operation = new PartnerAPIOperationGetStatement();
        $operation->setService($this);
        return $operation;
    }

    /**
     * Returns an object representing the validateOrderParameters operation.
     * 
     * @return PartnerAPIOperationValidateOrderParameters
     */
    public function operationValidateOrderParameters() {
        require_once 'certumPartnerAPI/operations/operationValidateOrderParameters.php';
        $operation = new PartnerAPIOperationValidateOrderParameters();
        $operation->setService($this);
        return $operation;
    }

    /**
     * Returns an object representing the quickOrder operation.
     * 
     * @return PartnerAPIOperationQuickOrder
     */
    public function operationQuickOrder() {
        require_once 'certumPartnerAPI/operations/operationQuickOrder.php';
        $operation = new PartnerAPIOperationQuickOrder();
        $operation->setService($this);
        return $operation;
    }
    
    /**
     * Returns an object representing the getApproverList operation.
     * 
     * @return PartnerAPIOperationGetApproverList
     */
    public function operationGetApproverList() {
        require_once 'certumPartnerAPI/operations/operationGetApproverList.php';
        $operation = new PartnerAPIOperationGetApproverList();
        $operation->setService($this);
        return $operation;
    }
    
    /**
     * Returns an object representing the getOrderByOrderID operation.
     * 
     * @return PartnerAPIOperationGetOrderByOrderID
     */
    public function operationGetOrderByOrderID() {
        require_once 'certumPartnerAPI/operations/operationGetOrderByOrderID.php';
        $operation = new PartnerAPIOperationGetOrderByOrderID();
        $operation->setService($this);
        return $operation;
    }

    /**
     * Returns an object representing the getOrderByOrderID operation.
     * 
     * @return PartnerAPIOperationGetOrderByOrderID
     */
    public function operationGetOrdersByDateRange() {
        require_once 'certumPartnerAPI/operations/operationGetOrdersByDateRange.php';
        $operation = new PartnerAPIOperationGetOrdersByDateRange();
        $operation->setService($this);
        return $operation;
    }

    /**
     * Returns an object representing the getModifiedOrders operation.
     * 
     * @return PartnerAPIOperationGetModifiedOrders
     */
    public function operationGetModifiedOrders() {
        require_once 'certumPartnerAPI/operations/operationGetModifiedOrders.php';
        $operation = new PartnerAPIOperationGetModifiedOrders();
        $operation->setService($this);
        return $operation;
    }

    /**
     * Returns an object representing the cancelOrder operation.
     * 
     * @return PartnerAPIOperationCancelOrder
     */
    public function operationCancelOrder() {
        require_once 'certumPartnerAPI/operations/operationCancelOrder.php';
        $operation = new PartnerAPIOperationCancelOrder();
        $operation->setService($this);
        return $operation;
    }

    /**
     * Returns an object representing the sendNotifications operation.
     * 
     * @return PartnerAPIOperationSendNotifications
     */
    public function operationSendNotifications() {
        require_once 'certumPartnerAPI/operations/operationSendNotifications.php';
        $operation = new PartnerAPIOperationSendNotifications();
        $operation->setService($this);
        return $operation;
    }

    /**
     * Returns an object representing the getProductList operation.
     * 
     * @return PartnerAPIOperationGetProductList
     */
    public function operationGetProductList() {
        require_once 'certumPartnerAPI/operations/operationGetProductList.php';
        $operation = new PartnerAPIOperationGetProductList();
        $operation->setService($this);
        return $operation;
    }

    /**
     * Returns an object representing the getConfiguration operation.
     * 
     * @return PartnerAPIOperationGetConfiguration
     */
    public function operationGetConfiguration() {
        require_once 'certumPartnerAPI/operations/operationGetConfiguration.php';
        $operation = new PartnerAPIOperationGetConfiguration();
        $operation->setService($this);
        return $operation;
    }

    /**
     * Returns an object representing the getDomainVerification operation.
     * 
     * @return PartnerAPIOperationGetDomainVerification
     */
    public function operationGetDomainVerification() {
        require_once 'certumPartnerAPI/operations/operationGetDomainVerification.php';
        $operation = new PartnerAPIOperationGetDomainVerification();
        $operation->setService($this);
        return $operation;
    }

    /**
     * Returns an object representing the getCertificate operation.
     * 
     * @return PartnerAPIOperationGetCertificate
     */
    public function operationGetCertificate() {
        require_once 'certumPartnerAPI/operations/operationGetCertificate.php';
        $operation = new PartnerAPIOperationGetCertificate();
        $operation->setService($this);
        return $operation;
    }

    /**
     * Returns an object representing the renewCertificate operation.
     * 
     * @return PartnerAPIOperationRenewCertificate
     */
    public function operationRenewCertificate() {
        require_once 'certumPartnerAPI/operations/operationRenewCertificate.php';
        $operation = new PartnerAPIOperationRenewCertificate();
        $operation->setService($this);
        return $operation;
    }

    /**
     * Returns an object representing the revokeCertificate operation.
     * 
     * @return PartnerAPIOperationRevokeCertificate
     */
    public function operationRevokeCertificate() {
        require_once 'certumPartnerAPI/operations/operationRevokeCertificate.php';
        $operation = new PartnerAPIOperationRevokeCertificate();
        $operation->setService($this);
        return $operation;
    }

    /**
     * Returns an object representing the changeApprovers operation.
     *
     * @return PartnerAPIOperationChangeApprovers
     */
    public function operationChangeApprovers() {
    	require_once 'certumPartnerAPI/operations/operationChangeApprovers.php';
    	$operation = new PartnerAPIOperationChangeApprovers();
    	$operation->setService($this);
    	return $operation;
    }
    
    /**
     * Returns an object representing the verifyDomain operation.
     *
     * @return PartnerAPIOperationVerifyDomain
     */
    public function operationVerifyDomain() {
    	require_once 'certumPartnerAPI/operations/operationVerifyDomain.php';
    	$operation = new PartnerAPIOperationVerifyDomain();
    	$operation->setService($this);
    	return $operation;
    }
    
    /**
     * Returns an object representing the getExpiringCertificates operation.
     *
     * @return PartnerAPIOperationGetExpiringCertificates
     */
    public function operationGetExpiringCertificates() {
        require_once 'certumPartnerAPI/operations/operationGetExpiringCertificates.php';
        $operation = new PartnerAPIOperationGetExpiringCertificates();
        $operation->setService($this);
        return $operation;
    }
    
    /**
     * Returns an object representing the verifyOrder operation.
     *
     * @return PartnerAPIOperationVerifyOrder
     */
    public function operationVerifyOrder() {
        require_once 'certumPartnerAPI/operations/operationVerifyOrder.php';
        $operation = new PartnerAPIOperationVerifyOrder();
        $operation->setService($this);
        return $operation;
    }

    /**
     * Returns an object representing the orderSNICertificate operation.
     *
     * @return PartnerAPIOperationOrderSNICertificate
     */
    public function operationOrderSNICertificate() {
        require_once 'certumPartnerAPI/operations/operationOrderSNICertificate.php';
        $operation = new PartnerAPIOperationOrderSNICertificate();
        $operation->setService($this);
        return $operation;
    }
    
    /**
     * Returns an object representing the modifySNICertificate operation.
     *
     * @return PartnerAPIOperationModifySNICertificate
     */
    public function operationModifySNICertificate() {
        require_once 'certumPartnerAPI/operations/operationModifySNICertificate.php';
        $operation = new PartnerAPIOperationModifySNICertificate();
        $operation->setService($this);
        return $operation;
    }
    
    /**
     * Returns an object representing the updateDocuments operation.
     *
     * @return PartnerAPIOperationUpdateDocuments
     */
    public function operationUpdateDocuments() {
        require_once 'certumPartnerAPI/operations/operationUpdateDocuments.php';
        $operation = new PartnerAPIOperationUpdateDocuments();
        $operation->setService($this);
        return $operation;
    }

    /**
     * Returns an object representing the getEmailVerification operation.
     *
     * @return PartnerAPIOperationGetEmailVerification
     */
    public function operationGetEmailVerification() {
        require_once 'certumPartnerAPI/operations/operationGetEmailVerification.php';
        $operation = new PartnerAPIOperationGetEmailVerification();
        $operation->setService($this);
        return $operation;
    }

    /**
     * Returns an object representing the reissueCertificate operation.
     *
     * @return PartnerAPIOperationReissueCertificate
     */
    public function operationReissueCertificate() {
        require_once 'certumPartnerAPI/operations/operationReissueCertificate.php';
        $operation = new PartnerAPIOperationReissueCertificate();
        $operation->setService($this);
        return $operation;
    }

    // ========================================================================
    
    /**
     * This method invokes a given operation in the Partner API WebService
     * 
     * This method is used for communication with the service. It sends the data
     * passed in the $data argument to the service and invokes the operation specified
     * in the $operation argument. It uses a WSDL file defined as the current WSDL file
     * in the constructor or by calling the setWSDL() method.
     * The $operation argument is simply a string.
     * The $data argument is an array in which keys are parts' names (according to WSDL)
     * and values are subsequent arrays. The subsequent arrays contain all passed elements.
     * A subsequent array's key is an element's name and value is a scalar value,
     * an array of scalar values or an array of further elements.
     * 
     * This method can write debugging information to a file (see the setDebugFile() method).
     * This information is stored in a file only after a successful call to a service.
     * 
     * Although it is possible, it is not intended this method to be called directly
     * by a user. It is invoked by operation objects.
     * 
     * It returns an object containg all returned data from the service.
     * 
     * @param string $operation The operations to be called
     * @param array $data The data to be passed to the operation
     * @return object
     * @throws SoapFault
     * @throws PartnerAPIException
     */
    public function call($operation = 'unspecified', $data = array()) {
        $client = new SoapClient($this->_wsdl,
            array('trace' => true, 'exceptions' => true, 'connection_timeout' => 30));
        if ($this->_catchSoapFault) {
            try {
                $r = $client->__soapCall($operation, $data);
            } catch (SoapFault $e) {
                require_once 'certumPartnerAPI/exceptions/exceptions.php';
                $ex = new PartnerAPIException($e->getMessage(), (int) $e->getCode());
                throw $ex;
            }
        } else {
            $r = $client->__soapCall($operation, $data);
        }
        $this->writeDebugData($operation, $data, $r, $client);
        return $r;
    }
    
    /**
     * Writes debugging information to a file.
     * 
     * @param string $operation Operation invoked
     * @param array $data Data sent
     * @param array|string|object $r Response data
     * @param SoapClient $client Client object
     */
    protected function writeDebugData($operation, $data, $r, $client) {
        if (! is_null($this->_debugFile)) {
            $f = fopen($this->_debugFile, 'a');
            fwrite($f, "======================================================================\n");
            fwrite($f, "DEBUGGING INFORMATION FOR A 'PARTNER API SERVICE' REQUEST\n");
            fwrite($f, "======================================================================\n");
            fwrite($f, "TIME: ".date("Y-m-d H:i:s")."\n");
            fwrite($f, "SERVICE USED: ".$this->_wsdl."\n");
            fwrite($f, "OPERATION INVOKED: ".$operation."\n");
            if (is_soap_fault($r)) {
                fwrite($f, "AN ERROR OCCURED:\n");
                fwrite($f, "SOAP FAULT CODE: ".$r->faultcode."\n");
                fwrite($f, "SOAP FAULT MESSAGE: ".$r->faultstring."\n");
            }
            fwrite($f, "----------\nDATA SENT:\n----------\n".print_r($data, true)."\n");
            fwrite($f, "--------------\nDATA RETURNED:\n--------------\n".print_r($r, true)."\n");
            fwrite($f, "----------------\nREQUEST HEADERS:\n----------------\n".$client->__getLastRequestHeaders()."\n");
            fwrite($f, "--------\nREQUEST:\n--------\n".$client->__getLastRequest()."\n");
            fwrite($f, "-----------------\nRESPONSE HEADERS:\n-----------------\n".$client->__getLastResponseHeaders()."\n");
            fwrite($f, "---------\nRESPONSE:\n---------\n".$client->__getLastResponse()."\n");
            fwrite($f, "===========\nEND\n===========\n");
            fclose($f);
        }
    }
    
}
