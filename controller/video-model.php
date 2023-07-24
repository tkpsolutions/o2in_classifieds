<?php
class Video {
    private $id;
    private $youtubeLink;
    private $title;
    private $description;
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

    public function getYoutubeLink() {
        return $this->youtubeLink;
    }

    public function setYoutubeLink($youtubeLink) {
        $this->youtubeLink = $youtubeLink;
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

  
    public function __construct($id, $youtubeLink, $title, $description, $createdDateTime, $updatedDateTime, $status) {
        $this->id = $id;
        $this->youtubeLink = $youtubeLink;
        $this->title = $title;
        $this->description = $description;
        $this->createdDateTime = $createdDateTime;
        $this->updatedDateTime = $updatedDateTime;
        $this->status = $status;
    }
}

?>