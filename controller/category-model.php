<?php
class Category 
{
    private $id;
    private $name;
    private $image;
    private $isBooking;
    private $isGallery;
    private $isProduct;
    private $isRide;
    private $isFeedback;
    private $contactCount;
    private $status;

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

	public function getImage(){
		return $this->image;
	}

	public function setImage($image){
		$this->image = $image;
	}

	public function getIsBooking(){
		return $this->isBooking;
	}

	public function setIsBooking($isBooking){
		$this->isBooking = $isBooking;
	}

	public function getIsGallery(){
		return $this->isGallery;
	}

	public function setIsGallery($isGallery){
		$this->isGallery = $isGallery;
	}

	public function getIsProduct(){
		return $this->isProduct;
	}

	public function setIsProduct($isProduct){
		$this->isProduct = $isProduct;
	}

	public function getIsRide(){
		return $this->isRide;
	}

	public function setIsRide($isRide){
		$this->isRide = $isRide;
	}

	public function getIsFeedback(){
		return $this->isFeedback;
	}

	public function setIsFeedback($isFeedback){
		$this->isFeedback = $isFeedback;
	}

	public function getContactCount(){
		return $this->contactCount;
	}

	public function setContactCount($contactCount){
		$this->contactCount = $contactCount;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setStatus($status){
		$this->status = $status;
	}
    public function __construct($id, $name, $image, $isBooking, $isGallery, $isProduct, $isRide, $isFeedback, $contactCount, $status) {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->isBooking = $isBooking;
        $this->isGallery = $isGallery;
        $this->isProduct = $isProduct;
        $this->isRide = $isRide;
        $this->isFeedback = $isFeedback;
        $this->contactCount = $contactCount;
        $this->status = $status;
    }
}
?>