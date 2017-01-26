<?php

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '681310695643-be5r2anjtl1pimqjj62kdikk9jhmpfg3.apps.googleusercontent.com';
$clientSecret = 'pItbO2dRL6pG3w2cyUIqI3le';
$redirectURL = 'http://localhost/wishlist/gp_login.php';

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to wishlist');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>