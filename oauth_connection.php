<?php
require "vendor/autoload.php";
require('db_connection.php');
use QuickBooksOnline\API\DataService\DataService;
//session_start();
$realm_id = '123145866267059';
//$realm_id = $_SESSION['realm_id'];
//echo "the realm ID is..".$realm_id;
$stmt = $dbh->prepare("SELECT * FROM oauth_token WHERE realm_id=?");
$stmt->execute(array($realm_id));
$rows = $stmt->fetch();;
//var_dump($rows);
$access_token = trim($rows['access_token']);
$refresh_token = trim($rows['refresh_token']);
//echo "access token is...".$access_token;
$dataService = DataService::Configure(array(
         'auth_mode' => 'oauth2',
         'ClientID' => "Q01JejXpcq8vSPdO8YAuTRWI9uiR0wi042us9o0eL2dZfRBBEP",
         'ClientSecret' => "gHqe3WWRRAVKx2h2IJGw8Lck0XWpvUFHpRNQo2Hv",
         'accessTokenKey' =>$access_token, 
         'refreshTokenKey' =>$refresh_token,
         'QBORealmID' => $realm_id,
         'baseUrl' => "https://sandbox-quickbooks.api.intuit.com"
));

$dataService->setLogLocation("/var/www/html/qb-oauth2/qbtest_logs");
$error = $dataService->getLastError();
if ($error != null) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
    echo "The Intuit Helper message is: IntuitErrorType:{" . $error->getIntuitErrorType() . "} IntuitErrorCode:{" . $error->getIntuitErrorCode() . "} IntuitErrorMessage:{" . $error->getIntuitErrorMessage() . "} IntuitErrorDetail:{" . $error->getIntuitErrorDetail() . "}";
}  
//else echo 'Successfully Authorized using Oauth2'.'<br />';
