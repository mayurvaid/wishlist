<?php
//Include Facebook SDK
require_once 'inc/facebook.php';

/*
 * Configuration and setup FB API
 */
$appId = '738590059580105'; //Facebook App ID
$appSecret = '2a97505cb5352a355ce29bc42bda868a'; // Facebook App Secret
$redirectURL = 'http://localhost/wishlist/fb_login.php'; // Callback URL
$fbPermissions = 'email';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret
));
$fbUser = $facebook->getUser();
?>