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
 * Generating the operation reissueCertificate object.
 */

$op = $service->operationReissueCertificate();

/*
 * Setting parameters of the operation.
 * Not all parameters are required.
 * However, a serial number or a certificate has to be set.
 */

$csr = file_get_contents('/tmp/sample.csr');
$pem = file_get_contents('/tmp/sample.pem');

$op->setSerialNumber("1234")->setX509Cert($pem)->setHashAlgorithm("SHA1")->setCSR($csr);

/*
 * Calling the operation.
 * An order ID is returned in the response.
 */

if ($op->call())
    $id = $op->getOrderID();
else
    die("error");
