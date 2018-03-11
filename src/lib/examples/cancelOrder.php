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
 * Generating the operation cancelOrder object.
 */

$op = $service->operationCancelOrder();

/*
 * Setting parameters of the operation.
 */

$op->setOrderID('1234')->setNote('Note');

/*
 * Calling the operation.
 */

if ($op->call())
    print "OK";
else
    die("error");
