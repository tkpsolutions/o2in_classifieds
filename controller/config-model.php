<?php
class Config
{
	private $id;	
	private $name;
	private $value;
	private $status;

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

	public function getValue(){
		return $this->value;
	}

	public function setValue($value){
		$this->value = $value;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setStatus($status){
		$this->status = $status;
	}

	function __construct($id, $name, $value, $status)
	{
		$this->id = $id;
		$this->name = $name;
		$this->value = $value;
		$this->status = $status;

	}
}

?>
