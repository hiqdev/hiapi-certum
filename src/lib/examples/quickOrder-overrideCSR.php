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
 * Important:
 * Before calling the quickOrder operation you should call
 * the validateOrderParameters operation to verify the parameters
 * of a request.
 * See the example file: validateOrderParameters.php.
 * You should also call the getApproverList operation to download
 * available methods to approve a domain.
 * See the example file: getApproverList.php.
 * Details of each operation's order and requirements are contained in
 * the PDF documentation for the web service.
 */

/*
 * Generating the operation quickOrder object.
 */

$op = $service->operationQuickOrder();

/*
 * Setting parameters of the operation.
 * Not all parameters are required.
 * In particular, setting SANEntry and Approver parameters is dependent
 * on the type of the product being ordered.
 */

$csr = file_get_contents('/tmp/sample.csr');

$op->setCSR($csr)->setCustomer('A customer name')->setOrderID('12345')
   ->setProductCode('721')->setUserAgent('User agent')->setHashAlgorithm('SHA1')->setEmail('abc@example.com');
$op->setRequestorInfo('First Name', 'Last Name', 'email@example.org', '11223344',
        'EN', 'SE9 1AA', 'London', '123 Some Street');
$op->setLanguage('en')->setValidityPeriod('2013-01-01', '2014-01-01')
   ->setOrganizationInfo('An organization name', '11111111', '+486666333777');
   
/*
 * When overriding CSR fields SANEntry has to be changed for new domain
 * as same as Approvers email and domain of admin.
 */
 
$op->addSANEntry('domain-overrided.com');

$op->addApprover('domain-overrided.com', 'webmaster@domain-overrided.com')
   ->setVerificationNotificationEnabled(TRUE);

 
$op->setCommonName('domain-overrided.com');
$op->setOrganization('overrided Organization');
$op->setOrganizationalUnit('overrided Organizational Unit');
$op->setLocality('overrided Locality');

/* New country code ISO 3166-1 alpha-2 */
$op->setCountry('GB');

$op->setState('overrided state');

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

/*
 * Note:
 * Before the quickOrder operation you should call the validateOrderParameters
 * operation. Both operations use the same set of parameters.
 * Therefore, an object of the validateOrderParameters operation
 * has the prepareQuickOrderOperation() method which returns an object of
 * quickOrder operation with all the parameters already prepared.
 * Of course, there is no point to call this method if
 * the validateOrderParameters operation failed.
 */

$op = $service->operationValidateOrderParameters();
// setting parameters and calling the operation
$op2 = $op->prepareQuickOrderOperation();
// if verification e-mails are to be sent, the VerificationNotificationEnabled
// option have to be enabled separately because the operation
// ValidateOrderParameters does not have this option
$op2->setVerificationNotificationEnabled(TRUE);
if ($op2->call())
    $id = $op2->getOrderID();
else
    die("error");
