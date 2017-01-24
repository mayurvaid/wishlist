<?php
	include_once("dao/UserDao.php");
	include_once("model/People.php");
	class UserController {
		public $userDao;
		
		public function __construct()  {  
	        $this->userDao = new UserDao();
	    }

	    public function invoke(){
	    	http_response_code(200);
		    header('Content-Type: application/json');
	    	echo json_encode($this->userDao->getAllUser());
	    } 

	    public function insertUser(){
	    	$entityBody = file_get_contents('php://input');
			$data = json_decode($entityBody);
			$people = new People();
			foreach ($data as $key => $value){
				$people->$key = $value;
			}

			//$people->password = password_hash($people->password, PASSWORD_DEFAULT);

			if (!filter_var($people->email, FILTER_VALIDATE_EMAIL)) {
			    http_response_code(500);
			    header('Content-Type: application/json');

		    	$error = new Error("1001","Invalid format and please re-enter valid email");

		    	echo json_encode($error);
			}
	    	
	    	echo $this->userDao->insertUser($people);
	    }

	    public function signIn(){
	    	$entityBody = file_get_contents('php://input');
			$data = json_decode($entityBody);
			$people = new People();
			foreach ($data as $key => $value){
				$people->$key = $value;
			}
			
			//$people->password = password_hash($people->password, PASSWORD_DEFAULT);

	    	echo $this->userDao->signIn($people);
	    }
	}
?>