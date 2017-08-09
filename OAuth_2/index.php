<html>
<?php
include_once('../../qb_crud/includes/index.php');
$configs = include('./config.php');
$redirect_uri = $configs['oauth_redirect_uri'];
$openID_redirect_uri = $configs['openID_redirect_uri'];
$refreshTokenPage = $configs['refreshTokenPage'];
 ?>
 <script
      type="text/javascript"
      src="https://appcenter.intuit.com/Content/IA/intuit.ipp.anywhere-1.3.3.js">
 </script>

 <script type="text/javascript">
     var redirectUrl = "<?=$redirect_uri?>"
     intuit.ipp.anywhere.setup({
             grantUrl:  redirectUrl,
             datasources: {
                  quickbooks : true,
                  payments : true
            },
             paymentOptions:{
                   intuitReferred : true
            }
     });
 </script>


<title>My Connect Page</title>


<?php
  session_start();
  if(isset($_SESSION['access_token']) && !empty($_SESSION['access_token'])){
//    echo "<h3>Retrieve OAuth 2 Tokens from Sessions:</h3>";
/*    $tokens = array(
       'access_token' => $_SESSION['access_token'],
       'refresh_token' => $_SESSION['refresh_token']
    );
    var_dump($tokens);
*/
    
/*    echo "Token Value:";
    echo "<br />";
    echo "<textarea rows='10' cols='150'>". $_SESSION['access_token'] . "</textarea>";
    echo '<br />';
    echo "<b>the referesh token is:</b> ".$_SESSION['refresh_token'];
 */
 echo
'<div class="container" style="padding-top:30px;">
<form method="post" action="../insert_token.php">
<div class="col-md-10  col-sm-10  col-xs-10">
 <h3 class="text-center">ACCESS TOKEN INFORMATION</h3>
 <hr>
<div class="row">
        <div class="col-xs-10 col-sm-10 col-md-10" >
           <div class="form-group">
                <label for="exampleTextarea">Access Token</label>
                 <textarea class="form-control" name= "access_token" id=“access_token”  rows="15">'.$_SESSION['access_token']  .'</textarea>
         </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                 <label for="exampleTextarea">Refresh Token</label>
                 <textarea class="form-control" name= "refresh_token"  id=“refresh_token” rows="5">'.$_SESSION['refresh_token'].'</textarea>
          </div>
        </div>
      <div class="col-md-4  col-sm-4  col-xs-8 " style="background:#fff;padding-top:30px">
       <button class="btn btn-primary pull-right"> Submit</button>
    </div>
       <div class="col-md-4  col-sm-4  col-xs-8 " style="background:#fff;">
        <a href="' .$refreshTokenPage .'">Refresh Token </a> | <a href="' .$refreshTokenPage .'?deleteSession=true"> Clear Session </a>
      </div>
  </div>
 </div>
</form>
</div>';
    
    /******------------------------------------------------------ 
    echo "<br /> <a href='" .$refreshTokenPage . "'>
          Refresh Token
    </a> <br />";
    echo "<br /> <a href='" .$refreshTokenPage . "?deleteSession=true'>
          Clean Session
    </a> <br />";
   *******************/
  }else{
    echo '<div class="col-md-10  col-sm-10  col-xs-10 " style="background:#ffffff;padding-top:30px">';
    echo '<div class="container">';
    echo "<h6>Your session has expired, please click the link below to obtain a new OAuth2 token.</h6>";
/*    echo '<div> Add the OAuth 2 Consumer Key and OAuth 2 Consumer Secret of your application to config.php file to enable OAuth2 flow.</div> </br>
          <div> Add the oauth_redirect_uri to config.php file. This URL is used by Intuit to redirect the user to your page when user authorized your app. </div> </br>
          <div> Click on the button below to start "Connect to QuickBooks"</div>';
*/
    echo "<br /> <ipp:connectToIntuit></ipp:connectToIntuit><br />";
    echo '</div>';
    echo '</div>';
  }

/*    echo "<h3>Please Complete the \"Sign In With Intuit\" flow:</h3>";
    echo '<div> Add the OAuth 2 Consumer Key and OAuth 2 Consumer Secret of your application to config.php file to enable OpenID flow.</div> </br>
          <div> Add the openID_redirect_uri to config.php file. This URL is used by Intuit to redirect the user to your page when the user agreed for your app retrieving their personal information. </div> </br>
          <div> Click on the button below to start "Sign in with Intuit"</div>';
    //$loginStringGeneration = "<ipp:login href=\"" .$openID_redirect_uri . "\" type=\"horizontal\" ></ipp:login>";
    echo "<br /> <ipp:login href=\"" .$openID_redirect_uri . "\" type=\"horizontal\" ></ipp:login> <br />";
*/
  //}

?>


