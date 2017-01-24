<?php

	class People{
		public $firstname;
		public $lastname;
		public $email;
		public $userId;
		public $password;


		public function setAllData($firstname, $lastname, $email ,$password)  
	    {  
	        $this->firstname = $firstname;
		    $this->lastname = $lastname;
		    $this->email = $email;
		    $this->password = $password;
	    } 
	}
?>