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
 * Generating the operation updateDocuments object.
 */

$op = $service->operationUpdateDocuments();

/*
 * Adding files.
 */

$op->addFileForDocument(1, 'file1.txt', file_get_contents("file1.txt"));
$op->addFileForDocument(1, 'file2.txt', "some content of a file");
$op->addFileForDocument(2, 'file3.txt', "some content of a file");

/*
 * Calling the operation.
 */

if ($op->call()) {
    // OK
}
else
    die("error");
