<?php
class BusinessService {
    private $id;
    private $businessId;
    private $name;
	private $price;
    private $tax;
    private $discount;
    private $status;

    private $business; // linkage variable

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

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getPrice(){
		return $this->price;
	}

	public function setPrice($price){
		$this->price = $price;
	}

	public function getTax(){
		return $this->tax;
	}

	public function setTax($tax){
		$this->tax = $tax;
	}

	public function getDiscount(){
		return $this->discount;
	}

	public function setDiscount($discount){
		$this->discount = $discount;
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

    public function __construct($id, $businessId, $name, $price, $tax, $discount, $status) {
        $this->id = $id;
        $this->businessId = $businessId;
        $this->name = $name;
		$this->price = $price;
		$this->tax = $tax;
		$this->discount = $discount;
        $this->status = $status;
    }
}
?>