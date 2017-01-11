<?php
	class Registry {
		public $registryId;
		public $occassionName;
		public $occasionOtherName;
		public $eventDate;
		public $eventTime;
		public $registryName;
		public $address;
		public $customUrl;

		function setAllData($registryId,$occassionName,$occasionOtherName,$eventDate
			,$eventTime,$registryName,$address,$customUrl){
			$this->registryId = $registryId;
			$this->registryName = $registryName;
			$this->occassionName = $occassionName;
			$this->occasionOtherName = $occasionOtherName;
			$this->eventDate = $eventDate;
			$this->eventTime = $eventTime;
			$this->address = $address;
			$this->customUrl = $customUrl;
		}
	}
?>