<?php
	include "BaseDao.php";
	include_once("model/People.php");
	class UserDao {
		private $baseDao;

		function __construct(){
			$baseDao = new BaseDao();
			$this->baseDao = $baseDao;
		}
		function getAllUser(){
			$baseDao->connect();
			$query = "select * from people";
			$result = mysql_query($query) or die("Could not query: " . mysql_error());  
			$respArray =  array();
			while($row = mysql_fetch_assoc($result)){	
				$email = $row["email"];
				$firstname = $row["firstname"];
				$lastname = $row["lastname"];
				$phone = $row["phone"];

				array_push($respArray ,new People($firstname,$lastname,$email,$phone));
			}

			$baseDao->closeConnection();
			return $respArray;
		}

		function insertUser($people){
			$baseDao->connect();

			$sql = 'INSERT INTO people '.
		      '(email,firstname, lastname) '.
		      'VALUES ( "$people->email", "$people->firstname", "$people->lastname")';
		      
		   $retval = mysql_query( $sql, $conn );
		   
		   if(! $retval ) {
		      die('Could not enter data: ' . mysql_error());
		   }
		   
		   echo "Entered data successfully\n";

			$baseDao->closeConnection();
		}

	}

?>