<?php
require "vendor/autoload.php";
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Facades\Invoice;
use QuickBooksOnline\API\Facades\Customer;
$dataService = DataService::Configure(array(
         'auth_mode' => 'oauth2',
         'ClientID' => "Q01JejXpcq8vSPdO8YAuTRWI9uiR0wi042us9o0eL2dZfRBBEP",
         'ClientSecret' => "gHqe3WWRRAVKx2h2IJGw8Lck0XWpvUFHpRNQo2Hv",
           'accessTokenKey' => 'eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..PoOnEwOrBHUfOHkZWqSi5w.cIAggjVPL8SjZvBmk4L9e2Ddk5R34DW1FFgo_olWyG7BscNBx8wGAY4iVcXIjK_IwKEr-lI_zEFaudEJU_obQ6yNDFpqJtWuS6th8w-9swIMOOPCGTpGRdv9mEOnp7_viVATIXNVP8B1VvNTmqaucw8bMBVsJR3S2L96MSVWrl1ly91vE2Tbd4AuYsK_hftRIBbHcc2H-HaEMwntXU9JVFYX1EsN4oE0gjWGgMSJfgnnM_8cUilamS0NSMlKFouAei7rIhp6st-wGmxXnUwfEfQPmhuDE4IAz3yboXMXT8uJfYlz4eYKANK7i2Duzi2mHM2WRzlaOt8UF9T2nYxsrprmV0o-ioMT6XHaVNp-0_OB5FJWBg3veoX-L3UCYjRLEZdA4Y3ZnPsLKETivYAQJYKoWqQA2majpEY-rw4_1yKjpLrZFSgm1ts5sVwd0fHASHal1qkB0W8kgIZLdeWTeiX49dRNMhi8607dclX4wflXbvJ3qT7rDvAuUwzEHch11rV_zHLFRr1nGgfYhulWG07pM-qPzFdGF0vOszBbEUJYlDHGSgcHJg8oj_6fW3W-qBInZyRFy96-ZuneQViAQiaQVgVxBT7u60AsYPRruFSCB7aSHGHYOpD1zv-0-NfFfyHMgD2Pbt7KPymsyqmU_g2CJ4-bLHQen01DjU7ad4Z0gH9OkZT9XqMuyWPrp5J4.W3aipO_2WuWYnUyEsOYl8Q',         
 'refreshTokenKey' => "Q011510359223jxCWxXMiXNpmqRV0nXzqN7KmoRAI4qunGwehc",         
'QBORealmID' => "123145866267059",
         'baseUrl' => "https://sandbox-quickbooks.api.intuit.com"
));

$dataService->setLogLocation("/var/www/html/qb-oauth2/qbtest_logs");

$CompanyInfo = $dataService->getCompanyInfo();
$error = $dataService->getLastError();
if ($error != null) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
    echo "The Intuit Helper message is: IntuitErrorType:{" . $error->getIntuitErrorType() . "} IntuitErrorCode:{" . $error->getIntuitErrorCode() . "} IntuitErrorMessage:{" . $error->getIntuitErrorMessage() . "} IntuitErrorDetail:{" . $error->getIntuitErrorDetail() . "}";
} 

/*
$myInvoiceObj = Invoice::create([
  "DocNumber" => "316",
  "LinkedTxn" => [],
  "Line" => [[
      "Id" => "1",
      "LineNum" => 1,
      "Amount" => 4116.0,
      "DetailType" => "SalesItemLineDetail",
      "SalesItemLineDetail" => [
          "ItemRef" => [
              "value" => "1",
              "name" => "Services"
          ],
          "TaxCodeRef" => [
              "value" => "NON"
          ]
      ]
  ], [
      "Amount" => 4116.0,
      "DetailType" => "SubTotalLineDetail",
      "SubTotalLineDetail" => []
  ]],
  "CustomerRef" => [
      "value" => "1",
      "name" => "Amy's Bird Sanctuary"
  ]
]);
$resultingInvoiceObj = $dataService->Add($myInvoiceObj);
*/
$newCustomer = Customer::create([

        "Taxable"=> false,
        "BillAddr"=> [
            "Id"=> "3",
            "Line1"=> "4116 Choctaw Dr.",
            "City"=> "Dallas",
            "CountrySubDivisionCode"=> "CA",
            "PostalCode"=> "94213",
            "Lat"=> "37.4307072",
            "Long"=> "-122.4295234"
        ],
        "Job"=> false,
        "BillWithParent"=> false,
        "Balance"=> 85.0,
        "BalanceWithJobs"=> 85.0,
        "PreferredDeliveryMethod"=> "Print",
        "domain"=> "QBO",
        "sparse"=> false,
        "Id"=> "2",
        "SyncToken"=> "0",
        "MetaData"=> [
            "CreateTime"=> "2014-09-11T16=>49=>28-07=>00",
            "LastUpdatedTime"=> "2014-09-18T12=>56=>01-07=>00"
        ],
        "GivenName"=> "Arun",
        "FamilyName"=> "Jayaprakash",
        "FullyQualifiedName"=> "nathanresearch",
        "CompanyName"=> "Natahn Research, Inc",
        "DisplayName"=> "Nathan Research, Inc",
        "PrintOnCheckName"=> "Nathan Research",
        "Active"=> true,
        "PrimaryPhone"=> [
            "FreeFormNumber"=> "(415) 444-6538"
        ],
        "PrimaryEmailAddr"=> [
            "Address"=> "Surf@Intuit.com"
        ]

]);

$resultingCustomerObj = $dataService->Add($newCustomer);

?>
