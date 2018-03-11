<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

require_once 'operation.php';
require_once 'certumPartnerAPI/messages/messageGetModifiedOrders.php';
require_once 'certumPartnerAPI/messages/messageGetModifiedOrdersResponse.php';

/*
<operation name="getModifiedOrders" parameterOrder="getModifiedOrders">
	<input message="tns:PartnerServicePortType_getModifiedOrders">
	</input>
	<output message="tns:PartnerServicePortType_getModifiedOrdersResponse">
	</output>
</operation>
*/

/**
 * This class represents the getModifiedOrders WSDL operation.
 *
 * It is based on the PartnerAPIOperation class and derives some properties and methods from that class.
 *
 * @method PartnerAPIMessageGetModifiedOrdersResponse getResponseMessage() A complete response from a service
 * 
 * @package operations
 */
class PartnerAPIOperationGetModifiedOrders extends PartnerAPIOperation {

    /**
     * @var PartnerAPIMessageGetModifiedOrders
     */
    protected $_input = NULL;
    
    /**
     * @var PartnerAPIMessageGetModifiedOrdersResponse
     */
    protected $_output = NULL;

    /**
     * @var string
     */
    protected $_operation = 'getModifiedOrders';
    
    /**
     * The constructor.
     * 
     * It initializes input and output data.
     */
    public function __construct() {
        $this->_input  = new PartnerAPIMessageGetModifiedOrders();
        $this->_output = new PartnerAPIMessageGetModifiedOrdersResponse();
    }
    
    /**
     * Sets the request's date range.
     * 
     * Setting this values is required.
     * 
     * @param string $fromDate
     * @param string $toDate
     * @return PartnerAPIOperationGetModifiedOrders
     */
    public function setDateRange($fromDate, $toDate) {
        $this->_input->getModifiedOrders->setFromDate($fromDate)->setToDate($toDate);
        return $this;
    }

    /**
     * Sets the 'certificateDetails' option for a request.
     * 
     * Setting this value is optional.
     * 
     * @param bool $value
     * @return PartnerAPIOperationGetModifiedOrders
     */
    public function setCertificateDetails($value = FALSE) {
        $o = $this->_input->getModifiedOrders->orderOption;
        if (is_null($o)) {
            $o = new PartnerAPITypeOrderOption ();
            $this->_input->getModifiedOrders->setOrderOption($o);
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
     * @return PartnerAPIOperationGetModifiedOrders
     */
    public function setOrderDetails($value = FALSE) {
        $o = $this->_input->getModifiedOrders->orderOption;
        if (is_null($o)) {
            $o = new PartnerAPITypeOrderOption ();
            $this->_input->getModifiedOrders->setOrderOption($o);
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
     * @return PartnerAPIOperationGetModifiedOrders
     */
    public function setOrderStatus($value = FALSE) {
        $o = $this->_input->getModifiedOrders->orderOption;
        if (is_null($o)) {
            $o = new PartnerAPITypeOrderOption ();
            $this->_input->getModifiedOrders->setOrderOption($o);
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
     * @return PartnerAPIOperationGetModifiedOrders
     */
    public function setPageNumber($value = 1) {
        $this->_input->getModifiedOrders->setPageNumber($value);
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
        $orders = $this->_output->getModifiedOrdersResponse->orders;
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
