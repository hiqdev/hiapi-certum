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
 * Generating the operation sendNotifications object.
 */

$op = $service->operationSendNotifications();

/*
 * Setting an order ID.
 */

$op->setOrderID('1234');

/*
 * Setting optional parameter setVerificationNotificationEnabled.
 */

$op->setVerificationNotificationEnabled(true);

/*
 * Calling the operation.
 */

if ($op->call())
    $verifications = $op->getVerifications();
else
    die("error");

/*
 * Accessing the data returned in the response.
 */

foreach ($verifications as $verification) {
    print $verification->fQDN;
    print $verification->code;
    print $verification->approveMethod;
}
