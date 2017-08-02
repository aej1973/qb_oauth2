<?php

require_once('oauth_connection.php');
use QuickBooksOnline\API\Facades\Customer;

$newCustomer = Customer::create([

        "Taxable"=> false,
        "BillAddr"=> [
            "Id"=> "100",
            "Line1"=> "9116 Choctaw Dr.",
            "City"=> "Dallas",
            "CountrySubDivisionCode"=> "TX",
            "PostalCode"=> "70010",
            "Lat"=> "37.4307072",
            "Long"=> "-122.4295234"
        ],
        "Job"=> false,
        "BillWithParent"=> false,
        "Balance"=> 90,
        "BalanceWithJobs"=> 90,
        "PreferredDeliveryMethod"=> "Print",
        "domain"=> "QBO",
        "sparse"=> false,
        "Id"=> "2",
        "SyncToken"=> "1",
        "MetaData"=> [
            "CreateTime"=> "2017-08-01T16=>49=>28-07=>00",
            "LastUpdatedTime"=> "2017-08-01T12=>56=>01-07=>00"
        ],
        "GivenName"=> "Arun E",
        "FamilyName"=> "Jayaprakash",
        "FullyQualifiedName"=> "nathanresearch2",
        "CompanyName"=> "Natahn Research 2, Inc",
        "DisplayName"=> "Nathan Research 2, Inc",
        "PrintOnCheckName"=> "Nathan Research2",
        "Active"=> true,
        "PrimaryPhone"=> [
            "FreeFormNumber"=> "(214) 100-1000"
        ],
        "PrimaryEmailAddr"=> [
            "Address"=> "arunej@nathanr.com"
        ]

]);

       $resultingCustomerObj = $dataService->Add($newCustomer);
        $error = $dataService->getLastError();
		if ($error != null) {
    		echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    		echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    		echo "The Response message is: " . $error->getResponseBody() . "\n";
} else echo "Customer information has been added";

?>

