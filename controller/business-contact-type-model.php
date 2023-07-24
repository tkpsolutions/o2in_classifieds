<?php
class BusinessContactType {
    private $id;
    private $businessId;
    private $contactTypeId;
    private $contact;
    private $createdDateTime;
    private $updatedDateTime;
    private $status;
    //linkage variables
    private $business;
    private $contactType;

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

    public function getContactTypeId() {
        return $this->contactTypeId;
    }

    public function setContactTypeId($contactTypeId) {
        $this->contactTypeId = $contactTypeId;
    }

    public function getContact() {
        return $this->contact;
    }

    public function setContact($contact) {
        $this->contact = $contact;
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

    public function getContactType() {
        return $this->contactType;
    }

    public function setContactType($contactType) {
        $this->contactType = $contactType;
    }

    public function __construct($id, $businessId, $contactTypeId, $contact, $createdDateTime, $updatedDateTime, $status) {
        $this->id = $id;
        $this->businessId = $businessId;
        $this->contactTypeId = $contactTypeId;
        $this->contact = $contact;
        $this->createdDateTime = $createdDateTime;
        $this->updatedDateTime = $updatedDateTime;
        $this->status = $status;
    }
}
?>