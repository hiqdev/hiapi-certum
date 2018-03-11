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
 * Generating the operation getConfiguration object.
 */

$op = $service->operationGetConfiguration();

/*
 * This operation has no input parameters.
 */

/*
 * Calling the operation.
 */

if ($op->call())
    $products = $op->getProducts();
else
    die("error");

/*
 * Accessing the data returned in the response.
 */

if ($products)
    foreach ($products as $product) {
        print $product->autoEnrollmentEnabled === TRUE ? 'Y' : 'N';
        print $product->certificateNotificationEnabled === TRUE ? 'Y' : 'N';
        print $product->verificationNotificationEnabled === TRUE ? 'Y' : 'N';
        print $product->code;
    }
