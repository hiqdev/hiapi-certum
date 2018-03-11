<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'operation.php';
require_once 'certumPartnerAPI/messages/messageGetOrderByOrderID.php';
require_once 'certumPartnerAPI/messages/messageGetOrderByOrderIDResponse.php';

/*
<operation name="getOrderByOrderID" parameterOrder="getOrderByOrderID">
	<input message="tns:PartnerServicePortType_getOrderByOrderID">
	</input>
	<output message="tns:PartnerServicePortType_getOrderByOrderIDResponse">
	</output>
</operation>
*/

/**
 * This class represents the getOrderByOrderID WSDL operation.
 *
 * It is based on the PartnerAPIOperation class and derives some properties and methods from that class.
 *
 * @method PartnerAPIMessageGetOrderByOrderIDResponse getResponseMessage() A complete response from a service
 * 
 * @package operations
 */
class PartnerAPIOperationGetOrderByOrderID extends PartnerAPIOperation {

    /**
     * @var PartnerAPIMessageGetOrderByOrderID
     */
    protected $_input = NULL;
    
    /**
     * @var PartnerAPIMessageGetOrderByOrderIDResponse
     */
    protected $_output = NULL;

    /**
     * @var string
     */
    protected $_operation = 'getOrderByOrderID';
    
    /**
     * The constructor.
     * 
     * It initializes input and output data.
     */
    public function __construct() {
        $this->_input  = new PartnerAPIMessageGetOrderByOrderID();
        $this->_output = new PartnerAPIMessageGetOrderByOrderIDResponse();
    }
    
    /**
     * Sets an order ID for the request.
     * 
     * Setting this value is required.
     * 
     * @param string $orderID
     * @return PartnerAPIOperationGetOrderByOrderID
     */
    public function setOrderID($orderID) {
        $this->_input->getOrderByOrderID->setOrderID($orderID);
        return $this;
    }

    /**
     * Sets the 'certificateDetails' option for a request.
     * 
     * Setting this value is optional.
     * 
     * @param bool $value
     * @return PartnerAPIOperationGetOrderByOrderID
     */
    public function setCertificateDetails($value = FALSE) {
        $o = $this->_input->getOrderByOrderID->orderOption;
        if (is_null($o)) {
            $o = new PartnerAPITypeOrderOption ();
            $this->_input->getOrderByOrderID->setOrderOption($o);
        }
        $o->setCertificateDetails($value);
        return $this;
    }

    /**
     * Sets the 'orderDetails' option for a request.
     * 
     * Setting this value is optional.
     * 
     * @param bool $value
     * @return PartnerAPIOperationGetOrderByOrderID
     */
    public function setOrderDetails($value = FALSE) {
        $o = $this->_input->getOrderByOrderID->orderOption;
        if (is_null($o)) {
            $o = new PartnerAPITypeOrderOption ();
            $this->_input->getOrderByOrderID->setOrderOption($o);
        }
        $o->setOrderDetails($value);
        return $this;
    }

    /**
     * Sets the 'orderStatus' option for a request.
     * 
     * Setting this value is optional.
     * 
     * @param bool $value
     * @return PartnerAPIOperationGetOrderByOrderID
     */
    public function setOrderStatus($value = FALSE) {
        $o = $this->_input->getOrderByOrderID->orderOption;
        if (is_null($o)) {
            $o = new PartnerAPITypeOrderOption ();
            $this->_input->getOrderByOrderID->setOrderOption($o);
        }
        $o->setOrderStatus($value);
        return $this;
    }

    /**
     * Returns orders contained in a response.
     * 
     * This method always returns an array.
     * If there is no order in the response an empty array is returned.
     * Otherwise, an array with one or more orders is returned.
     * 
     * @return PartnerAPITypeOrder[]
     */
    public function getOrders() {
        $orderList = array();
        $orders = $this->_output->getOrderByOrderIDResponse->orders;
        if (is_null($orders))
            return $orderList;
        $order = $orders->Order;
        if (is_array($order))
            foreach ($order as $o)
                $orderList[] = $o;
        else
            $orderList[] = $order;
        return $orderList;
    }

}
