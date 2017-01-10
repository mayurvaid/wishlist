<?php 
	include_once("controller/UserController.php");

	$userController = new UserController();
	
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		if(isset($_GET["action"])){
			switch ($_GET["action"]){
				case "getAll" :
					$userController->invoke();
				break;
			}
		}
	}else if($_SERVER['REQUEST_METHOD'] == "POST"){
		$userController->insertUser();
	}
?>