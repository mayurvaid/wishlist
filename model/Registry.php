<?php
	class Registry {
		public $registryId;
		public $occassionName;
		public $occasionOtherName;
		public $eventDate;
		public $eventTime;
		public $address;
		public $customUrl;
		public $userId;

		function setAllData($registryId,$occassionName,$occasionOtherName,$eventDate
			,$eventTime,$registryName,$address,$customUrl,$userId){
			$this->registryId = $registryId;
			$this->registryName = $registryName;
			$this->occassionName = $occassionName;
			$this->occasionOtherName = $occasionOtherName;
			$this->eventDate = $eventDate;
			$this->eventTime = $eventTime;
			$this->address = $address;
			$this->customUrl = $customUrl;
			$this->userId = $userId;
		}
	}
?>