<?php

	class People{
		public $firstname;
		public $lastname;
		public $email;
		public $phone;
		
		public function __construct($firstname, $lastname, $email ,$phone)  
	    {  
	        $this->firstname = $firstname;
		    $this->lastname = $lastname;
		    $this->email = $email;
		    $this->phone = $phone;
	    } 
	}
?>