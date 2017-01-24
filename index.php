<?php 
	include_once("controller/UserController.php");

	$userController = new UserController();
	
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		 echo $_SESSION['user_session'];
		if(isset($_GET["action"])){
			switch ($_GET["action"]){
				case "getAll" :
					$userController->invoke();
				break;
			}
		}
	}else if($_SERVER['REQUEST_METHOD'] == "POST"){
		$action = $_REQUEST["action"];
		if(isset($action)){
			switch ($action){
				case "insert" :
					$userController->insertUser();
				break;
				case "signin" :
					$userController->signIn();
				break;
			}
		}
	}
?>