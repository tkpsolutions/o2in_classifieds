<?php
 class Post
 {
    private $id;
    private $cityId;
	private $postCategoryId;
    private $title;
    private $description;
    private $createdDateTime;
    private $updatedDateTime;
    private $image;
    private $status;

    //linkage variable
    private $city;
	private $postCategory;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getCityId(){
		return $this->cityId;
	}

	public function setCityId($cityId){
		$this->cityId = $cityId;
	}

	public function getPostCategoryId(){
		return $this->postCategoryId;
	}

	public function setPostCategoryId($postCategoryId){
		$this->postCategoryId = $postCategoryId;
	}

	public function getTitle(){
		return $this->title;
	}

	public function setTitle($title){
		$this->title = $title;
	}

	public function getDescription(){
		return $this->description;
	}

	public function setDescription($description){
		$this->description = $description;
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

	public function getImage(){
		return $this->image;
	}

	public function setImage($image){
		$this->image = $image;
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

	public function getPostCategory(){
		return $this->postCategory;
	}

	public function setPostCategory($postCategory){
		$this->postCategory = $postCategory;
	}
   public function __construct($id,$cityId,$postCategoryId,$title,$description,$createdDateTime,$updatedDateTime,$image,$status)
    {
      $this->id = $id;
      $this->cityId = $cityId;
	  $this->postCategoryId = $postCategoryId;
      $this->title = $title;
      $this->description = $description;
      $this->createdDateTime = $createdDateTime;
      $this->updatedDateTime = $updatedDateTime;
      $this->image = $image;
      $this->status = $status;

    }

   }
   ?>





