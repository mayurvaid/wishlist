<?php
	include "BaseDao.php";
	include_once("model/People.php");
	include_once("model/Error.php");
	include_once("model/Success.php");
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
				$phone = $row["phone"];

				$people = new People();
				$people->setAllData($firstname,$lastname,$email,$phone);
				array_push($respArray ,$people);
			}
			return $respArray;
		}

		function insertUser($people){
			$insertStmt = $this->baseDao->db->prepare("INSERT INTO user (email, first_name,last_name,phone,crte_ts)
			 VALUES (:email, :first_name,:last_name,:phone,:time)");
		    $timestamp = date('Y-m-d G:i:s');
		  	
		  	try {
			  	$insertStmt->execute(array(
		            'email' => $people->email,
		            'first_name' => $people->firstname,
		            'last_name' => $people->lastname,
		            'phone' => $people->phone,
		            'time' => $timestamp
		        ));
		    } catch (Exception $e) {
		    	http_response_code(500);
		    	$error = new Error("1000","An error occurred while creating user");

		    	return json_encode($error);
		    }

		    http_response_code(200);
		    header('Content-Type: application/json');

		    $success = new Success("success",$people);
		    return json_encode($success);
		}

	}

?>