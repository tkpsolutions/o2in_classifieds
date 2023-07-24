<?php
	class User {

		private $id;
		private $name;
		private $mobile;
		private $whatsappNo;
		private $email;
		private $createDateTime;
		private $address;
		private $pincode;
		private $role;
		private $cityId;
		private $password;
		private $status;

		// linkage variable
		private $city;

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getName(){
			return $this->name;
		}

		public function setName($name){
			$this->name = $name;
		}

		public function getMobile(){
			return $this->mobile;
		}

		public function setMobile($mobile){
			$this->mobile = $mobile;
		}

		public function getWhatsappNo(){
			return $this->whatsappNo;
		}

		public function setWhatsappNo($whatsappNo){
			$this->whatsappNo = $whatsappNo;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setEmail($email){
			$this->email = $email;
		}

		public function getCreateDateTime(){
			return $this->createDateTime;
		}

		public function setCreateDateTime($createDateTime){
			$this->createDateTime = $createDateTime;
		}

		public function getAddress(){
			return $this->address;
		}

		public function setAddress($address){
			$this->address = $address;
		}

		public function getPincode(){
			return $this->pincode;
		}

		public function setPincode($pincode){
			$this->pincode = $pincode;
		}

		public function getRole(){
			return $this->role;
		}

		public function setRole($role){
			$this->role = $role;
		}

		public function getCityId(){
			return $this->cityId;
		}

		public function setCityId($cityId){
			$this->cityId = $cityId;
		}

		public function getPassword(){
			return $this->password;
		}

		public function setPassword($password){
			$this->password = $password;
		}

		public function getStatus(){
			return $this->status;
		}

		public function setStatus($status){
			$this->status = $status;
		}

		public function getCity(){
			return $this->city;
		}

		public function setCity($city){
			$this->city = $city;
		}
		
		public function __construct($id, $name, $mobile, $whatsappNo, $email, $createDateTime, $address, $pincode, $role, $cityId, $password, $status){
			$this->id = $id;
			$this->name = $name;
			$this->mobile = $mobile;
			$this->whatsappNo = $whatsappNo;
			$this->email = $email;
			$this->createDateTime = $createDateTime;
			$this->address = $address;
			$this->pincode = $pincode;
			$this->role = $role;
			$this->cityId = $cityId;
			$this->password = $password;
			$this->status = $status;
		}
	}

?>