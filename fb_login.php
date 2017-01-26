<?php
//Include FB config file && User class
require_once 'fb/fbConfig.php';
require_once 'model/People.php';
require_once 'dao/UserDao.php';

if(!$fbUser){
	$fbUser = NULL;
	$loginURL = $facebook->getLoginUrl(array('redirect_uri'=>$redirectURL,'scope'=>$fbPermissions));
	$output = '<a href="'.$loginURL.'"><img src="images/fblogin-btn.png"></a>'; 	
}else{
	//Get user profile data from facebook
	$fbUserProfile = $facebook->api('/me?fields=id,first_name,last_name,email,link,gender,locale,picture');
	
	//Initialize User class
	$people = new People();
	
	$people->setAllData($fbUserProfile['first_name'],$fbUserProfile['last_name'],$fbUserProfile['email'],$fbUserProfile['id'],null,'facebook',$fbUserProfile['picture']['data']['url']);	
	$userDao = new UserDao();
	$userDao->insertUser($people);
	$output = "success";
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login with Facebook using PHP by CodexWorld</title>
<style type="text/css">
h1{font-family:Arial, Helvetica, sans-serif;color:#999999;}
</style>
</head>
<body>
<div><?php echo $output; ?></div>
</body>
</html>