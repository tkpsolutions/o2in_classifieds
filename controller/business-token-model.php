<?php
class BusinessToken {
    private $id;
    private $businessId;
    private $businessServiceId;
    private $cityId;
    private $tokenDate;
    private $fromTime;
    private $toTime;
    private $duration;
    private $userId;
    private $bookedDateTime;
    private $walletId;
    private $bookingRemarks;
    private $createdDateTime;
    private $updatedDateTime;
    private $status;

    private $business; 
    private $businessService; 
    private $city; 
    private $user; 
    private $wallet; // linkage variable

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

    public function getCityId() {
        return $this->cityId;
    }

    public function setCityId($cityId) {
        $this->cityId = $cityId;
    }

    public function getBusinessServiceId() {
        return $this->businessServiceId;
    }

    public function setBusinessServiceId($businessServiceId) {
        $this->businessServiceId = $businessServiceId;
    }

    public function getTokenDate() {
        return $this->tokenDate;
    }

    public function setTokenDate($tokenDate) {
        $this->tokenDate = $tokenDate;
    }

    public function getFromTime() {
        return $this->fromTime;
    }

    public function setFromTime($fromTime) {
        $this->fromTime = $fromTime;
    }

    public function getToTime() {
        return $this->toTime;
    }

    public function setToTime($toTime) {
        $this->toTime = $toTime;
    }

    public function getDuration() {
        return $this->duration;
    }

    public function setDuration($duration) {
        $this->duration = $duration;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function getBookedDateTime() {
        return $this->bookedDateTime;
    }

    public function getWalletId() {
        return $this->walletId;
    }

    public function setWalletId($walletId) {
        $this->walletId = $walletId;
    }

    public function getBookingRemarks() {
        return $this->bookingRemarks;
    }

    public function setBookingRemarks($bookingRemarks) {
        $this->bookingRemarks = $bookingRemarks;
    }

    public function setBookedDateTime($bookedDateTime) {
        $this->bookedDateTime = $bookedDateTime;
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
    public function getbusinessService() {
        return $this->businessService;
    }

    public function setbusinessService($businessService) {
        $this->businessService = $businessService;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function getUser() {
        return $this->user;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function getWallet() {
        return $this->wallet;
    }

    public function setWallet($wallet) {
        $this->wallet = $wallet;
    }

    public function __construct($id, $businessId, $businessServiceId, $cityId, $tokenDate, $fromTime, $toTime, $duration, $userId,  $bookedDateTime, $walletId, $bookingRemarks, $createdDateTime, $updatedDateTime, $status) {
        $this->id = $id;
        $this->businessId = $businessId;
        $this->cityId = $cityId;
        $this->businessServiceId = $businessServiceId;
        $this->tokenDate = $tokenDate;
        $this->fromTime = $fromTime;
        $this->toTime = $toTime;
        $this->duration = $duration;
        $this->userId = $userId;
        $this->bookedDateTime = $bookedDateTime;
        $this->walletId = $walletId;
        $this->bookingRemarks = $bookingRemarks;
        $this->createdDateTime = $createdDateTime;
        $this->updatedDateTime = $updatedDateTime;
        $this->status = $status;
    }
}
?>