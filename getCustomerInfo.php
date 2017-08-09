<?php

require_once('oauth_connection.php');
$CustomerInfo = $dataService->Query("SELECT * FROM Customer WHERE GivenName = 'Customer'");
//$xml=simplexml_load_string($CompanyInfo) or die("Error: Cannot create object");
//print_r($xml);
var_dump($CustomerInfo);
$error = $dataService->getLastError();
if ($error != null) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
    echo "The Intuit Helper message is: IntuitErrorType:{" . $error->getIntuitErrorType() . "} IntuitErrorCode:{" . $error->getIntuitErrorCode() . "} IntuitErrorMessage:{" . $error->getIntuitErrorMessage() . "} IntuitErrorDetail:{" . $error->getIntuitErrorDetail() . "}";
} 
