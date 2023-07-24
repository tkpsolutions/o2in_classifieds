<?php
include('contact-type-model.php');

class ContactTypeController {
	public function createObjects($query) {
        include('db_connection.php');
        $rows = mysqli_query($db_connection, $query);

        $contactTypes = array();

        while ($row = mysqli_fetch_array($rows)) {
            $contactType = new ContactType($row['id'], $row['name'], $row['image'], $row['status']);
            array_push($contactTypes, $contactType);
        }

        return $contactTypes;
    }

    public function createObject($query) {
        include('db_connection.php');
        $rows = mysqli_query($db_connection, $query);

        $contactType = null;

        while ($row = mysqli_fetch_array($rows)) {
            $contactType = new ContactType($row['id'], $row['name'], $row['image'],$row['status']);
        }

        return $contactType;
    }

    

    public function getAll() {
        $query = "SELECT * FROM `contact_type`";
        $contactTypeController = new ContactTypeController();
        return $contactTypeController->createObjects($query);
    }

    public function getById($id) {
        $query = "SELECT * FROM `contact_type` WHERE id = " . $id;
        $contactTypeController = new ContactTypeController();
        return $contactTypeController->createObject($query);
    }

    public function getByIds($ids) {
        $query = "SELECT * FROM `contact_type` WHERE id IN ($ids)";
        $contactTypeController = new ContactTypeController();
        return $contactTypeController->createObjects($query);
    }

    public function getByStatus($status) {
        $query = "SELECT * FROM `contact_type` WHERE status = '" . $status . "'";
        $contactTypeController = new ContactTypeController();
        return $contactTypeController->createObjects($query);
    }

    public function getByName($name) {
        $query = "SELECT * FROM `contact_type` WHERE name = '" . $name . "'";
        $contactTypeController = new ContactTypeController();
        return $contactTypeController->createObject($query);
    }

    public function add($contactType) {
        include('db_connection.php');
        $query = "INSERT INTO `contact_type`(`name`,`image`, `status`) VALUES ('" . $contactType->getName() . "', '" . $contactType->getImage() . "','" . $contactType->getStatus() . "')";
        mysqli_query($db_connection, $query);
        return mysqli_insert_id($db_connection);
    }

    public function update($contactType) {
        include('db_connection.php');
        $query = "UPDATE `contact_type` SET `name`='" . $contactType->getName() . "', `image`='" . $contactType->getImage() . "', `status`='" . $contactType->getStatus() . "' WHERE id = " . $contactType->getId();
        return mysqli_query($db_connection, $query);
    }

    public function delete($id) {
        include('db_connection.php');
        $query = "DELETE FROM `contact_type` WHERE `id` = '$id'";
        return mysqli_query($db_connection, $query);
    }
}
?>