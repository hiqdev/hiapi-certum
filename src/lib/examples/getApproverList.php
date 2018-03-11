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
 * Generating the operation getApproverList object.
 */

$op = $service->operationGetApproverList();

/*
 * Setting parameters of the operation.
 */

$op->addFQDN('domain1.example.com')->addFQDN('domain2.example.com');

/*
 * Calling the operation.
 */

if ($op->call())
    $approvers = $op->getApprovers();
else
    die("error");

/*
 * Accessing the data returned in the response.
 */

foreach ($approvers as $approver) {
    print $approver->FQDN;
    print $approver->approveMethod;
    print $approver->approverEmail;
    print $approver->mainDomain ? 'Yes' : 'No';
}
