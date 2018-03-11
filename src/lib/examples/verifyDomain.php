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
 * Generating the operation verifyDomain object.
 */

$op = $service->operationVerifyDomain();

/*
 * Setting parameters of the operation.
 */

$op->setCode('abcd');

/*
 * Calling the operation.
 */

if ($op->call())
    print $op->getExpireDate();
else
    die("error");
