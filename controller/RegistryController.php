<?php
	include_once("dao/RegistryDao.php");
	session_start();
	class RegistryController {
		public $registryDao;
		
		public function __construct()  {  
	        $this->registryDao = new RegistryDao();
	    }

	    public function getRegistryById(){
	    	echo $this->registryDao->getRegistryById($_REQUEST["regId"]);
	    }
		
		public function createRegistry(){
	    	$entityBody = file_get_contents('php://input');
			$data = json_decode($entityBody);
			$registry = new Registry();
			foreach ($data as $key => $value){
				$registry->$key = $value;
			}

			$registry->userId = $_SESSION['user_session'];
			echo $this->registryDao->insertRegistry($registry);
		}
	}
?>