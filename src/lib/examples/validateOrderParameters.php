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
 * Generating the operation validateOrderParameters object.
 */

$op = $service->operationValidateOrderParameters();

/*
 * Setting parameters of the operation.
 * Some parameters are not required.
 * In particular, setting SANEntry and Approver parameters is dependent
 * on the type of the product being ordered.
 */

$csr = file_get_contents('/tmp/sample.csr');

$op->setCSR($csr)->setCustomer('A customer name')->setOrderID('12345')
   ->setProductCode('721')->setUserAgent('User agent')->setHashAlgorithm('SHA1')->setEmail('abc@example.com');
$op->setRequestorInfo('First Name', 'Last Name', 'email@example.org', '11223344',
        'EN', 'SE9 1AA', 'London', '123 Some Street');
$op->setLanguage('en')->setValidityPeriod('2013-01-01', '2014-01-01')
   ->setOrganizationInfo('An organization name', '11111111');
$op->addApprover('domain1.example.com', 'webmaster@domain1.example.com')
   ->addApprover('example.com', 'webmaster@example.com');
$op->addSANEntry('domain1.example.com');

if ($op->call())
    $p = $op->getParsedCSR();
else
    die("error");

/*
 * Now you can access all the fields of parsed CSR.
 * They are either a string or null.
 */

print $p->commonName;
print $p->country;
print $p->email;
print $p->joILN;
print $p->joISoCN;
print $p->joISoPN;
print $p->locality;
print $p->organization;
print $p->organizationalUnit;
print $p->postalCode;
print $p->serialNumber;
print $p->state;
print $p->street;
