<?php
class BusinessDetail {
    private $id;
    private $businessId;
    private $descriptionLong;
    private $logo;
    private $banner;
    private $addressLine1;
    private $addressLine2;
    private $pincode;
    private $lat;
    private $lng;
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

    public function getDescriptionLong() {
        return $this->descriptionLong;
    }

    public function setDescriptionLong($descriptionLong) {
        $this->descriptionLong = $descriptionLong;
    }

    public function getLogo() {
        return $this->logo;
    }

    public function setLogo($logo) {
        $this->logo = $logo;
    }

    public function getBanner() {
        return $this->banner;
    }

    public function setBanner($banner) {
        $this->banner = $banner;
    }

    public function getAddressLine1() {
        return $this->addressLine1;
    }

    public function setAddressLine1($addressLine1) {
        $this->addressLine1 = $addressLine1;
    }

    public function getAddressLine2() {
        return $this->addressLine2;
    }

    public function setAddressLine2($addressLine2) {
        $this->addressLine2 = $addressLine2;
    }

    public function getPincode() {
        return $this->pincode;
    }

    public function setPincode($pincode) {
        $this->pincode = $pincode;
    }

    public function getLat() {
        return $this->lat;
    }

    public function setLat($lat) {
        $this->lat = $lat;
    }

    public function getLng() {
        return $this->lng;
    }

    public function setLng($lng) {
        $this->lng = $lng;
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

    public function __construct($id, $businessId, $descriptionLong, $logo, $banner, $addressLine1, $addressLine2, $pincode, $lat, $lng, $createdDateTime, $updatedDateTime, $status) {
        $this->id = $id;
        $this->businessId = $businessId;
        $this->descriptionLong = $descriptionLong;
        $this->logo = $logo;
        $this->banner = $banner;
        $this->addressLine1 = $addressLine1;
        $this->addressLine2 = $addressLine2;
        $this->pincode = $pincode;
        $this->lat = $lat;
        $this->lng = $lng;
        $this->createdDateTime = $createdDateTime;
        $this->updatedDateTime = $updatedDateTime;
        $this->status = $status;
    }
}
?>