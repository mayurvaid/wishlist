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
			$preparedQuery = $this->baseDao->db->prepare($query);

			$respArray =  array();
			$preparedQuery->execute();
			$row = $preparedQuery->fetch();
			$registry = new Registry();
		
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
			
			$respArray["registry"] = $registry;
			return json_encode($respArray);
		}

		function insertRegistry($registry){
			$this->baseDao->db->beginTransaction();
			$insertStmt = $this->baseDao->db->prepare("INSERT INTO registry (occasion_n
				,occasion_oth_n,event_date,event_time,registry_name,address,custom_url,user_i)
			 VALUES (:occassionName, :occasionOtherName,:eventDate,:eventTime,
			 	:registryName,:address,:customUrl,:userId)");

		   try {
			  	$insertStmt->execute(array(
		            'occassionName' => $registry->occassionName,
		            'occasionOtherName' => $registry->occasionOtherName,
		            'eventDate' => $registry->eventDate,
		            'eventTime' => $registry->eventTime,
		            'registryName' => $registry->registryName,
		            'address' => $registry->address,
		            'customUrl' => $registry->customUrl,
		            'userId' => $registry->userId
		        ));

			  	$registry->registryId = $this->baseDao->db->lastInsertId();
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