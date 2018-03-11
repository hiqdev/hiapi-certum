<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

/**
 * This is a base class for implementations of WSDL types.
 * 
 * This class contains some common properties and methods for all types.
 * It also implements "magic methods" like __call() and __get() to access
 * WSDL elements.
 * When overridden, the new class must implement the initData() method which
 * should return an array containing all type elements.
 * 
 * @package types
 */
abstract class PartnerAPIType {
    
    /**
     * This is an array containing all elements in a given type.
     * 
     * The keys in this array are names of WSDL elements and values are
     * arrays contaings the following keys and values:
     * 'min' = 0 if attribute 'minOccurs' = 0 or 1 otherwise,
     * 'max' = NULL if attribute maxOccurs = "unbounded" or 1 otherwise,
     * 'value' = NULL if 'min' = 0 or a simple value of element's type, e.g. "" for string, 0 for int and long, FALSE for boolean and new "object" for a class,
     * 'type' = name of element's type, it can be 'string', 'int', 'long', 'boolean' or a class name which must be derived from PartnerAPIType,
     * 'nillable' => TRUE if attribute nillable = "true", or FALSE otherwise
     * 
     * @var array
     */
    protected $elems = array();
    
    /* *
     * This is an array containing choices from a WSDL file.
     * 
     * Every array's element is an array representing one choice from WSDL.
     * Every choice is an array containg all the choice options where each
     * element is an array containing a set of WSDL elements being an option.
     * An example:
     * <pre>
     * 
     * &lt;xs:choice>
     *     &lt;xs:element name="id" type="xs:long"/>
     *     &lt;xs:sequence>
     *         &lt;xs:element name="name" type="xs:string"/>
     *         &lt;xs:element name="description" type="xs:string"/>
     *     &lt;/xs:sequence>
     * &lt;/xs:choice>
     * 
     * $choices = array(
     *   0 => array(
     *     0 => array("id"),
     *     1 => array("name", "description")
     *   )
     * );
     * </pre>
     * All the array keys are optional and arbitrary.
     * 
     * @var array
     */
    //protected $choices = array();
    
    /**
     * This is an abstract method used to initialize type elements.
     * 
     * When overriden, it must return an array containing all elements for a given type.
     * The structure of this array is defined in the description of $elems variable.
     * If a type is deriving from another type derived from PartnerAPIType
     * then the implementations of this method must call the parent's initData() method
     * and merge all elements.
     * 
     * @return array A set of all type elements
     */
    abstract protected function initData();

    /**
     * It is the constructor.
     * 
     * It just initialize data.
     */
    public function __construct() {
        $this->resetData();
    }
    
    /**
     * This method resets object's data.
     * 
     * It sets all elements to initial states.
     */
    public function resetData() {
        $this->elems = $this->initData();
    }

    /**
     * This method sets values of contained elements
     * 
     * The structure of the data argument must be the same as the structure of
     * data returned when calling an operation on an object of SoapClient class.
     * 
     * This method, although public, is not intended to be called directly.
     * It is rather used internally.
     * 
     * @param array $data Data to be set as elements' values
     * @return PartnerAPIType
     * @throws PartnerAPIException
     */
    public function setData($data) {
        foreach ($data as $elemName => $value) {
            if (isset($this->elems[$elemName])) {
                //if (! $this->canBeChoiced($elemName)) {
                //    require_once 'certumPartnerAPI/exceptions/exceptions.php';
                //    throw new PartnerAPIException("Element '$elemName' cannot be set. It is an option in a choice structure and another option has already been chosen.");
                //}
                $props = $this->elems[$elemName];
                if (! is_array($value))
                    $value = array($value);
                else if (! is_null($props['max']) && count($value) > $props['max']) {
                    require_once 'certumPartnerAPI/exceptions/exceptions.php';
                    throw new PartnerAPIException("Unexpected behavior. Too many (".count($value).") values for element $elemName returned from a service. The element can hold ".$props['max']." values.");
                }
                foreach ($value as $v) {
                    $arg = array();
                    if (in_array($props['type'], array('string', 'int', 'long', 'boolean'))) {
                        $arg = array($v);
                    } else {
                        $newElement = new $props['type'];
                        $newElement->setData($v);
                        $arg = array($newElement);
                    }
                    $this->addElement($elemName, $arg);
                }
            }
        }
        return $this;
    }

    /**
     * This method return all elements and their values as an array
     * 
     * It builds a nested array of arrays or simple values depending on
     * the structure of a type definition.
     * Simple values are string, int, long, boolean and null.
     * Each key is an element's name. 
     * A value can be a simple value or an array if an element's value is
     * an array or an object.
     * 
     * The argument $omitNullValues tells if elements which value is NULL
     * will be omitted.
     * 
     * @param boolean $omitNullValues
     * @return array A set of all elements and they values
     */
    public function getDataAsArray($omitNullValues = FALSE) {
        $r = array();
        foreach ($this->elems as $elem => $props) {
            if ($omitNullValues && is_null($props['value']))
                continue;
            $value = NULL;
            if (is_null($props['max']) && is_array($props['value'])) {
                $value = array();
                foreach ($props['value'] as $v)
                    $value[] = is_object($v) ? $v->getDataAsArray() : $v;
            } else
                $value = is_object($props['value']) ? $props['value']->getDataAsArray() : $props['value'];
            $r[$elem] = $value;
        }
        return $r;
    }
    
    // ====================================================== magic methods
    // ====================================================== call, get, set
    
    /**
     * This is a "magic" method invoked when an inaccessible method is called
     * 
     * This method supports three kinds of calls:
     * - a setting method which name must be formed like setXxx
     * - a adding method which name must be formed like addXxx
     * - a getting method which name must be formed like getXxx
     * and the Xxx part of a method's name is an element's name.
     * 
     * When invoking a setXxx or addXxx method it gets one argument which is
     * passed to this method in an array as the second argument $arguments.
     * The passed arguments must be null, string, int, long, boolean or an object
     * of a type derived from PartnerAPIType, depending on a type's WSDL definition.
     * 
     * @param string $name A name of invoked method
     * @param array $arguments An array with a value to be set
     * @return PartnerAPIType
     * @throws PartnerAPIException
     */
    public function __call($name, $arguments) {
        if (strlen($name) <= 3) {
            require_once 'certumPartnerAPI/exceptions/exceptions.php';
            throw new PartnerAPIException("Invalid method name '$name' for this object.");
        }
        $methodType = substr($name, 0, 3);
        if (!in_array($methodType, array('set', 'add', 'get'))) {
            require_once 'certumPartnerAPI/exceptions/exceptions.php';
            throw new PartnerAPIException("Invalid method name '$name' for this object.");
        }
        $element = $this->findElemName(substr($name, 3));
        if (is_null($element)) {
            require_once 'certumPartnerAPI/exceptions/exceptions.php';
            throw new PartnerAPIException("Invalid method name '$name' for this object.");
        }
        if ($methodType == 'set')
            return $this->setElement($element, $arguments);
        if ($methodType == 'add')
            return $this->addElement($element, $arguments);
        if ($methodType == 'get')
            return $this->getElement($element);
        require_once 'certumPartnerAPI/exceptions/exceptions.php';
        throw new PartnerAPIException("An unexpected error occurred.");
    }
    
    /**
     * Sets an element's value.
     * 
     * This method is called internally and by the __call() "magic" method.
     * It is not recommended to invoke it directly.
     * 
     * This method sets the value of an element. The value is passed in an array
     * as the second argument $arguments.
     * The new value replaces the old value.
     * 
     * @param string $element An element's name
     * @param array $arguments An array with a value to be set
     * @return PartnerAPIType
     * @throws PartnerAPIException
     */
    protected function setElement($element, $arguments) {
        //if (! $this->canBeChoiced($element)) {
        //    require_once 'certumPartnerAPI/exceptions/exceptions.php';
        //    throw new PartnerAPIException("Element '$element' cannot be set. It is an option in a choice structure and another option has already been chosen.");
        //}
        $props = $this->elems[$element];
        $arg = $arguments[0];
        $value = null;
        if (is_null($arg)) {
            if ($props['min'] == 0)
                $value = null;
            else if ($props['nillable']) {
                $value = null;
            } else {
                require_once 'certumPartnerAPI/exceptions/exceptions.php';
                throw new PartnerAPIException("The element '$element' cannot be set with the value of NULL.");
            }
        } else {
            if ($props['type'] == 'string')
                $value = (string) $arg;
            else if ($props['type'] == 'int')
                $value = (int) $arg;
            else if ($props['type'] == 'long')
                $value = (int) $arg;
            else if ($props['type'] == 'boolean')
                $value = (bool) $arg;
            else
                if (is_object($arg) && (get_class($arg) == $props['type']))
                    $value = $arg;
                else {
                    require_once 'certumPartnerAPI/exceptions/exceptions.php';
                    throw new PartnerAPIException("The element '$element' has to be set with an object of type ".$props['type'].".");
                }
        }
        $this->elems[$element]['value'] = $value;
        $this->elems[$element]['was_set'] = TRUE;
        return $this;
    }
    
    /**
     * Adds a value to an element's set of values.
     * 
     * This method is called internally and by the __call() "magic" method.
     * It is not recommended to invoke it directly.
     * 
     * This method adds the value to the set of an element' values.
     * The new value is passed in an array as the second argument $arguments.
     * 
     * This methods can be invoked only for types which have the attribute 'max' set to NULL.
     * If the 'max' attribute is not NULL then the setElement() method is invoked
     * and the new value replaces the old value.
     * 
     * @param string $element An element's name
     * @param array $arguments An array with a value to be set
     * @return PartnerAPIType
     * @throws PartnerAPIException
     */
    protected function addElement($element, $arguments) {
        //if (! $this->canBeChoiced($element)) {
        //    require_once 'certumPartnerAPI/exceptions/exceptions.php';
        //    throw new PartnerAPIException("Element '$element' cannot be set. It is an option in a choice structure and another option has already been chosen.");
        //}
        $props = $this->elems[$element];
        if (! isset($props['was_set']) || FALSE === $props['was_set'])
            return $this->setElement($element, $arguments);
        if ($props['max'] == 1)
            return $this->setElement($element, $arguments);
        $arg = $arguments[0];
        $value = null;
        if ($props['nillable'] || ! (is_null($arg) || is_null($props['value']))) {
            if (is_null($arg))
                $value = null;
            else {
                if ($props['type'] == 'string')
                    $value = (string) $arg;
                else if ($props['type'] == 'int')
                    $value = (int) $arg;
                else if ($props['type'] == 'long')
                    $value = (int) $arg;
                else if ($props['type'] == 'boolean')
                    $value = (bool) $arg;
                else
                    if (is_object($arg) && (get_class($arg) == $props['type']))
                        $value = $arg;
                    else {
                        require_once 'certumPartnerAPI/exceptions/exceptions.php';
                        throw new PartnerAPIException("The element '$element' has to be set with an object of type ".$props['type'].".");
                    }
            }
        }
        else if (! $props['nillable'] && is_null($props['value']))
            return $this->setElement($element, $arguments);
        else {
            require_once 'certumPartnerAPI/exceptions/exceptions.php';
            throw new PartnerAPIException("The element '$element' cannot be set with the value of null.");
        }
        if (! is_array($this->elems[$element]['value']))
            $this->elems[$element]['value'] = array($this->elems[$element]['value']);
        $this->elems[$element]['value'][] = $value;
        $this->elems[$element]['was_set'] = TRUE;
        return $this;
    }
    
    /**
     * Gets an element's value.
     * 
     * This method is called by the __call "magic" method.
     * It is not recommended to invoke it directly.
     * 
     * It just return the value of an element. It can be null, string, int, long,
     * boolean or an object.
     * 
     * @param string $element An element's name
     * @return string|int|long|boolean|null|object The value of an element
     */
    protected function getElement($element) {
        return $this->elems[$element]['value'];
    }
    
    /**
     * This is a "magic" method invoked when an inaccessible property is accessed.
     * 
     * The argument $name is an accessed property and it must be an element's name.
     * 
     * @param string $name An element's name
     * @return string|int|long|boolean|null|object The value of an element
     * @throws PartnerAPIException
     */
    public function __get($name) {
        $element = $this->findElemName($name);
        if (is_null($element)) {
            require_once 'certumPartnerAPI/exceptions/exceptions.php';
            throw new PartnerAPIException("Invalid property name '$name' for this object.");
        }
        return $this->getElement($element);
    }
    
    /**
     * This method converts an element's name to a proper name.
     * 
     * It tries to find if the given element's name exists.
     * It checks the name as it has been given, and with the first letter uppercased and lowercased.
     * If the proper name has been found it is returned, otherwise NULL is returned.
     * 
     * It is used by "magic" methods, so it is not so important whether an element's name
     * is given with the first letter uppercased or lowercased. But always try to use it
     * exactly as it is defined in WSDL file or the documentation for a type.
     * 
     * @param string $name An element's name
     * @return string|null An element's name or null
     */
    protected function findElemName($name) {
        if (isset($this->elems[$name]))
            return $name;
        $name[0] = strtolower($name[0]);
        if (isset($this->elems[$name]))
            return $name;
        $name[0] = strtoupper($name[0]);
        if (isset($this->elems[$name]))
            return $name;
        return NULL;
    }

    /* *
     * This method determines if an element can be set in case when it belongs to a WSDL choice.
     * 
     * If the $choices array is populated with choices based on a WSDL file
     * than it is examined if an element given in the $elemName parameter can be set.
     * If any element in any other choice's option has already been set
     * then the given element cannot be set.
     * 
     * @param string $elemName An element's name
     * @return bool Determines if an element can be set
     */
    /*
    protected function canBeChoiced($elemName) {
        $result = TRUE;
        if (!is_array($this->choices))
            return $result;
        foreach ($this->choices as $wsdlChoice) {
            if (!is_array($wsdlChoice))
                continue;
            $choiceHasOtherChoicesUsed = FALSE;
            $choiceHasElement = FALSE;
            foreach ($wsdlChoice as $singleChoice) {
                if (!is_array($singleChoice))
                    continue;
                $singleChoiceHasElement = FALSE;
                $singleChoiceIsUsed = FALSE;
                foreach ($singleChoice as $element) {
                    if ($elemName == $element)
                        $singleChoiceHasElement = TRUE;
                    else
                        if (isset($this->elems[$element]['was_set']) && $this->elems[$element]['was_set'])
                            $singleChoiceIsUsed = TRUE;
                }
                if ($singleChoiceHasElement)
                    $singleChoiceIsUsed = FALSE;
                $choiceHasOtherChoicesUsed = $choiceHasOtherChoicesUsed || $singleChoiceIsUsed;
                $choiceHasElement = $choiceHasElement || $singleChoiceHasElement;
            }
            if ($choiceHasElement && $choiceHasOtherChoicesUsed) {
                $result = FALSE;
                break;
            }
        }
        return $result;
    }
    */
}
