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
 * Generating the operation getProductList object.
 */

$op = $service->operationGetProductList();

/*
 * Optionally, requesting hash algorithms.
 */

$op->setHashAlgorithm(true);

/*
 * Calling the operation.
 */

if ($op->call())
    $products = $op->getProducts();
else
    die("error");

/*
 * Accessing the data returned in the response.
 */

foreach ($products as $product) {
    print $product->code;
    print $product->type;
    print $product->validityPeriod;
    if ($product->defaultHashAlgorithm)
        print $product->defaultHashAlgorithm;
    if ($product->supportedHashAlgorithms)
        foreach ($product->supportedHashAlgorithms as $hashAlgorithm) {
            print $hashAlgorithm;
        }
}
