<?php
	class BusinessTag {

		private $id;
	    private $businessId;
		private $tagId;
		private $status;

		//linkage variable
		 private $business;
		 private $tag;

         public function getId(){
            return $this->id;
        }
    
        public function setId($id){
            $this->id = $id;
        }
    
        public function getBusinessId(){
            return $this->businessId;
        }
    
        public function setBusinessId($businessId){
            $this->businessId = $businessId;
        }
    
        public function getTagId(){
            return $this->tagId;
        }
    
        public function setTagId($tagId){
            $this->tagId = $tagId;
        }
    
        public function getStatus(){
            return $this->status;
        }
    
        public function setStatus($status){
            $this->status = $status;
        }
    
        public function getBusiness(){
            return $this->business;
        }
    
        public function setBusiness($business){
            $this->business = $business;
        }
    
        public function getTag(){
            return $this->tag;
        }
    
        public function setTag($tag){
            $this->tag = $tag;
        }
        public function __construct($id, $businessId, $tagId, $status){
			$this->id = $id;
			
			$this->businessId = $businessId;
			$this->tagId = $tagId;
			$this->status = $status;
		}
	}

?>