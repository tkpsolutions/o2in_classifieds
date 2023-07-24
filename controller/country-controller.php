<?php
include('country-model.php');

class CountryController {
    public function createObjects($query) {
        include('db_connection.php');
        $rows = mysqli_query($db_connection, $query);

        $countries = array();

        while ($row = mysqli_fetch_array($rows)) {
            $country = new Country($row['id'], $row['name'], $row['status']);
            array_push($countries, $country);
        }

        return $countries;
    }

    public function createObject($query) {
        include('db_connection.php');
        $rows = mysqli_query($db_connection, $query);

        $country = null;

        while ($row = mysqli_fetch_array($rows)) {
            $country = new Country($row['id'], $row['name'], $row['status']);
        }

        return $country;
    }

    public function add($country) {
        include('db_connection.php');
        $query = "INSERT INTO `country`(`name`, `status`) VALUES ('" . $country->getName() . "','" . $country->getStatus() . "')";
        mysqli_query($db_connection, $query);
        return mysqli_insert_id($db_connection);
    }

    public function update($country) {
        include('db_connection.php');
        $query = "UPDATE `country` SET `name`='" . $country->getName() . "', `status`='" . $country->getStatus() . "' WHERE id = " . $country->getId();
        return mysqli_query($db_connection, $query);
    }

    public function deleteById($id) {
        include('db_connection.php');
        $query = "DELETE FROM `country` WHERE `id` = '$id'";
        return mysqli_query($db_connection, $query);
    }

    public function getAll() {
        $query = "SELECT * FROM `country`";
        $countryController = new CountryController();
        return $countryController->createObjects($query);
    }

    public function getById($id) {
        $query = "SELECT * FROM `country` WHERE id = " . $id;
        $countryController = new CountryController();
        return $countryController->createObject($query);
    }

    public function getByIds($ids) {
        $query = "SELECT * FROM `country` WHERE id IN ($ids)";
        $countryController = new CountryController();
        return $countryController->createObjects($query);
    }

    public function getByStatus($status) {
        $query = "SELECT * FROM `country` WHERE status = '" . $status . "'";
        $countryController = new CountryController();
        return $countryController->createObjects($query);
    }

    public function getByName($name) {
        $query = "SELECT * FROM `country` WHERE name = '" . $name . "'";
        $countryController = new CountryController();
        return $countryController->createObject($query);
    }

    
}
?>
