<?php
error_reporting(E_ALL); 
ini_set("display_errors", 1);
require_once '../adwords-examples-and-lib-5.9.0/examples/AdWords/Auth/init.php';

//$redirectUri = 'http://demo.neoglobal.se/samples/adwords/web-app/authentication-flow.php?step=access-code';
$redirectUri = 'urn:ietf:wg:oauth:2.0:oob';

$step = (isset($_GET['step'])) ? $_GET['step'] : 'start';

$message = '';
$html = '';
if($step == 'start')
{
  
  
  $user = new AdWordsUser();
  $user->LogAll();
  $authorizationUrl = GetOAuth2Credential($user, 'start', $redirectUri, true);

  $message = 'Authorize Assisted Click to use your adword account.' ;  
  $html = '<a target = "_blank" href="' . $authorizationUrl . '">Authorize</a><br/>Log in to your AdWords account and open the following URL : ' . $authorizationUrl;
  $html .= "<form method = 'get' ation = '' ><br/><hr/><br/><br/>Enter Access Authorization code here : <br/><br/><input type = 'text' name = 'code' style = 'width:90%;' /><br/><br/><br/><input type = 'submit' name = 'btn-submit' value = 'Process Authorization Code' /><input type = 'hidden' name = 'step' value = 'access-code' /></form>";
}
else if ($step ==  'access-code')
{
  $code = (isset($_GET['code'])) ? $_GET['code'] : 'access code is not provided.';
  $html = 'your authorization code is : ' . $code . '<br/>';
  
  try {
    // Get the client ID and secret from the auth.ini file. If you do not have a
    // client ID or secret, please create one of type "installed application" in
    // the Google API console: https://code.google.com/apis/console#access
    // and set it in the auth.ini file.
    $user = new AdWordsUser();
    $user->LogAll();

    // Get the OAuth2 credential.
    $oauth2Info = GetOAuth2Credential($user, 'get-access-token', $redirectUri, true, $code);

    // Enter the refresh token into your auth.ini file.
    //printf("Your refresh token is: %s\n\n", $oauth2Info['refresh_token']);
    //printf("In your auth.ini file, edit the refresh_token line to be:\n"
    //    . "refresh_token = \"%s\"\n", $oauth2Info['refresh_token']);
    $message = 'Access token is retrieved successfully !!!';
    $html .= 'Your refresh token is : ' . $oauth2Info['refresh_token'] . '<pre>' . print_r($oauth2Info, true) . '</pre>';
    } 
  catch (OAuth2Exception $e) {
    ExampleUtils::CheckForOAuth2Errors($e);
  } 
  catch (ValidationException $e) {
    ExampleUtils::CheckForOAuth2Errors($e);
  } 
  catch (Exception $e) {
    printf("An error has occurred: %s\n", $e->getMessage());
  }
    
}
else if ( $step == 'get-campaign' )
{
  
}




function GetOAuth2Credential($user, $step = 'start', $redirectUri = null, $offline = true, $code = null) {
  // $redirectUri = NULL;   // already set in function definition
  // $offline = TRUE;       // already set in function definition
  // Get the authorization URL for the OAuth2 token.
  // No redirect URL is being used since this is an installed application. A web
  // application would pass in a redirect URL back to the application,
  // ensuring it's one that has been configured in the API console.
  // Passing true for the second parameter ($offline) will provide us a refresh
  // token which can used be refresh the access token when it expires.
  $OAuth2Handler = $user->GetOAuth2Handler();
  $authorizationUrl = $OAuth2Handler->GetAuthorizationUrl(
      $user->GetOAuth2Info(), $redirectUri, $offline);
  if($step == 'start')
  {
    // In a web application you would redirect the user to the authorization URL
    // and after approving the token they would be redirected back to the
    // redirect URL, with the URL parameter "code" added. For desktop
    // or server applications, spawn a browser to the URL and then have the user
    // enter the authorization code that is displayed.
    // printf("Log in to your AdWords account and open the following URL:\n%s\n\n", $authorizationUrl);
    return $authorizationUrl;
  }
  else if ($step == 'get-access-token') 
  {
    //print "After approving the token enter the authorization code here: ";
    //$stdin = fopen('php://stdin', 'r');
    //$code = trim(fgets($stdin));
    //fclose($stdin);
    //print "\n";

    // Get the access token using the authorization code. Ensure you use the same
    // redirect URL used when requesting authorization.
    $user->SetOAuth2Info(
          $OAuth2Handler->GetAccessToken(
              $user->GetOAuth2Info(), $code, $redirectUri));

    // The access token expires but the refresh token obtained for offline use
    // doesn't, and should be stored for later use.
    return $user->GetOAuth2Info();
  }
  
}
?>


<html xmlns='http://www.w3.org/1999/xhtml' lang='en'>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Authentication Flow | Assisted Click</title>

    <style type="text/css">
        body {
            font-family: "Titillium Web", "Lucida Grande", Tahoma, Arial, Verdana, sans-serif;
            background: #d2d2d2;
            font-size: 12px;
        }

        div {
            background-color: white;
            width: 1024px;
            padding: 30px;
            border: 3px solid #7e7e7e;
            color: #757575;
            margin: 0 auto;
            display: block;
            margin-top: 100px;
        }

        h2 {
            color: #4d9a49;
            margin: 0px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="message">
        <h2>User Authentication Flow [step : <?php echo $step; ?>]</h2>
        <h3><?php  echo $message; ?></h3>
        <?php  echo $html; ?>
    </div>
</body>
</html>
