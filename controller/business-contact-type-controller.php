<?php
include("business-contact-type-model.php");

class BusinessContactTypeController {
    public function createObjects($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);

        $businessContactTypes = array();
        $businessIds = "0";
        $contactTypeIds = "0";

        while ($row = mysqli_fetch_array($rows)) {
            $businessContactType = new BusinessContactType($row['id'], $row['businessId'], $row['contactTypeId'], $row['contact'], $row['createdDateTime'], $row['updatedDateTime'], $row['status']);
            array_push($businessContactTypes, $businessContactType);
            $businessIds = $businessIds . "," . $row['businessId'];
            $contactTypeIds = $contactTypeIds . "," . $row['contactTypeId'];
        }

        if (sizeof($businessContactTypes)) {
            $businessController = new BusinessController();
            $businesses = $businessController->getByIds($businessIds);

            $contactTypeController = new ContactTypeController();
            $contactTypes = $contactTypeController->getByIds($contactTypeIds);

            foreach ($businessContactTypes as $businessContactType) {
                foreach ($businesses as $business) {
                    if ($businessContactType->getBusinessId() == $business->getId()) {
                        $businessContactType->setBusiness($business);
                    }
                }

                foreach ($contactTypes as $contactType) {
                    if ($businessContactType->getContactTypeId() == $contactType->getId()) {
                        $businessContactType->setContactType($contactType);
                    }
                }
            }
        }

        return $businessContactTypes;
    }

    public function createObject($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);

        $businessContactType = null;
        $businessIds = "0";
        $contactTypeIds = "0";

        while ($row = mysqli_fetch_array($rows)) {
            $businessContactType = new BusinessContactType($row['id'], $row['businessId'], $row['contactTypeId'], $row['contact'], $row['createdDateTime'], $row['updatedDateTime'], $row['status']);
            $businessIds = $businessIds . "," . $row['businessId'];
            $contactTypeIds = $contactTypeIds . "," . $row['contactTypeId'];
        }

        if ($businessContactType !== null) {
            $businessController = new BusinessController();
            $businesses = $businessController->getByIds($businessIds);

            $contactTypeController = new ContactTypeController();
            $contactTypes = $contactTypeController->getByIds($contactTypeIds);
            
            foreach ($businesses as $business) {
                if ($businessContactType->getBusinessId() == $business->getId()) {
                    $businessContactType->setBusiness($business);
                }
            }
            
            foreach ($contactTypes as $contactType) {
                
                if ($businessContactType->getContactTypeId() == $contactType->getId()) {
                    $businessContactType->setContactType($contactType);
                }
            }
        }
        return $businessContactType;
    }

    public function getAll() {
        $query = "SELECT * FROM business_contact";
        $businessContactTypeController = new BusinessContactTypeController();
        return $businessContactTypeController->createObjects($query);
    }

    public function getByStatus($status) {
        $query = "SELECT * FROM business_contact WHERE status = '$status'";
        $businessContactTypeController = new BusinessContactTypeController();
        return $businessContactTypeController->createObjects($query);
    }

    public function getById($id) {
        $query = "SELECT * FROM business_contact WHERE id = $id";
        $businessContactTypeController = new BusinessContactTypeController();
        return $businessContactTypeController->createObject($query);
    }

    public function getByIds($ids) {
        $query = "SELECT * FROM business_contact WHERE id IN ($ids)";
        $businessContactTypeController = new BusinessContactTypeController();
        return $businessContactTypeController->createObjects($query);
    }

    public function getByBusinessId($businessId) {
        $query = "SELECT * FROM business_contact WHERE businessId = $businessId";
        $businessContactTypeController = new BusinessContactTypeController();
        return $businessContactTypeController->createObjects($query);
    }
    public function add($businessContactType) {
        include('db_connection.php');
        $query = "INSERT INTO business_contact (id, businessId, contactTypeId, contact, createdDateTime, updatedDateTime, status) VALUES ('" . $businessContactType->getId() . "', '" . $businessContactType->getBusinessId() . "', '" . $businessContactType->getContactTypeId() . "', '" . $businessContactType->getContact() . "', NOW(), NOW(), '" . $businessContactType->getStatus() . "')";
        mysqli_query($db_connection, $query);
        return mysqli_insert_id($db_connection);
    }

    public function update($businessContactType) {
        include('db_connection.php');
        $query = "UPDATE business_contact SET businessId = '" . $businessContactType->getBusinessId() . "', contactTypeId = '" . $businessContactType->getContactTypeId() . "', contact = '" . $businessContactType->getContact() . "', updatedDateTime = NOW(), status = '" . $businessContactType->getStatus() . "' WHERE id = " . $businessContactType->getId();
        return mysqli_query($db_connection, $query);
    }

    public function deleteById($businessContactType) {
        include('db_connection.php');
        $query = "DELETE FROM business_contact WHERE id = " . $businessContactType->getId();
        return mysqli_query($db_connection, $query);
    }
}
?>
