<?php
/**
 * Partner API Library
 * 
 * @copyright Copyright (c) 2015 Unizeto Technologies SA
 * @license license.txt
 */

/*
 * We recommend you read the entire file.
 */

/*
 * First, you need to include the file containing the service class.
 */

require_once 'certumPartnerAPI/service.php';

/*
 * Creating a service object.
 * 
 * The third and fourth argument is omitted in the constructor.
 * They will be set to their default values​​ which are the address of
 * the testing web service and English language.
 */

$service = new PartnerAPIService('userName', 'password');

/*
 * To use the service located in the production environment, you must specify
 * its address as third argument. You can also specify a language explicitly
 * in the fourth argument.
 * 
 * In other example files the default testing address is used.
 */

$service = new PartnerAPIService('userName', 'password', PartnerAPIService::WSDL_PROD, 'en');

/*
 * Optionally, you can define the file that will be used to record data
 * that can be helpful in analysis of your queries to a service.
 */

$service->setDebugFile('/tmp/debug.txt');

/*
 * Optionally, a service object can be configured to intercept the SoapFault
 * exception and throw them back as PartnerAPIException exception.
 * 
 * Note that in some cases, despite catching the SoapFault exception,
 * PHP interpreter prints an error message to the standard error
 * output (stderr), anyway.
 */

$service->setCatchSoapFault(TRUE);

/*
 * Now the service object is configured and ready to be used.
 * Such an object is used in other example files.
 * 
 * The entire library is written in the way to maintain a fluent interface
 * everywhere which means that some methods return the same object on which
 * the method has been called. How to use methods is up to user preferences.
 * The call() method of each operation returns a boolean value TRUE or FALSE.
 * For each operation some parameters may be mandatory and some optional
 * (see web service documentation in PDF).
 * Operations and methods can be called in this way:
 */

$op = $service->operationXXX();
$op->setYYY('yyy');
$op->setZZZ('zzz');
$res = $op->call();
if ($res) {
    // success
} else {
    // operation error
}
// or
$op->call();
if ($op->isSuccess()) {
    // success
} else {
    // operation erroe
}

/*
 * and also in this way:
 */

if ($service->operationXXX()->setYYY('yyy')->setZZZ('zzz')->call()) {
    // success
} else {
    // operation error
}

/*
 * Library classes may throw the PartnerAPIException exception.
 * 
 * Depending on the configuration discussed above, it the SoapFault exception
 * can also be thrown.
 * Therefore, actions on library objects should be included in the
 * try{} catch{} statement.
 */

try {
    $op = $service->operationXXX();
    $op->setYYY('yyy');
    if ($op->call()) {
        // success
    } else {
        // operation error
    }
} catch (PartnerAPIException $e) {
    // exception handling
}

/*
 * Every operation object has several additional useful methods:
 */

/*
 * getResponseTimeLocal - returns response time converted to a local time:
 */

$op->getResponseTimeLocal();

/*
 * getInputDataAsArray - returns an array with all input data for an operation,
 * the argument set to TRUE means that the array does not contains the elements
 * that have not been set by a user:
 */

$op->getInputDataAsArray();
$op->getInputDataAsArray(true);

/*
 * getOutputDataAsArray - returns an array with all output data from
 * an operation:
 */

$op->getOutputDataAsArray();

/*
 * getResponseMessage - returns an object representing the whole message
 * received in response to a request:
 */

$op->getResponseMessage();

/*
 * getResponseHeader - returns the header included in a response.
 * The header contains fields (which are not always filled) for the number
 * of records and paging, the response time and operation errors:
 */

$header = $op->getResponseHeader();
print $header->currentPage;
print $header->pagesCount;
print $header->returnCount;
print $header->successCode;
print $header->timestamp;

/*
 * Handling errors from the header should look like this.
 * Errors do not always occur so this field will often be set to NULL.
 * Therefore, this is necessary to check it:
 */

if (! is_null($header->errors)) {
    $error = $header->errors->Error;
    if (is_array($error)) {
        foreach ($error as $e) {
            print $e->errorCode;
            print $e->value;
        }
    } else {
        print $error->errorCode;
        print $error->value;
    }
}

/*
 * You can also do it in a simpler way:
 */

$errors = $op->getErrors();
foreach ($errors as $error) {
    print $error->errorCode;
    print $error->value;
}

/*
 * You can get error descriptions, too:
 */

$texts = $op->getErrorTexts();
foreach ($texts as $text) {
    print $text['code'];
    print $text['number'];
    print $text['text'];
}
