<?php
class Tag
{
    private $id;
    private $categoryId;
    private $name;
    private $status;

    //linkage variable
		 private $category;

         public function getId(){
            return $this->id;
        }
    
        public function setId($id){
            $this->id = $id;
        }
    
        public function getCategoryId(){
            return $this->categoryId;
        }
    
        public function setCategoryId($categoryId){
            $this->categoryId = $categoryId;
        }
    
        public function getName(){
            return $this->name;
        }
    
        public function setName($name){
            $this->name = $name;
        }
    
        public function getStatus(){
            return $this->status;
        }
    
        public function setStatus($status){
            $this->status = $status;
        }
    
        public function getCategory(){
            return $this->category;
        }
    
        public function setCategory($category){
            $this->category = $category;
        }
    public function __construct($id, $categoryId, $name, $status) {
        $this->id = $id;
        $this->categoryId = $categoryId;
        $this->name = $name;
        $this->status = $status;
    }
}
?>