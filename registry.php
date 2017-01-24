<?php 
	include_once("controller/RegistryController.php");

	$registryController = new RegistryController();
	
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		$action = $_REQUEST["action"];
		if(isset($action)){
			switch ($action){
				case "getRegistryById" :
					$registryController->getRegistryById();
				break;
			}
		}
	}else if($_SERVER['REQUEST_METHOD'] == "POST"){
		$action = $_REQUEST["action"];
		if(isset($action)){
			switch ($action){
				case "createRegistry" :
					$registryController->createRegistry();
				break;
			}
		}
	}
?>