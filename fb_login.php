<?php
//Include FB config file && User class
require_once 'fb/fbConfig.php';
require_once 'model/People.php';
require_once 'dao/UserDao.php';

//Get user profile data from facebook
$fbUserProfile = $facebook->api('/me?fields=id,first_name,last_name,email,link,gender,locale,picture');

//Initialize User class
$people = new People();

$people->setAllData($fbUserProfile['first_name'],$fbUserProfile['last_name'],$fbUserProfile['email'],$fbUserProfile['id'],null,'facebook',$fbUserProfile['picture']['data']['url']);	
$userDao = new UserDao();
$userDao->insertUser($people);
echo "success";

?>
