<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'operation.php';
require_once 'certumPartnerAPI/messages/messageVerifyOrder.php';
require_once 'certumPartnerAPI/messages/messageVerifyOrderResponse.php';

/*
<operation name="verifyOrder" parameterOrder="verifyOrder">
	<input message="tns:PartnerServicePortType_verifyOrder">
	</input>
	<output message="tns:PartnerServicePortType_verifyOrderResponse">
	</output>
</operation>
*/

/**
 * This class represents the verifyOrder WSDL operation.
 *
 * It is based on the PartnerAPIOperation class and derives some properties and methods from that class.
 *
 * @method PartnerAPIMessageVerifyOrderResponse getResponseMessage() A complete response from a service
 * 
 * @package operations
 */
class PartnerAPIOperationVerifyOrder extends PartnerAPIOperation {

    /**
     * @var PartnerAPIMessageVerifyOrder
     */
    protected $_input = NULL;
    
    /**
     * @var PartnerAPIMessageVerifyOrderResponse
     */
    protected $_output = NULL;

    /**
     * @var string
     */
    protected $_operation = 'verifyOrder';
    
    /**
     * The constructor.
     * 
     * It initializes input and output data.
     */
    public function __construct() {
        $this->_input  = new PartnerAPIMessageVerifyOrder();
        $this->_output = new PartnerAPIMessageVerifyOrderResponse();
    }
    
    /**
     * Sets an order ID for the request.
     *
     * It is required to set this parameter.
     *
     * @param string $orderID
     * @return PartnerAPIOperationVerifyOrder
     */
    public function setOrderID($orderID) {
        $this->_input->verifyOrder->verifyOrderParameters->setOrderID($orderID);
        return $this;
    }

    /**
     * Sets a note for the request.
     *
     * It is required to set this parameter.
     *
     * @param string $note
     * @return PartnerAPIOperationVerifyOrder
     */
    public function setNote($note) {
        $this->_input->verifyOrder->verifyOrderParameters->setNote($note);
        return $this;
    }
    
    /**
     * Adds a document to the request.
     *
     * Adding a document is optional.
     * When adding, the third parameter $files have to be an associative
     * array where keys are file names and values are file contents.
     * array('fileName' => 'fileContents')
     *
     * @param string $type
     * @param string $description
     * @param array $files An array of file names and file contents
     * @return PartnerAPIOperationVerifyOrder
     */
    public function addDocument($type, $description, $files) {
        $docs = $this->_input->verifyOrder->verifyOrderParameters->documents;
        if (is_null($docs)) {
            $docs = new PartnerAPITypeDocuments();
            $this->_input->verifyOrder->verifyOrderParameters->setDocuments($docs);
        }
        $doc = new PartnerAPITypeDocument();
        $doc->setType($type)->setDescription($description);
        foreach ($files as $fileName => $fileContents) {
            $file = new PartnerAPITypeFile();
            $file->setFileName($fileName)->setContent($fileContents);
            $doc->files->addFile($file);
        }
        $docs->addDocument($doc);
        return $this;
    }
    
    /**
     * Returns document identifiers contained in a response.
     * 
     * This method always returns an array.
     * If there is no document in the response an empty array is returned.
     * Otherwise, an array with one or more identifiers is returned.
     * 
     * @return long[] An array of numbers
     */
    public function getDocuments() {
        $docList = array();
        $docs = $this->_output->verifyOrderResponse->documents;
        if (is_null($docs))
            return $docList;
        $doc = $docs->document;
        if (is_array($doc))
            foreach ($doc as $d)
                $docList[] = $d->id;
        else
            $docList[] = $doc->id;
        return $docList;
    }
}
