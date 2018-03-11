<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

/**
 * This is a base class for implementations of WSDL messages.
 * 
 * This class contains some common properties and methods for all messages.
 * It also implements "magic methods" like __call() and __get() to access
 * messages' parts.
 * When overridden, the new class must implement the initParts() method which
 * should return an array containing all message's parts.
 * 
 * @package messages
 */
abstract class PartnerAPIMessage {

    /**
     * This field defines a part name with credentials data.
     * 
     * @var string
     */
    protected $partWithCredentials = NULL;

    /**
     * This field defines a part name with a response header.
     * 
     * @var string
     */
    protected $partWithResponseHeader = NULL;

    /**
     * This field contains all parts of a message.
     * 
     * This is an array where keys are names of a message's parts and
     * values are objects of certain types according to the WSDL file.
     * 
     * @var array
     */
    protected $parts = array();
    
    /**
     * The constructor.
     * 
     * Initiates a message's parts.
     */
    public function __construct() {
        $this->parts = $this->initParts();
    }

    /**
     * This method returns initial data for a message's parts.
     * 
     * This method must be redefined in overriding classes and return an array
     * containing all parts of a message. The array keys are names of parts
     * and the array values are objects of type according to the WSDL file.
     * The objects must derive from the PartnerAPIType class.
     * Example:
     * array(
     *     'partName' => PartnerAPITypeSomeType()
     * )
     * 
     * @return array A set of a message's parts
     */
    abstract protected function initParts();

    /**
     * Sets the credentials data.
     * 
     * Every request message have to contain credentials data so that
     * the request could be authenticated. This method can be used to set
     * the credentials.
     * An exception of the type PartnerAPIException can be raised when
     * the part with credentials data defined in a derived class does not exist.
     * 
     * @param string $userName A user name
     * @param string $password A password
     * @return PartnerAPIMessage
     * @throws PartnerAPIException
     */
    public function setCredentials($userName, $password) {
        if (! is_null($this->partWithCredentials)) {
            if (! isset($this->parts[$this->partWithCredentials])) {
                require_once 'certumPartnerAPI/exceptions/exceptions.php';
                throw new PartnerAPIException("The defined part name with credentials data '".$this->partWithCredentials."' does not exists.");
            }
            $element = $this->parts[$this->partWithCredentials];
            $authToken = $element->requestHeader->authToken;
            $authToken->setPassword($password);
            $authToken->setUserName($userName);
        }
        return $this;
    }
    
    /**
     * Returns the responseHeader element from a service's response
     * 
     * @return PartnerAPITypeResponseHeader
     */
    public function getResponseHeader() {
        $partName = $this->partWithResponseHeader;
        if (is_null($partName)) {
            reset($this->parts);
            $partName = key($this->parts);
        }
        return $this->parts[$partName]->responseHeader;
    }


    /**
     * Returns an array with all parts and its elements
     * 
     * The keys in this array are parts' names and values are arrays with
     * elements belonging to a given part.
     * 
     * The argument $omitNullValues tells if elements which value is NULL
     * will be omitted.
     * 
     * @param bool $omitNullValues
     * @return array
     */
    public function getDataAsArray($omitNullValues = FALSE) {
        $r = array();
        foreach ($this->parts as $e => $p)
            $r[$e] = $p->getDataAsArray($omitNullValues);
        return $r;
    }

    /**
     * This method sets values of a message's parts.
     * 
     * The structure of the data argument must be the same as the structure of
     * data returned when calling an operation on an object of SoapClient class.
     * 
     * This method, although public, is not intended to be called directly.
     * It is rather used internally.
     * 
     * @param array $data
     * @return PartnerAPIMessage
     * @throws PartnerAPIException
     */
    public function setData($data) {
        if (count($this->parts) == 0) {
            require_once 'certumPartnerAPI/exceptions/exceptions.php';
            throw new PartnerAPIException("This message does not have any parts defined.");
        }
        foreach ($this->parts as $part)
            $part->setData($data);
        return $this;
    }

    /**
     * This is a "magic" method invoked when an inaccessible method is called
     * 
     * This method supports one kind of calls:
     * - a getting method which name must be formed like getXxx
     * and the Xxx part of a method's name is a part name.
     * 
     * @param string $name A name of invoked method
     * @param array $arguments Unsed argument but required by PHP
     * @return PartnerAPIType Actually it is an object of a type derived from the PartnerAPIType type
     * @throws PartnerAPIException
     */
    public function __call($name, $arguments) {
        if (strlen($name) <= 3) {
            require_once 'certumPartnerAPI/exceptions/exceptions.php';
            throw new PartnerAPIException("Invalid method name '$name' for this object.");
        }
        $methodType = substr($name, 0, 3);
        if (! in_array($methodType, array('get'))) {
            require_once 'certumPartnerAPI/exceptions/exceptions.php';
            throw new PartnerAPIException("Invalid method name '$name' for this object.");
        }
        $part = $this->findPartName(substr($name, 3));
        if (is_null($part)) {
            require_once 'certumPartnerAPI/exceptions/exceptions.php';
            throw new PartnerAPIException("Invalid method name '$name' for this object.");
        }
        if ($methodType == 'get')
            return $this->getElement($part);
        require_once 'certumPartnerAPI/exceptions/exceptions.php';
        throw new PartnerAPIException("An unexpected error occurred.");
    }
    
    /**
     * Gets a part's object.
     * 
     * This method is called by "magic" methods.
     * It is not recommended to invoke it directly.
     * 
     * It just return an indicated part which is an object of a type derived from
     * PartnerAPIType.
     * 
     * @param string $partname A part name
     * @return object An object representing a message's part
     */
    protected function getPart($partname) {
        return $this->parts[$partname];
    }

    /**
     * This is a "magic" method invoked when an inaccessible property is accessed.
     * 
     * The argument $name is an accessed property and it must be a message's part name.
     * If it does not exists an PartnerAPIException exception is raised.
     * 
     * @param string $name A part name
     * @return object An object representing a message's part
     * @throws PartnerAPIException
     */
    public function __get($name) {
        $part = $this->findPartName($name);
        if (is_null($part)) {
            require_once 'certumPartnerAPI/exceptions/exceptions.php';
            throw new PartnerAPIException("Invalid property name '$name' for this object.");
        }
        return $this->getPart($part);
    }

    /**
     * This method converts a part's name to a proper name.
     * 
     * It tries to find if the given part's name exists.
     * It checks the name as it has been given, and with the first letter uppercased and lowercased.
     * If the proper name has been found it is returned, otherwise NULL is returned.
     * 
     * It is used by "magic" methods, so it is not so important whether an part's name
     * is given with the first letter uppercased or lowercased. But always try to use it
     * exactly as it is defined in WSDL file.
     * 
     * @param string $name A part's name
     * @return string|null A proper part's name or null
     */
    protected function findPartName($name) {
        if (isset($this->parts[$name]))
            return $name;
        $name[0] = strtolower($name[0]);
        if (isset($this->parts[$name]))
            return $name;
        $name[0] = strtoupper($name[0]);
        if (isset($this->parts[$name]))
            return $name;
        return NULL;
    }

    /**
     * This is a "magic" method triggered by calling isset() or empty() on inaccessible properties.
     * 
     * The argument $name is a property name and it must be a message's part name.
     * 
     * @param string $name A part name
     * @return bool Indicates if a property exists
     */
    public function __isset($name) {
        $part = $this->findPartName($name);
        return is_null($part) !== FALSE;
    }
    
}
