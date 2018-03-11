<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'operation.php';
require_once 'certumPartnerAPI/messages/messageGetConfiguration.php';
require_once 'certumPartnerAPI/messages/messageGetConfigurationResponse.php';

/*
<operation name="getConfiguration" parameterOrder="getConfiguration">
	<input message="tns:PartnerServicePortType_getConfiguration">
	</input>
	<output message="tns:PartnerServicePortType_getConfigurationResponse">
	</output>
</operation>
*/

/**
 * This class represents the getConfiguration WSDL operation.
 *
 * It is based on the PartnerAPIOperation class and derives some properties and methods from that class.
 *
 * @method PartnerAPIMessageGetConfigurationResponse getResponseMessage() A complete response from a service
 * 
 * @package operations
 */
class PartnerAPIOperationGetConfiguration extends PartnerAPIOperation {

    /**
     * @var PartnerAPIMessageGetConfiguration
     */
    protected $_input = NULL;
    
    /**
     * @var PartnerAPIMessageGetConfigurationResponse
     */
    protected $_output = NULL;

    /**
     * @var string
     */
    protected $_operation = 'getConfiguration';
    
    /**
     * The constructor.
     * 
     * It initializes input and output data.
     */
    public function __construct() {
        $this->_input  = new PartnerAPIMessageGetConfiguration();
        $this->_output = new PartnerAPIMessageGetConfigurationResponse();
    }

    /**
     * Returns products contained in a response.
     * 
     * This method always returns an array.
     * If there is no product in the response an empty array is returned.
     * Otherwise, an array with one or more products is returned.
     * Keys in the array are numbers meaning the product code
     * and values are objects of type PartnerAPITypeProduct.
     * The following properties are set for each product: code,
     * autoEnrollmentEnabled, certificateNotificationEnabled and
     * verificationNotificationEnabled.
     * 
     * @return PartnerAPITypeProduct[]
     */
    public function getProducts() {
        $productList = array();
        $products = $this->_output->getConfigurationResponse->products;
        if (is_null($products))
            return $productList;
        $product = $products->product;
        if (is_array($product))
            foreach ($product as $p)
                $productList[$p->code] = $p;
        else
            $productList[$product->code] = $product;
        return $productList;
    }

}
