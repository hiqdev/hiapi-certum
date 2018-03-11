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
require_once 'certumPartnerAPI/types/typeDocumentTypeEnum.php';
$service = new PartnerAPIService('userName', 'password');

/*
 * Generating the operation verifyOrder object.
 */

$op = $service->operationVerifyOrder();

/*
 * Setting parameters of the operation.
 */

$op->setOrderID('1234')->setNote('Note');

/*
 * Optionally, adding a document.
 */

$op->addDocument(PartnerAPITypeDocumentTypeEnum::PASSPORT, "Passport",
        array('fileName' => 'fileContents'));

/*
 * Calling the operation.
 */

if ($op->call()) {
    $docs = $op->getDocuments();
    foreach ($docs as $id)
        echo "id: $id";
}
else
    die("error");
