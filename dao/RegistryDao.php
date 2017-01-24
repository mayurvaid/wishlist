<?php
	include "BaseDao.php";
	include_once("model/Registry.php");
	include_once("model/Error.php");
	include_once("model/Success.php");
	class RegistryDao{
		private $baseDao;

		function __construct(){
			$baseDao = new BaseDao();
			$this->baseDao = $baseDao;
		}

		function getRegistryById($id){
			$query = "select * from registry where registry_i=" . $id;
			//$result = mysql_query($query) or die("Could not query: " . mysql_error());  
			$respArray =  array();
			foreach($this->baseDao->db->query($query) as $row){	
				$registryId = $row["registry_i"];
				$occassionName = $row["occasion_n"];
				$occasionOtherName = $row["occasion_oth_n"];
				$eventDate = $row["event_date"];
				$eventTime = $row["event_time"];
				$registryName = $row["registry_name"];
				$address = $row["address"];
				$customUrl = $row["custom_url"];

				$registry = new Registry();
				$registry->setAllData($registryId,$occassionName,$occasionOtherName,$eventDate,
					$eventTime,$registryName,$address,$customUrl,$_SESSION['user_session']);
				array_push($respArray ,$registry);
			}
			return json_encode($respArray);
		}

		function insertRegistry($registry){
			$this->baseDao->db->beginTransaction();
			$insertStmt = $this->baseDao->db->prepare("INSERT INTO registry (occasion_n
				,occasion_oth_n,event_date,event_time,registry_name,address,custom_url)
			 VALUES (:occassionName, :occasionOtherName,:eventDate,:eventTime,
			 	:registryName,:address,:customUrl)");

		   try {
			  	$insertStmt->execute(array(
		            'occassionName' => $registry->occassionName,
		            'occasionOtherName' => $registry->occasionOtherName,
		            'eventDate' => $registry->eventDate,
		            'eventTime' => $registry->eventTime,
		            'registryName' => $registry->registryName,
		            'address' => $registry->address,
		            'customUrl' => $registry->customUrl
		        ));

			  	$registry->registryId = $this->baseDao->db->lastInsertId();

			  	$insertStmt1 = $this->baseDao->db->prepare("INSERT INTO registry_user (registry_i
				,user_i)
			 	VALUES (:registryId, :userId)");

			  	$insertStmt1->execute(array(
			  		'registryId' => $registry->registryId,
		            'userId' => $registry->userId
			  	));
		        $this->baseDao->db->commit();
		    } catch (Exception $e) {
		    	echo $e;
		    	$this->baseDao->db->rollBack();
		    	http_response_code(500);
		    	$error = new Error("1000","An error occurred while creating registry");

		    	return json_encode($error);
		    }

		    http_response_code(200);
		    header('Content-Type: application/json');

		    $success = new Success("success",$registry);
		    return json_encode($success);
		}

	}
?>