<?php
	class Business {

		private $id;
		private $name;
		private $descriptionShort;
		private $cityId;
		private $categoryId;
		private $createdDateTime;
		private $updatedDateTime;
        private $mobile;
        private $password;
		private $status;

		//linkage variable
		 private $city;
		 private $category;

		

         public function getId(){
            return $this->id;
        }
    
        public function setId($id){
            $this->id = $id;
        }
    
        public function getName(){
            return $this->name;
        }
    
        public function setName($name){
            $this->name = $name;
        }
    
        public function getDescriptionShort(){
            return $this->descriptionShort;
        }
    
        public function setDescriptionShort($descriptionShort){
            $this->descriptionShort = $descriptionShort;
        }
    
        public function getCityId(){
            return $this->cityId;
        }
    
        public function setCityId($cityId){
            $this->cityId = $cityId;
        }
    
        public function getCategoryId(){
            return $this->categoryId;
        }
    
        public function setCategoryId($categoryId){
            $this->categoryId = $categoryId;
        }
    
        public function getCreatedDateTime(){
            return $this->createdDateTime;
        }
    
        public function setCreatedDateTime($createdDateTime){
            $this->createdDateTime = $createdDateTime;
        }
    
        public function getUpdatedDateTime(){
            return $this->updatedDateTime;
        }
    
        public function setUpdatedDateTime($updatedDateTime){
            $this->updatedDateTime = $updatedDateTime;
        }
    
        public function getMobile(){
            return $this->mobile;
        }
    
        public function setMobile($mobile){
            $this->mobile = $mobile;
        }
    
        public function getPassword(){
            return $this->password;
        }
    
        public function setPassword($password){
            $this->password = $password;
        }
    
        public function getStatus(){
            return $this->status;
        }
    
        public function setStatus($status){
            $this->status = $status;
        }
    
        public function getCity(){
            return $this->city;
        }
    
        public function setCity($city){
            $this->city = $city;
        }
    
        public function getCategory(){
            return $this->category;
        }
    
        public function setCategory($category){
            $this->category = $category;
        }
		public function __construct($id, $name, $descriptionShort, $cityId, $categoryId, $createdDateTime, $updatedDateTime, $mobile, $password, $status){
			$this->id = $id;
			$this->name = $name;
			$this->descriptionShort = $descriptionShort;
			$this->cityId = $cityId;
			$this->categoryId = $categoryId;
			$this->createdDateTime= $createdDateTime;
			$this->updatedDateTime = $updatedDateTime;
            $this->mobile = $mobile;
            $this->password = $password;
			$this->status = $status;
		}
	}

?>