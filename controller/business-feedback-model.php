<?php
class BusinessFeedback {
    private $id;
    private $businessId;
    private $userId;
    private $starCount;
    private $message;
    private $createdDateTime;
    private $updatedDateTime;
    private $status;

    private $business; 
    private $user; // linkage variable

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

    public function getUserId() {
        return $this->userId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function getStarCount() {
        return $this->starCount;
    }

    public function setStarCount($starCount) {
        $this->starCount = $starCount;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setMessage($message) {
        $this->message = $message;
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
    public function getUser() {
        return $this->user;
    }

    public function setUser($user) {
        $this->user = $user;
    }


    public function __construct($id, $businessId, $userId, $starCount, $message, $createdDateTime, $updatedDateTime, $status) {
        $this->id = $id;
        $this->businessId = $businessId;
        $this->userId = $userId;
        $this->starCount = $starCount;
        $this->message = $message;
        $this->createdDateTime = $createdDateTime;
        $this->updatedDateTime = $updatedDateTime;
        $this->status = $status;
    }
}
?>