<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

/*
 * Creating a service object. See start.php file.
 */

require_once 'certumPartnerAPI/service.php';
$service = new PartnerAPIService('userName', 'password');

/*
 * Generating the operation getModifiedOrders object.
 */

$op = $service->operationGetModifiedOrders();

/*
 * Setting parameters of the operation.
 * Only dateRange is required.
 */

$op->setDateRange('2013-03-01', '2013-05-01')
   ->setOrderStatus(TRUE)->setCertificateDetails(TRUE)->setOrderDetails(TRUE)
   ->setPageNumber(1);

/*
 * Calling the operation.
 */

if ($op->call())
    $orders = $op->getOrders();
else
    die("error");

/*
 * Accessing the data returned in the response.
 * Please notice that not all fields are available in the response
 * and their availability depends on the options selected for the request.
 */

foreach ($orders as $order) {
    if ($order->orderStatus) {
        print $order->orderStatus->customer;
        print $order->orderStatus->orderDate;
        print $order->orderStatus->orderID;
        print $order->orderStatus->orderStatus;
        print $order->orderStatus->productCode;
        print $order->orderStatus->serialNumber;
    }
    
    if ($order->orderDetails) {
        print $order->orderDetails->organizationInfo->organizationName;
        print $order->orderDetails->organizationInfo->taxIdentificationNumber;
        print $order->orderDetails->organizationInfo->verificationPhoneNumber;
        print $order->orderDetails->requestorInfo->addressLine1;
        print $order->orderDetails->requestorInfo->addressLine2;
        print $order->orderDetails->requestorInfo->city;
        print $order->orderDetails->requestorInfo->country;
        print $order->orderDetails->requestorInfo->email;
        print $order->orderDetails->requestorInfo->firstName;
        print $order->orderDetails->requestorInfo->lastName;
        print $order->orderDetails->requestorInfo->phone;
        print $order->orderDetails->requestorInfo->postalCode;
    }
    
    if ($order->certificateDetails) {
        print $order->certificateDetails->DNSNames;
        print $order->certificateDetails->X509Cert;
        print $order->certificateDetails->certificateStatus;
        print $order->certificateDetails->commonName;
        print $order->certificateDetails->endDate;
        print $order->certificateDetails->revokedDate;
        print $order->certificateDetails->serialNumber;
        print $order->certificateDetails->startDate;
        print $order->certificateDetails->subjectName;
    }
}
