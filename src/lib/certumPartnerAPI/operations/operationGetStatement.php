<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'operation.php';
require_once 'certumPartnerAPI/messages/messageGetStatement.php';
require_once 'certumPartnerAPI/messages/messageGetStatementResponse.php';

/*
<operation name="getStatement" parameterOrder="getStatement">
	<input message="tns:PartnerServicePortType_getStatement">
	</input>
	<output message="tns:PartnerServicePortType_getStatementResponse">
	</output>
</operation>
*/

/**
 * This class represents the getStatement WSDL operation.
 *
 * It is based on the PartnerAPIOperation class and derives some properties and methods from that class.
 *
 * @method PartnerAPIMessageGetStatementResponse getResponseMessage() A complete response from a service
 * 
 * @package operations
 */
class PartnerAPIOperationGetStatement extends PartnerAPIOperation {

    /**
     * @var PartnerAPIMessageGetStatement
     */
    protected $_input = NULL;
    
    /**
     * @var PartnerAPIMessageGetStatementResponse
     */
    protected $_output = NULL;

    /**
     * @var string
     */
    protected $_operation = 'getStatement';
    
    /**
     * The constructor.
     * 
     * It initializes input and output data.
     */
    public function __construct() {
        $this->_input  = new PartnerAPIMessageGetStatement();
        $this->_output = new PartnerAPIMessageGetStatementResponse();
    }

    /**
     * This method sets a language (two-letter code).
     * 
     * The response will be in indicated language.
     * 
     * @param string $lang
     * @return PartnerAPIOperationGetStatement
     */
    public function setLanguage($lang) {
        $this->_input->getStatement->setLanguage($lang);
        return $this;
    }
    
    /**
     * Returns a statement.
     * 
     * @return string
     */
    public function getStatement() {
        return $this->_output->getStatementResponse->statement;
    }

}
