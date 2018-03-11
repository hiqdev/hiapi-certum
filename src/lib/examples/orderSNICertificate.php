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
 * Generating the operation orderSNICertificate object.
 */

$op = $service->operationOrderSNICertificate();

/*
 * Setting parameters of the operation.
 * Not all parameters are required.
 */

$csr = file_get_contents('/tmp/sample.csr');

$op->setCSR($csr)->setLanguage('en')->setHashAlgorithm('SHA1');
$op->setRequestorInfo('First Name', 'Last Name', 'email@example.org', '11223344',
        'EN', 'SE9 1AA', 'London', '123 Some Street');
$op->setOrganizationInfo('An organization name', '11111111', '+486666333777');
$op->addSerialNumber('1000');
/* or */
$op->addSerialNumber(array('2000', '3000'));

/*
 * Calling the operation.
 * Accessing the data returned in a response.
 */

if ($op->call()) {
	print $op->getOrderID();
	$invalidSerialNumbers = $op->getInvalidSerialNumbers();
	foreach ($invalidSerialNumbers as $number)
		print $number;
}
else
	die("error");
