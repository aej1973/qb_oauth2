<?php
require "vendor/autoload.php";
use QuickBooksOnline\API\DataService\DataService;

$dataService = DataService::Configure(array(
         'auth_mode' => 'oauth2',
         'ClientID' => "Q01JejXpcq8vSPdO8YAuTRWI9uiR0wi042us9o0eL2dZfRBBEP",
         'ClientSecret' => "gHqe3WWRRAVKx2h2IJGw8Lck0XWpvUFHpRNQo2Hv",
          'accessTokenKey' => 'eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..z2k3S1D0vL5qRxfg1gtdaQ.86zOleuW8COYYlVYvdE7qs_JWCPyxJSNeBqNSBGUD-LKki_yo2ea9aUc-iQRPeiMVyRLkiKDPhsaDD0KV4jVkMamaRta02pdw872iNZR2GEbhWPJnX2pUxzQjq0lFu-uGjlyabNVqD2hpQQxeEM03-Wi1AnpZWJ1lRrDD8_J47pLUifeSYAwhOQtfcZNtHDxg3qou-GM-zVIuA1EU2yjgJcp4V3XuV-ZCLETOI2k72_CHfPcurmzamtks91SEVCh-YoTQti_TYBp01p6747BfJUoTMWqU3rh7SaKHKNX8-2_P672pEg7fPqK-Eadaw1EwE7p_gAynsQ3P-7VgS03ZyZFru3uXASGlOOrfLMYQ4d4Rwjf8tO5UWxWyczBVfkzULbHzh0c9Zl6cas750ORUHXT0wi3emCtkUp7v2keK6TSkmekPOyDjeJlC_DLRqfOMGrpxPrbleEOFSo_rVweDXdAvRmTvjsdRietdqFNZ-dr_Z6zxUfG9bXriKdTSNUk1ZRjHq2ShINL401NMCp2iRxIvveIoBvvZ313HpjXAtsSzss1YKkD8OiceCOYfqHX9FD7HYDkEJATrBCjg2EzU5Ld8Fwp_pAKtKZqfyEc8uAD5b-78A88ep4OAXah6ei8dkf85q6VY36SPgQEG5Olb6NrISbclbUfJXYC8HarBuej8r93VWXmGPucrz8EgfAH._YXGR7V5rZOlh5HB8zjVtA',
       'refreshTokenKey' => "Q011510365077x1nHxxNL4EW7zI4Fe8aZoBO4Zv0Pn7sjFI4Bl",
      'QBORealmID' => "123145866267059",
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
        else echo "Successfully Authorized using Oauth2";

?>
