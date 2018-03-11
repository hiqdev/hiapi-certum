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
 * Generating the operation getCertificate object.
 */

$op = $service->operationGetCertificate();

/*
 * Setting an order ID.
 */

$op->setOrderID('1234');

/*
 * Calling the operation.
 */

if ($op->call()) {
    $cert = $op->getCertificateDetails();
    $cabundle = $op->getCaBundle();
}
else
    die("error");

/*
 * Accessing the data returned in the response.
 */

if ($cert) {
    print $cert->DNSNames;
    print $cert->X509Cert;
    print $cert->certificateStatus;
    print $cert->commonName;
    print $cert->endDate;
    print $cert->revokedDate;
    print $cert->serialNumber;
    print $cert->startDate;
    print $cert->subjectName;
}

if ($cabundle) {
    $x509cert = $cabundle->X509Cert;
    if (is_array($x509cert)) {
        foreach ($x509cert as $x)
            print $x;
    } else
        print $x509cert;
}
