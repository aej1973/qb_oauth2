<?php

require_once('oauth_connection.php');
//require_once('../qb_crud/includes/index.php');
use QuickBooksOnline\API\Facades\Invoice;
$newInvoice = Invoice::create([

        "Deposit"=> 0,
        "domain"=> "QBO",
        "sparse"=> false,
        "Id"=> "130",
        "SyncToken"=> "1",
        "MetaData"=> [
            "CreateTime"=> "2017-09-19T13=>16=>17-07=>00",
            "LastUpdatedTime"=> "2017-09-19T13=>16=>17-07=>00"
        ],
        "CustomField"=> [[
            "DefinitionId"=> "1",
            "Name"=> "Crew #",
            "Type"=> "StringType",
            "StringValue"=> "102"
        ]],
        "DocNumber"=> "1037",
        "TxnDate"=> "2017-09-19",
        "LinkedTxn"=> [[
            "TxnId"=> "100",
            "TxnType"=> "Estimate"
        ]],
        "Line"=> [[
            "Id"=> "1",
            "LineNum"=> 1,
            "Description"=> "Rock Fountain",
            "Amount"=> 275.0,
            "DetailType"=> "SalesItemLineDetail",
            "SalesItemLineDetail"=> [
                "ItemRef"=> [
                    "value"=> "5",
                    "name"=> "Rock Fountain"
                ],
                "UnitPrice"=> 275,
                "Qty"=> 1,
                "TaxCodeRef"=> [
                    "value"=> "TAX"
                ]
            ]
        ], [
            "Id"=> "2",
            "LineNum"=> 2,
            "Description"=> "Fountain Pump",
            "Amount"=> 12.75,
            "DetailType"=> "SalesItemLineDetail",
            "SalesItemLineDetail"=> [
                "ItemRef"=> [
                    "value"=> "11",
                    "name"=> "Pump"
                ],
                "UnitPrice"=> 12.75,
                "Qty"=> 1,
                "TaxCodeRef"=> [
                    "value"=> "TAX"
                ]
            ]
        ], [
            "Id"=> "3",
            "LineNum"=> 3,
            "Description"=> "Concrete for fountain installation",
            "Amount"=> 47.5,
            "DetailType"=> "SalesItemLineDetail",
            "SalesItemLineDetail"=> [
                "ItemRef"=> [
                    "value"=> "3",
                    "name"=> "Concrete"
                ],
                "UnitPrice"=> 9.5,
                "Qty"=> 5,
                "TaxCodeRef"=> [
                    "value"=> "TAX"
                ]
            ]
        ], [
            "Amount"=> 335.25,
            "DetailType"=> "SubTotalLineDetail",
            "SubTotalLineDetail"=> []
        ]],
        "TxnTaxDetail"=> [
            "TxnTaxCodeRef"=> [
                "value"=> "2"
            ],
            "TotalTax"=> 26.82,
            "TaxLine"=> [[
                "Amount"=> 26.82,
                "DetailType"=> "TaxLineDetail",
                "TaxLineDetail"=> [
                    "TaxRateRef"=> [
                        "value"=> "3"
                    ],
                    "PercentBased"=> true,
                    "TaxPercent"=> 8,
                    "NetAmountTaxable"=> 335.25
                ]
            ]]
        ],
        "CustomerRef"=> [
            "value"=> "66",
            "name"=> "hello_there"
        ],
        "CustomerMemo"=> [
            "value"=> "Thank you for your business and have a great day!"
        ],        
        "SalesTermRef"=> [
            "value"=> "3"
        ],
        "DueDate"=> "2018-10-19",
        "TotalAmt"=> 362.07,
        "ApplyTaxAfterDiscount"=> false,
        "PrintStatus"=> "NeedToPrint",
        "EmailStatus"=> "NotSet",
        "BillEmail"=> [
            "Address"=> "Familiystore@intuit.com"
        ],
        "Balance"=> 362.07

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
