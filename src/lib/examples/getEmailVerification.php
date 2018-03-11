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
 * Generating the operation getEmailVerification object.
 */

$op = $service->operationGetEmailVerification();

/*
 * Setting an order ID.
 */

$op->setOrderID('1234');

/*
 * Optionally.
*/
$op->setShowArchived(true);

/*
 * Calling the operation.
 */

if ($op->call())
    $verifications = $op->getEmailVerification();
else
    die("error");

/*
 * Accessing the data returned in the response.
 */

print $verifications->email;
print $verifications->verified == TRUE ? "Y" : "N";
print $verifications->verificationLinkValidityDate;
if ($verifications->verificationDate)
    print $verifications->verificationDate;
if ($verifications->verificationValidity)
    print $verifications->verificationValidity;
if ($verifications->sendDate)
    print $verifications->sendDate;
