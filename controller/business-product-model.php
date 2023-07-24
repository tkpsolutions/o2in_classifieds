<?php
class BusinessProduct {
    private $id;
    private $businessId;
    private $name;
    private $image;
    private $price;
    private $discountPercentage;
    private $taxPercentage;
    private $createdDateTime;
    private $updatedDateTime;
    private $status;

    private $business; // linkage variable

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getBusinessId() {
        return $this->businessId;
    }

    public function setBusinessId($businessId) {
        $this->businessId = $businessId;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getDiscountPercentage() {
        return $this->discountPercentage;
    }

    public function setDiscountPercentage($discountPercentage) {
        $this->discountPercentage = $discountPercentage;
    }

    public function getTaxPercentage() {
        return $this->taxPercentage;
    }

    public function setTaxPercentage($taxPercentage) {
        $this->taxPercentage = $taxPercentage;
    }

    public function getCreatedDateTime() {
        return $this->createdDateTime;
    }

    public function setCreatedDateTime($createdDateTime) {
        $this->createdDateTime = $createdDateTime;
    }

    public function getUpdatedDateTime() {
        return $this->updatedDateTime;
    }

    public function setUpdatedDateTime($updatedDateTime) {
        $this->updatedDateTime = $updatedDateTime;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getBusiness() {
        return $this->business;
    }

    public function setBusiness($business) {
        $this->business = $business;
    }

    public function __construct($id, $businessId, $name, $image, $price, $discountPercentage, $taxPercentage, $createdDateTime, $updatedDateTime, $status) {
        $this->id = $id;
        $this->businessId = $businessId;
        $this->name = $name;
        $this->image = $image;
        $this->price = $price;
        $this->discountPercentage = $discountPercentage;
        $this->taxPercentage = $taxPercentage;
        $this->createdDateTime = $createdDateTime;
        $this->updatedDateTime = $updatedDateTime;
        $this->status = $status;
    }
}
?>