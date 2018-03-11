<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'operation.php';
require_once 'certumPartnerAPI/messages/messageUpdateDocuments.php';
require_once 'certumPartnerAPI/messages/messageUpdateDocumentsResponse.php';

/*
<operation name="updateDocuments" parameterOrder="updateDocuments">
	<input message="tns:PartnerServicePortType_updateDocuments">
	</input>
	<output message="tns:PartnerServicePortType_updateDocumentsResponse">
	</output>
</operation>
*/

/**
 * This class represents the updateDocuments WSDL operation.
 *
 * It is based on the PartnerAPIOperation class and derives some properties and methods from that class.
 *
 * @method PartnerAPIMessageUpdateDocumentsResponse getResponseMessage() A complete response from a service
 * 
 * @package operations
 */
class PartnerAPIOperationUpdateDocuments extends PartnerAPIOperation {

    /**
     * @var PartnerAPIMessageUpdateDocuments
     */
    protected $_input = NULL;
    
    /**
     * @var PartnerAPIMessageUpdateDocumentsResponse
     */
    protected $_output = NULL;

    /**
     * @var string
     */
    protected $_operation = 'updateDocuments';
    
    /**
     * The constructor.
     * 
     * It initializes input and output data.
     */
    public function __construct() {
        $this->_input  = new PartnerAPIMessageUpdateDocuments();
        $this->_output = new PartnerAPIMessageUpdateDocumentsResponse();
    }
    
    /**
     * Adds files for a document.
     * 
     * It is required to set at least one document with at least one file.
     * To add more than one file to a document call this method as many times
     * as you need passing the same $id of a document.
     * 
     * @param long $id A document's id
     * @param string $fileName The name of a file
     * @param string $fileContents Content of a file
     * @return PartnerAPIOperationUpdateDocuments
     */
    public function addFileForDocument($id, $fileName, $fileContents) {
        $doc = $this->_input->updateDocuments->documents->document;
        $elem = NULL;
        if (! is_array($doc))
            $doc = array($doc);
        foreach ($doc as $d)
            if ($d->id == $id)
                $elem = $d;
        $file = new PartnerAPITypeFile();
        $file->setFileName($fileName)->setContent($fileContents);
        if (is_null($elem)) {
            $document = new PartnerAPITypeDocument();
            $document->setId($id)->files->addFile($file);
            $this->_input->updateDocuments->documents->addDocument($document);
        } else {
            $elem->files->addFile($file);
        }
        return $this;
    }
}
