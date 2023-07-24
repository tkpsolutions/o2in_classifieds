<?php
class State {
    private $id;
    private $countryId;
    private $name;
   
    private $status;

    private $country; // linkage variable

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCountryId() {
        return $this->countryId;
    }

    public function setCountryId($countryId) {
        $this->countryId = $countryId;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
	
	
    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getCountry() {
        return $this->country;
    }

    public function setCountry($country) {
        $this->country = $country;
    }

    public function __construct($id, $countryId, $name,  $status) {
        $this->id = $id;
        $this->countryId = $countryId;
        $this->name = $name;
       
        $this->status = $status;
    }
}
?>