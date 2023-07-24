<?php
class HostVideo {

    private $id;
    private $title;
    private $description;
    private $video;
    private $createdDateTime;
    private $updatedDateTime;
    private $status;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function getVideo(){
        return $this->video;
    }

    public function setVideo($video){
        $this->video = $video;
    }

    public function getCreatedDateTime(){
        return $this->createdDateTime;
    }

    public function setCreatedDateTime($createdDateTime){
        $this->createdDateTime = $createdDateTime;
    }

    public function getUpdatedDateTime(){
        return $this->updatedDateTime;
    }

    public function setUpdatedDateTime($updatedDateTime){
        $this->updatedDateTime = $updatedDateTime;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
    }

    public function __construct($id, $title, $description, $video, $createdDateTime, $updatedDateTime, $status){
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->video = $video;
        $this->createdDateTime = $createdDateTime;
        $this->updatedDateTime = $updatedDateTime;
        $this->status = $status;
    }
}

?>
