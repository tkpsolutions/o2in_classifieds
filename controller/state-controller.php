<?php
include("state-model.php");
class StateController {

    public function createObjects($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);

        $states = array();
        $countryIds = "0";

        while ($row = mysqli_fetch_array($rows)) {
            $state = new State($row['id'], $row['countryId'], $row['name'], $row['status']);
            array_push($states, $state);
            $countryIds = $countryIds."," . $row['countryId'];
        }

        if (!empty($states)) {
            $countryController = new CountryController();
            $countries = $countryController->getByIds($countryIds);

            foreach ($states as $state) {
                foreach ($countries as $country) {
                    if ($state->getCountryId() == $country->getId()) {
                        $state->setCountry($country);
                    }
                }
            }
        }

        return $states;
    }

    public function createObject($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);

        $state = null;
        $countryIds = "0";

        while ($row = mysqli_fetch_array($rows)) {
            $state = new State( $row['id'], $row['countryId'], $row['name'], $row['status']);
            $countryIds = $countryIds."," . $row['countryId'];
        }

        if ($state !== null) {
            $countryController = new CountryController();
            $countries = $countryController->getByIds($countryIds);

            foreach ($countries as $country) {
                if ($state->getCountryId() == $country->getId()) {
                    $state->setCountry($country);
                }
            }
        }

        return $state;
    }

    public function getAll($status) {
        $query = "SELECT * FROM state";
		if( $status != null )
		{
			$query = $query . " where status = '" . $status . "'";
		}
        $stateController = new StateController();
        return $stateController->createObjects($query);
    }

    public function getByStatus($status) {
        $query = "SELECT * FROM state WHERE status = '$status'";
        $stateController = new StateController();
        return $stateController->createObjects($query);
    }

    public function getById($id) {
        $query = "SELECT * FROM state WHERE id = $id";
        $stateController = new StateController();
        return $stateController->createObject($query);
    }

    public function getByIds($ids) {
        $query = "SELECT * FROM state WHERE id IN ($ids)";
        $stateController = new StateController();
        return $stateController->createObjects($query);
    }
	
	public function getByName($name) {
        $query = "SELECT * FROM state WHERE name = '" . $name . "'";
        $stateController = new StateController();
        return $stateController->createObject($query);
    }
	
	public function getByNameCountryId($name,$countryId) {
        $query = "SELECT * FROM state WHERE name = '" . $name . "' and countryId = '" . $countryId . "'";
        $stateController = new StateController();
        return $stateController->createObject($query);
    }
	
    public function add($state) {
        include('db_connection.php');
        $query = "INSERT INTO state (id, countryId, name,  status) VALUES ('" . $state->getId() . "', '" . $state->getCountryId() . "', '" . $state->getName() . "',  '" . $state->getStatus() . "')";
        mysqli_query($db_connection, $query);
        return mysqli_insert_id($db_connection);
    }

    public function update($state) {
        include('db_connection.php');
        $query = "UPDATE state SET countryId = '" . $state->getCountryId() . "', name = '" . $state->getName() . "', status = '" . $state->getStatus() . "' WHERE id = " . $state->getId();
        return mysqli_query($db_connection, $query);
    }
	
	
    public function deleteById($state) {
        include('db_connection.php');
        $query = "DELETE FROM state WHERE id = " . $state->getId();
        return mysqli_query($db_connection, $query);
    }
}

?>