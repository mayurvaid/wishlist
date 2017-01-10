<?php
include "config.php";

class BaseDao{
	public $link;

	public function connect()  {  
		$config = new Config();
	    $link = @(mysql_connect($config->db_loc, $config->db_userid, $config->db_pass));
		if(!$link){
		  if(!isset($doingSetup)){
		    sendEmail($admin_email, "", "Database is dead", "umm, the database is dead", 0);
		    die("<p><font size=6>Danger Will Robinson!!!!  It looks like the database is dead.<p>Try back at the top of the hour.</big>");
		  }
		}
		else{
		  mysql_select_db($config->db_name);
		}
		$this->link = $link;
		return;
	}

	public function closeConnection(){
		mysql_close($this->link);
	}
}

?>