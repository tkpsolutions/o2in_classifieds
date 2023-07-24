<?php
class BusinessTiming {
    private $id;
    private $businessId;
    private $dayNumber;
    private $fromTime;
    private $toTime;
    private $isFullday;
    private $isHoliday;
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

    public function getDayNumber() {
        return $this->dayNumber;
    }

    public function setDayNumber($dayNumber) {
        $this->dayNumber = $dayNumber;
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

    public function getIsFullday() {
        return $this->isFullday;
    }

    public function setIsFullday($isFullday) {
        $this->isFullday = $isFullday;
    }

    public function getIsHoliday() {
        return $this->isHoliday;
    }

    public function setIsHoliday($isHoliday) {
        $this->isHoliday = $isHoliday;
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

    public function __construct($id, $businessId, $dayNumber, $fromTime, $toTime, $isFullday, $isHoliday, $status) {
        $this->id = $id;
        $this->businessId = $businessId;
        $this->dayNumber = $dayNumber;
        $this->fromTime = $fromTime;
        $this->toTime = $toTime;
        $this->isFullday = $isFullday;
        $this->isHoliday = $isHoliday;
        $this->status = $status;
    }
}
?>