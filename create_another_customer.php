<?php

require_once('oauth_connection.php');
require_once('../qb_crud/includes/index.php');
use QuickBooksOnline\API\Facades\Customer;

$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);
$email = trim($_POST['email']);
$address = trim($_POST['address']);
$city =trim($_POST['city']);
$state = trim($_POST['state']);
$zip = trim($_POST['zip']);
$newCustomer = Customer::create([

 "BillAddr"=> [
        "Line1"=> $address,
        "City"=> $city,
        "Country"=> "USA",
        "CountrySubDivisionCode"=> $state,
        "PostalCode"=> $zip
    ],
    "ShipAddr" => [
          "Id" => "109",
          "Line1" => "4581 Finch St.",
          "City" => "Bayshore",
          "CountrySubDivisionCode" => "CA",
          "PostalCode" => "94326",
          "Lat" => "INVALID",
          "Long" => "INVALID"
      ],
    "Notes"=> "These are some notes created using the API.",
    "Title"=> "Mr",
    "GivenName"=> $first_name,
    "MiddleName"=> "",
    "FamilyName"=> $last_name,
    "Suffix"=> "Jr",
    "FullyQualifiedName"=> $first_name."-".$last_name,
    "CompanyName"=> "",
    "DisplayName"=> $first_name."_".$last_name,
    "PrimaryPhone"=> [
        "FreeFormNumber"=> '100-100-1000'
    ],
    "PrimaryEmailAddr"=> [
        "Address"=> $email
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

