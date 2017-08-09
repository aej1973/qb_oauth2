<?php
require_once('db_connection.php');
require_once('../qb_crud/includes/index.php');
session_start();
$_SESSION["realm_id"] = "123145866267059";
$access_token = trim($_POST['access_token']);
$refresh_token = trim($_POST['refresh_token']);
$realm_id = $_SESSION['realm_id']; 
 
  if(!isset($realm_id))
   {
	echo 'Please set the company id';
        } else {

         $stmt = $dbh->query('SELECT * FROM oauth_token');
         $row_count = $stmt->rowCount();
             if( !$row_count > 0){
              echo "Looks like the realm_id is not set";
              $stm = $dbh->prepare("INSERT INTO oauth_token(`realm_id`,'access_token', 'refresh_token') VALUES(?, ?, ?)");
              $stm->execute(array($realm_id, $access_token, $refresh_token));
                  } else {
                        echo '<div class="container" style="padding-top:30px;">
                                <h6>The Oauth tokens have been updated. You are now connected to Quickbooks Online.</h6>
                              </div>';
			$stmt = $dbh->prepare("UPDATE `oauth_token` SET access_token=? ,  refresh_token=? WHERE realm_id=?");
			$stmt->execute(array($access_token, $refresh_token,$realm_id ));
               }

}
