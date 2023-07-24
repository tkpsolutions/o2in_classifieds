<?php
class EventCategory {
    private $id;
    private $name;
    private $image;
    private $status;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
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

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function __construct($id, $name, $image, $status) {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->status = $status;
    }
}
?>