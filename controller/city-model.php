<?php
class City {
    private $id;
    private $stateId;
    private $name;
    private $lat;
    private $lng;
    private $status;

    private $state; // linkage variable
    //private $countryName;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getStateId() {
        return $this->stateId;
    }

    public function setStateId($stateId) {
        $this->stateId = $stateId;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
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


    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getState() {
        return $this->state;
    }

    public function setState($state) {
        $this->state = $state;

    }
    
    public function __construct($id, $stateId, $name, $lat, $lng,$status) {
        $this->id = $id;
        $this->stateId = $stateId;
        $this->name = $name;
        $this->lat = $lat;
        $this->lng = $lng;
        $this->status = $status;
    }
}
?>