<?php
	include "BaseDao.php";
	include_once("model/People.php");
	include_once("model/Error.php");
	include_once("model/Success.php");
	if(!isset($_SESSION)){ 
        session_start(); 
    } 

	class UserDao {
		private $baseDao;

		function __construct(){
			$baseDao = new BaseDao();
			$this->baseDao = $baseDao;
		}
		function getAllUser(){
			$query = "select * from user";
			//$result = mysql_query($query) or die("Could not query: " . mysql_error());  
			$respArray =  array();
			foreach($this->baseDao->db->query($query) as $row){	
				$email = $row["email"];
				$firstname = $row["first_name"];
				$lastname = $row["last_name"];
				$password = $row["password"];

				$people = new People();
				$people->setAllData($firstname,$lastname,$email,$password);
				array_push($respArray ,$people);
			}
			return $respArray;
		}

		function insertUser($people){
			$insertStmt = $this->baseDao->db->prepare("INSERT INTO user (email, first_name,last_name,
				password,crte_ts,oauth_provider,oauth_uid,picture)
			 VALUES (:email, :first_name,:last_name,:password,:time,:oauthId,:oauthProvider,:picture)");
		    $timestamp = date('Y-m-d G:i:s');
		  	
		  	try {
			  	$insertStmt->execute(array(
		            'email' => $people->email,
		            'first_name' => $people->firstname,
		            'last_name' => $people->lastname,
		            'password' => $people->password,
		            'oauthId' => $people->oauthId,
		            'oauthProvider' => $people->oauthProvider,
		            'picture' => $people->picture,
		            'time' => $timestamp
		        ));
		        $people->userId = $this->baseDao->db->lastInsertId();
		    } catch (Exception $e) {
		    	echo $e;
		    	http_response_code(500);
		    	header('Content-Type: application/json');

		    	$error = new Error("1000","An error occurred while creating user");

		    	return json_encode($error);
		    }

		    http_response_code(200);
		    header('Content-Type: application/json');

		    $success = new Success("success",$people);
		    return json_encode($success);
		}

		function signIn($people){
			$selectStmt = $this->baseDao->db->prepare("select * from  user where email=:email and password=:password");

		  	try {
			  	$selectStmt->execute(array(
		            'email' => $people->email,
		            'password' => $people->password
		        ));
		        $userRow=$selectStmt->fetch(PDO::FETCH_ASSOC);

		        if($selectStmt->rowCount() > 0) {
		        	$_SESSION['user_session'] = $userRow['user_i'];

		        	http_response_code(200);
				    header('Content-Type: application/json');

				    $success = new Success("success", "login successful");
				    return json_encode($success);
		        }else{
		        	http_response_code(500);
			    	header('Content-Type: application/json');

			    	$error = new Error("1002","Invalid username and password");

			    	return json_encode($error);
		        }

		    } catch (Exception $e) {
		    	http_response_code(500);
		    	header('Content-Type: application/json');

		    	$error = new Error("1003","Login unsucessful");

		    	return json_encode($error);
		    }
		}

	}
?>