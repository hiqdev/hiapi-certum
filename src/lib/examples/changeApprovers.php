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
 * Generating the operation changeApprovers object.
 */

$op = $service->operationChangeApprovers();

/*
 * Setting parameters of the operation.
 */

$op->setOrderID('1234')->setApprover('example.com', 'admin@example.com');

/*
 * Setting optional parameter setVerificationNotificationEnabled.
 */

$op->setVerificationNotificationEnabled(true);

/*
 * Calling the operation.
 */

if ($op->call()) {
    $verification = $op->getVerification();
    if ($verification) {
        print $verification->fQDN;
        print $verification->code;
        print $verification->approveMethod;
    }
}
else
    die("error");
