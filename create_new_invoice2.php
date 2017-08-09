<?php

require_once('oauth_connection.php');
//require_once('../qb_crud/includes/index.php');
use QuickBooksOnline\API\Facades\Invoice;
$newInvoice = Invoice::create([

 "Line"=> [
    [
      "Amount"=> 100.00,
      "Description"=> "This was ramp product for RDR",
      "DetailType"=> "SalesItemLineDetail",
      "SalesItemLineDetail"=> [
        "ItemRef"=> [
          "value"=> "1",
          "name"=> "Services"
        ]
      ]
    ]
  ],
  "CustomerRef"=> [
    "value"=> "67"
  ],
 "CustomerMemo"=> [
            "value"=> "This is RDR customer for order #BRO1234"
    ]
]);
$resultingInvoiceObj = $dataService->Add($newInvoice);

$error = $dataService->getLastError();
if ($error != null) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
    echo "The Intuit Helper message is: IntuitErrorType:{" . $error->getIntuitErrorType() . "} IntuitErrorCode:{" . $error->getIntuitErrorCode() . "} IntuitErrorMessage:{" . $error->getIntuitErrorMessage() . "} IntuitErrorDetail:{" . $error->getIntuitErrorDetail() . "}";
}  
else echo "Successfully created and invoice";

?>
