<?php
	include "BaseDao.php";
	include_once("model/Item.php");
	include_once("model/Error.php");
	include_once("model/Success.php");

	class ItemDao{
		private $baseDao;

		function __construct(){
			$baseDao = new BaseDao();
			$this->baseDao = $baseDao;
		}

		function addItemToRegistry($item){
			$insertStmt = $this->baseDao->db->prepare("INSERT INTO item (item_desc,item_img,item_url,item_catg_i,item_price,item_color,item_size,item_note,registry_i)
			 VALUES (:itemDescription, :itemImage,:itemURL,:categoryId,:itemPrice,:color,:size,:itemNotes,:registryId)");
		    $timestamp = date('Y-m-d G:i:s');
		  	
		  	try {
			  	$insertStmt->execute(array(
		            'itemDescription' => $item->itemDescription,
		            'itemImage' => $item->itemImage,
		            'itemURL' => $item->itemURL,
		            'categoryId' => $item->categoryId,
		            'itemPrice' => $item->itemPrice,
		            'color' => $item->color,
		            'size' => $item->size,
		            'itemNotes' => $item->itemNotes,
		            'registryId' => $item->registryId
		        ));
		        $item->itemId = $this->baseDao->db->lastInsertId();
		    } catch (Exception $e) {
		    	http_response_code(500);
		    	header('Content-Type: application/json');

		    	$error = new Error("1000","An error occurred while creating user");

		    	return json_encode($error);
		    }

		    http_response_code(200);
		    header('Content-Type: application/json');

		    $success = new Success("success",$item);
		    return json_encode($success);
		}
	}

?>