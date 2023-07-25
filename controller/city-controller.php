<?php
include("city-model.php");
class CityController {

    public function createObjects($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);
    
        $citys= array();
        $stateIds = "0";
    
        while ($row = mysqli_fetch_array($rows)) {
            $city = new City($row['id'], $row['stateId'], $row['name'], $row['image'], $row['lat'], $row['lng'], $row['status']);
            array_push($citys, $city);
            $stateIds = $stateIds ."," . $row['stateId'];
        }
    
        if (sizeof($citys)) {
            $stateController = new StateController();
            $states = $stateController->getByIds($stateIds);
    
            foreach ($citys as $city) {
                foreach ($states as $state) {
                    if ($city->getStateId() == $state->getId()) {
                        $city->setState($state);
                    }
                }
            }
        }
    
        return $citys;
    }
    
    public function createObject($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);

        $city = null;
        $stateIds = "0";

        while ($row = mysqli_fetch_array($rows)) {
            $city = new City($row['id'], $row['stateId'], $row['name'], $row['image'], $row['lat'], $row['lng'], $row['status']);
            $stateIds = $stateIds ."," . $row['stateId'];
        }

        if ($city !== null) {
            $stateController = new StateController();
            $states = $stateController->getByIds($stateIds);

            foreach ($states as $state) {
                if ($city->getStateId() == $state->getId()) {
                    $city->setState($state);
                }
            }
        }

        return $city;
    }

    public function getAll() {
        $query = "SELECT * FROM city";
        $cityController = new CityController();
        return $cityController->createObjects($query);
    }

    public function getByStatus($status) {
        $query = "SELECT * FROM city WHERE status = '$status'";
        $cityController = new CityController();
        return $cityController->createObjects($query);
    }

    public function getById($id) {
        $query = "SELECT * FROM city WHERE id = $id";
        $cityController = new CityController();
        return $cityController->createObject($query);
    }

    public function getByIds($ids) {
        $query = "SELECT * FROM city WHERE id IN ($ids)";
        $cityController = new CityController();
        return $cityController->createObjects($query);
    }

    public function getByName($name){
		$query = "SELECT * FROM city WHERE name = '" . $name . "'";
		$cityController = new CityController();
		return $cityController->createObject($query);
	}
	

    public function add($city) {
        include('db_connection.php');
        $query = "INSERT INTO city (id, stateId, name,image,lat,lng, status) VALUES ('" . $city->getId() . "', '" . $city->getStateId() . "', '" . $city->getName() . "', '" . $city->getImage() . "','" . $city->getLat() . "','" . $city->getLng() . "', '" . $city->getStatus() . "')";
        mysqli_query($db_connection, $query);
        return mysqli_insert_id($db_connection);
    }

    public function update($city) {
        include('db_connection.php');
        $query = "UPDATE city SET stateId = '" . $city->getStateId() . "', name = '" . $city->getName() . "', image = '" . $city->getImage() . "', lat = '" . $city->getLat() . "', lng = '" . $city->getLng() . "', status = '" . $city->getStatus() . "' WHERE id = " . $city->getId();
        return mysqli_query($db_connection, $query);
    }

    public function deleteById($city) {
            include('db_connection.php');
            $query = "DELETE FROM city WHERE id = " . $city->getId();
            return mysqli_query($db_connection, $query);
        }
    }     
       
?>