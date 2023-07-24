<?php
include('gender-model.php');
class GenderController
{

	public function createObjects($query){
		include('db_connection.php');
		$rows = mysqli_query($db_connection, $query);

		//convert this rows into object or references of the model
		$genders = array(); // i am creating an empty array to store all the gender objects

		while( $row = mysqli_fetch_array($rows) ){
			$gender = new Gender( $row['id'], $row['name'], $row['status'] );
			array_push($genders, $gender);
		}

		return $genders;
	}

	public function createObject($query){
		include('db_connection.php');
		$rows = mysqli_query($db_connection, $query);

		//convert this rows into object or references of the model
		$gender = null; // i am creating an empty array to store all the gender objects

		while( $row = mysqli_fetch_array($rows) ){
			$gender = new Gender( $row['id'], $row['name'], $row['status'] );
		}
		return $gender;
	}

    //CREATE
	public function add($gender)
	{
		include('db_connection.php');
        $query = "INSERT INTO `gender`(`name`) VALUES ('" . $gender->getName() . "')";
		mysqli_query($db_connection,$query);
        return mysqli_insert_id($db_connection);
	}

	//RETRIEVE / SELECT
	public function select(){
		$query = "select * from gender";
		$genderController = new GenderController();
		return $genderController->createObjects($query);
	}

	//RETRIEVE / SELECT
	public function selectById($id){
		$query = "select * from gender where id = " . $id;
		$genderController = new GenderController();
		return $genderController->createObject($query);
	}

	//used by linkage controllers
	public function selectByIds($ids){
		$query = "select * from gender where id in (" . $ids . ")";
		$genderController = new GenderController();
		return $genderController->createObjects($query);
	}

	//RETRIEVE / SELECT
	public function selectByStatus($status){
		$query = "select * from gender where status = '" . $status . "'";
		$genderController = new GenderController();
		return $genderController->createObjects($query);
	}

	//RETRIEVE / SELECT
	public function selectByName($name){
		$query = "select * from gender where name = '" . $name . "'";
		$genderController = new GenderController();
		return $genderController->createObject($query);
	}
	
    //UPDATE
	public function update($gender)
	{
		include('db_connection.php');
		$query ="UPDATE `gender` SET `name`='" . $gender->getName() . "',`status`='" . $gender->getStatus() . "' WHERE id = " . $gender->getId();
		return mysqli_query($db_connection,$query);
	}

    //DELETE
	public function delete($gender)
	{
		include('db_connection.php');
		$query ="delete from `gender` where `id`= " . $gender->getId();
		
		return mysqli_query($db_connection,$query);
	}
	
}

?>