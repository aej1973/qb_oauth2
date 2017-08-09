<?php
$hostname='localhost';
$username='root';
$password='nrdallas1@1#';
$database= 'quickbooks_oauth';
try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$database",$username,$password);

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
//     echo 'Connected to Database<br/>';
      }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
?> 
