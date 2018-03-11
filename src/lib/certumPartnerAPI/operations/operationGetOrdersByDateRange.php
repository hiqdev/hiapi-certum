<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'operation.php';
require_once 'certumPartnerAPI/messages/messageGetOrdersByDateRange.php';
require_once 'certumPartnerAPI/messages/messageGetOrdersByDateRangeResponse.php';

/*
<operation name="getOrdersByDateRange" parameterOrder="getOrdersByDateRange">
	<input message="tns:PartnerServicePortType_getOrdersByDateRange">
	</input>
	<output message="tns:PartnerServicePortType_getOrdersByDateRangeResponse">
	</output>
</operation>
*/

/**
 * This class represents the getOrdersByDateRange WSDL operation.
 *
 * It is based on the PartnerAPIOperation class and derives some properties and methods from that class.
 *
 * @method PartnerAPIMessageGetOrdersByDateRangeResponse getResponseMessage() A complete response from a service
 * 
 * @package operations
 */
class PartnerAPIOperationGetOrdersByDateRange extends PartnerAPIOperation {

    /**
     * @var PartnerAPIMessageGetOrdersByDateRange
     */
    protected $_input = NULL;
    
    /**
     * @var PartnerAPIMessageGetOrdersByDateRangeResponse
     */
    protected $_output = NULL;

    /**
     * @var string
     */
    protected $_operation = 'getOrdersByDateRange';
    
    /**
     * The constructor.
     * 
     * It initializes input and output data.
     */
    public function __construct() {
        $this->_input  = new PartnerAPIMessageGetOrdersByDateRange();
        $this->_output = new PartnerAPIMessageGetOrdersByDateRangeResponse();
    }
    
    /**
     * Sets the request's date range.
     * 
     * Setting this values is required.
     * 
     * @param string $fromDate
     * @param string $toDate
     * @return PartnerAPIOperationGetOrdersByDateRange
     */
    public function setDateRange($fromDate, $toDate) {
        $this->_input->getOrdersByDateRange->setFromDate($fromDate)->setToDate($toDate);
        return $this;
    }

    /**
     * Sets the 'certificateDetails' option for a request.
     * 
     * Setting this value is optional.
     * 
     * @param bool $value
     * @return PartnerAPIOperationGetOrdersByDateRange
     */
    public function setCertificateDetails($value = FALSE) {
        $o = $this->_input->getOrdersByDateRange->orderOption;
        if (is_null($o)) {
            $o = new PartnerAPITypeOrderOption ();
            $this->_input->getOrdersByDateRange->setOrderOption($o);
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
     * @return PartnerAPIOperationGetOrdersByDateRange
     */
    public function setOrderDetails($value = FALSE) {
        $o = $this->_input->getOrdersByDateRange->orderOption;
        if (is_null($o)) {
            $o = new PartnerAPITypeOrderOption ();
            $this->_input->getOrdersByDateRange->setOrderOption($o);
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
     * @return PartnerAPIOperationGetOrdersByDateRange
     */
    public function setOrderStatus($value = FALSE) {
        $o = $this->_input->getOrdersByDateRange->orderOption;
        if (is_null($o)) {
            $o = new PartnerAPITypeOrderOption ();
            $this->_input->getOrdersByDateRange->setOrderOption($o);
        }
        $o->setOrderStatus($value);
        return $this;
    }
    
    /**
     * Sets the 'pageNumber' option for a request.
     * 
     * Setting this value is optional.
     * 
     * @param int $value
     * @return PartnerAPIOperationGetOrdersByDateRange
     */
    public function setPageNumber($value = 1) {
        $this->_input->getOrdersByDateRange->setPageNumber($value);
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
        $orders = $this->_output->getOrdersByDateRangeResponse->orders;
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
