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
 * Generating the operation renewCertificate object.
 */

$op = $service->operationRenewCertificate();

/*
 * Setting parameters of the operation.
 */

$csr = file_get_contents('/tmp/sample.csr');

$op->setCSR($csr)->setCustomer('Customer name')->setProductCode('606');
// The requirement is to pass either a serial number
$op->setSerialNumber('00:11:22:33:44:55:66:77:88:99:aa:bb:cc:dd:ee:ff');
// or a certificate to be renewed
$op->setX509Cert($x509cert);
// optionally a validity period can be defined
$op->setValidityPeriod('2013-01-01', '2014-01-01');
// optionally a hash algorithm
$op->setHashAlgorithm('SHA1')->setEmail('abc@example.com');
// optionally verification methods can be passed
$op->addApprover('domain1.example.com', 'webmaster@domain1.example.com')
   ->addApprover('example.com', 'webmaster@example.com')
   ->setVerificationNotificationEnabled(TRUE);

/*
 * Calling the operation.
 * An order ID is returned in the response.
 */

if ($op->call())
    $id = $op->getOrderID();
else
    die("error");

/*
 * Verification codes for domains can also be returned in the response.
*/

if ($op->call()) {
	$id = $op->getOrderID();
	$verifications = $op->getVerifications();
	foreach ($verifications as $fqdn => $verification) {
		print $verification->fQDN;
		print $verification->code;
		print $verification->approveMethod;
	}
}
else
	die("error");
