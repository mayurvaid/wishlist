<?php
	include_once("dao/UserDao.php");
	include_once("model/People.php");
	class UserController {
		public $userDao;
		
		public function __construct()  {  
	        $this->userDao = new UserDao();
	    }

	    public function invoke(){
	    	echo json_encode($this->userDao->getAllUser());
	    } 

	    public function insertUser(){
	    	$entityBody = file_get_contents('php://input');
			$data = json_decode($entityBody);
			$people = new People();
			foreach ($data as $key => $value){
				$people->$key = $value;
			}
	    	
	    	echo $this->userDao->insertUser($people);
	    }
	}
?>