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
 * Generating the operation getStatement object.
 */

$op = $service->operationGetStatement();

/*
 * This operation requires a language code as input data.
 */

$op->setLanguage('pl');

/*
 * Calling the operation.
 * If successful, a statement is returned in the response.
 */

if ($op->call())
    $statement = $op->getStatement();
else
    die("error");
