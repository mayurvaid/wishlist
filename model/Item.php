<?php
	class Item{
		public $itemId;
		public $itemDescription;
		public $itemImage;
		public $itemURL;
		public $categoryId;
		public $itemPrice;
		public $color;
		public $size;
		public $itemNotes;
		public $registryId;

		function setAllData($itemId,$itemDescription,$itemImage,$itemURL,$categoryId,$itemPrice
			,$color,$size,$itemNotes,$registryId){
			$this->itemId = $itemId;
			$this->itemDescription = $itemDescription;
			$this->itemImage = $itemImage;
			$this->itemURL = $itemURL;
			$this->categoryId = $categoryId;
			$this->itemPrice = $itemPrice;
			$this->color = $color;
			$this->size = $size;
			$this->itemNotes = $itemNotes;
			$this->registryId = $registryId;
		}
	}
?>