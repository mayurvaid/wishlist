<?php
//Include GP config file && User class
include_once 'google/gpConfig.php';
require_once 'model/People.php';
require_once 'dao/UserDao.php';

if(isset($_GET['code'])){
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
    $gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
    //Get user profile data from google
    $gpUserProfile = $google_oauthV2->userinfo->get();
    
    //Initialize User class
    $people = new People();
    
   $people->setAllData($gpUserProfile['given_name'],$gpUserProfile['family_name'],$gpUserProfile['email'],$gpUserProfile['id'],null,'google',$gpUserProfile['picture']); 
     echo json_encode($people);
    $userDao = new UserDao();

    $userDao->insertUser($people);
} else {
    $authUrl = $gClient->createAuthUrl();
    $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="images/glogin.png" alt=""/></a>';
}
?>

<div><?php echo $output ?></div>