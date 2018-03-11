<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

/**
 * A basic class for all operations.
 * 
 * This class contains some common methods and properties for all operations.
 * All the public methods are a common interface which can be used when dealing
 * with an actual operation.
 * 
 * A derived class has to redefine the $_operation protected field with an actual
 * operation name. It also has to contain a constructor which assigns proper message
 * objects to $_input an $_output protected fields.
 * 
 * The $_input field is not publicly accessible therefore a derived class
 * should define methods for setting and adding input data.
 * 
 * @package operations
 */
abstract class PartnerAPIOperation {
    
    /**
     * An object for communication with the Partner API WebService
     * 
     * @var PartnerAPIService
     */
    protected $_service = NULL;
    
    /**
     * The input message according to WSDL file.
     * 
     * @var PartnerAPIMessage
     */
    protected $_input = NULL;
    
    /**
     * The output message according to WSDL file.
     * 
     * @var PartnerAPIMessage
     */
    protected $_output = NULL;
    
    /**
     * The name of a operation.
     * 
     * This field must be redefined in an inheriting class and contain the name
     * of operation.
     * 
     * @var string
     */
    protected $_operation = 'undefined';

    /**
     * Sets a service object which is used for communication with Partner API WebService.
     * 
     * Each operation have to send its data to the Partner API WebService.
     * To do it, the operation uses a service object which contains all the
     * necessary functionality for communication.
     * 
     * @param PartnerAPIService $service A service object
     */
    public function setService(PartnerAPIService $service) {
        $this->_service = $service;
        $this->_input->setCredentials($service->getUserName(), $service->getPassword());
    }
    
    /**
     * Returns the service set by the setService() method.
     * 
     * @return PartnerAPIService
     */
    public function getService() {
        return $this->_service;
    }

    /**
     * Returns all the data stored for the operation.
     * 
     * The returned data is the data which will be sent to the Partner API WebService.
     * It is not necessary to call this method in any time unless you just want
     * to check what data is beeing sent.
     * 
     * The argument $omitNullValues tells if elements which value is NULL
     * will be omitted.
     * 
     * @param bool $omitNullValues
     * @return array All the operation data
     */
    public function getInputDataAsArray($omitNullValues = FALSE) {
        return $this->_input->getDataAsArray($omitNullValues);
    }

    /**
     * Returns all the data returned from the Partner API WebService for the operation.
     * 
     * The returned array contains the data which was returned from the Partner API WebService.
     * 
     * @return array All the operation's response data
     */
    public function getOutputDataAsArray() {
        return $this->_output->getDataAsArray();
    }
    
    /**
     * Returns a message containing response from a service.
     * 
     * This is an object of type derived from PartnerAPIMessage and
     * it contains all the response returned from a service.
     * 
     * @return PartnerAPIMessage
     */
    public function getResponseMessage() {
        return $this->_output;
    }

    /**
     * Returns an object representing the header part of a response.
     * 
     * This is a helper method useful when accessing the response's header.
     * 
     * @return PartnerAPITypeResponseHeader
     */
    public function getResponseHeader() {
        return $this->_output->getResponseHeader();
    }
    
    /**
     * Tells if calling an operation was successful.
     * 
     * If not, the error part of the header have to be checked.
     * 
     * @return bool
     */
    public function isSuccess() {
        return $this->_output->getResponseHeader()->successCode == 0;
    }
    
    
    /**
     * Returns all error of an operation.
     * 
     * This method always returns an array. It can be empty or have one or
     * more error objects.
     * 
     * @return PartnerAPITypeError[]
     */
    public function getErrors() {
        $errorsTab = array();
        $errors = $this->_output->getResponseHeader()->errors;
        if (! is_null($errors)) {
            $errorsTab = $errors->Error;
            if (! is_array($errorsTab))
                $errorsTab = array($errorsTab);
        }
        return $errorsTab;
    }
    
    /**
     * Returns localized response time.
     * 
     * The header part of a response contains date and time in GMT timezone.
     * This method returns the date and time of the response converted to
     * local timezone set for PHP interpreter.
     * 
     * @return string Localized date and time of response
     */
    public function getResponseTimeLocal() {
        return date('Y-m-d H:i:s', strtotime($this->_output->getResponseHeader()->timestamp));
    }

    /**
     * Sends the input data to a service.
     * 
     * This method sends all input data, which has been previously set, to the service object.
     * Then the output data are set with the data returned in a response.
     * A bool value is returned and it indicates if the operation was successful.
     * 
     * @return bool Tells if calling an operation was successful
     */
    public function call() {
        $data = $this->getInputDataAsArray(TRUE);
        $response = $this->_service->call($this->_operation, $data);
        $this->_output->setData($response);
        return $this->getResponseHeader()->successCode == 0;
    }

    /**
     * Returns an array with descriptions of errors that have occured.
     * 
     * The returned array is an array of arrays containing the following keys:
     * code, number, text, where code is a success code, number is a error
     * number and text is a description of an error.
     * 
     * @return array
     */
    public function getErrorTexts() {
        if ($this->isSuccess())
            return array();
        require_once 'certumPartnerAPI/exceptions/errors.php';
        $e = new PartnerAPIError();
        return $e->getText($this->_service->getLang(), $this->getResponseHeader()->successCode, $this->getErrors());
    }

}
