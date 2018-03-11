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
 * Generating the operation getDomainVerification object.
 */

$op = $service->operationGetDomainVerification();

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
    $domains = $op->getDomains();
else
    die("error");

/*
 * Accessing the data returned in the response.
 */

foreach ($domains as $domain) {
    print $domain->domainName;
    print $domain->verificationLevel;
    print $domain->verificationExpiryDate;
    $dvs = $domain->domainVerifications->domainVerification;
    if (is_array($dvs)) {
        foreach ($dvs as $dv) {
            print $dv->email;
            print $dv->sendDate;
            print $dv->verificationLinkValidityDate;
            print $dv->verificationMethod;
            print $dv->verificationDate;
            print $dv->verificationValidity;
            print $dv->verified === TRUE ? 'Y' : 'N';
        }
    } else {
        print $dvs->email;
        print $dvs->sendDate;
        print $dvs->verificationLinkValidityDate;
        print $dvs->verificationMethod;
        print $dvs->verificationDate;
        print $dvs->verificationValidity;
        print $dvs->verified === TRUE ? 'Y' : 'N';
    }
}
