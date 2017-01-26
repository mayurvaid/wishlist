<?php

	class People{
		public $firstname;
		public $lastname;
		public $email;
		public $userId;
		public $password;
		public $oauthId;
		public $oauthProvider;
		public $picture;

		public function setAllData($firstname, $lastname, $email ,$password,$oauthId,$oauthProvider,
			$picture)  
	    {  
	        $this->firstname = $firstname;
		    $this->lastname = $lastname;
		    $this->email = $email;
		    $this->password = $password;
		    $this->oauthId = $oauthId;
		    $this->oauthProvider = $oauthProvider;
		    $this->picture = $picture;
	    } 
	}
?>