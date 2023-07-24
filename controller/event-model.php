<?php
class Event {
    private $id;
    private $eventCategoryId;
    private $cityId;
    private $eventDate;
    private $title;
    private $description;
    private $image;
    private $address;
    private $createdDateTime;
    private $updatedDateTime;
    private $status;

    private $city; // linkage variable
    private $eventCategory; // linkage variable

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getEventCategoryId() {
        return $this->eventCategoryId;
    }

    public function setEventCategoryId($eventCategoryId) {
        $this->eventCategoryId = $eventCategoryId;
    }

    public function getCityId() {
        return $this->cityId;
    }

    public function setCityId($cityId) {
        $this->cityId = $cityId;
    }

    public function getEventDate() {
        return $this->eventDate;
    }

    public function setEventDate($eventDate) {
        $this->eventDate = $eventDate;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
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

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function getEventCategory() {
        return $this->eventCategory;
    }

    public function setEventCategory($eventCategory) {
        $this->eventCategory = $eventCategory;
    }

    public function __construct($id, $eventCategoryId, $cityId, $eventDate, $title, $description, $image, $address, $createdDateTime, $updatedDateTime, $status) {
        $this->id = $id;
        $this->eventCategoryId = $eventCategoryId;
        $this->cityId = $cityId;
        $this->eventDate = $eventDate;
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->address = $address;
        $this->createdDateTime = $createdDateTime;
        $this->updatedDateTime = $updatedDateTime;
        $this->status = $status;
    }
}

?>