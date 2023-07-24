<?php
include("business-image-model.php");

class BusinessImageController {
    public function createObjects($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);
    
        $businessImages = array();
        $businessIds = "0";
    
        while ($row = mysqli_fetch_array($rows)) {
            $businessImage = new BusinessImage($row['id'], $row['businessId'], $row['image'], $row['caption'], $row['createdDateTime'], $row['updatedDateTime'], $row['status']);
            array_push($businessImages, $businessImage);
            $businessIds = $businessIds . "," . $row['businessId'];
        }
    
        if (sizeof($businessImages)) {
            $businessController = new BusinessController();
            $businesses = $businessController->getByIds($businessIds);
    
            foreach ($businessImages as $businessImage) {
                foreach ($businesses as $business) {
                    if ($businessImage->getBusinessId() == $business->getId()) {
                        $businessImage->setBusiness($business);
                    }
                }
            }
        }
    
        return $businessImages;
    }
    
    public function createObject($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);
    
        $businessImage = null;
        $businessIds = "0";
    
        while ($row = mysqli_fetch_array($rows)) {
            $businessImage = new BusinessImage($row['id'], $row['businessId'], $row['image'], $row['caption'], $row['createdDateTime'], $row['updatedDateTime'], $row['status']);
            $businessIds = $businessIds . "," . $row['businessId'];
        }
    
        if ($businessImage !== null) {
            $businessController = new BusinessController();
            $businesses = $businessController->getByIds($businessIds);
    
            foreach ($businesses as $business) {
                if ($businessImage->getBusinessId() == $business->getId()) {
                    $businessImage->setBusiness($business);
                }
            }
        }
    
        return $businessImage;
    }
    
    public function getAll() {
        $query = "SELECT * FROM business_image";
        $businessImageController = new BusinessImageController();
        return $businessImageController->createObjects($query);
    }
    
    public function getByStatus($status) {
        $query = "SELECT * FROM business_image WHERE status = '$status'";
        $businessImageController = new BusinessImageController();
        return $businessImageController->createObjects($query);
    }
    
    public function getById($id) {
        $query = "SELECT * FROM business_image WHERE id = $id";
        $businessImageController = new BusinessImageController();
        return $businessImageController->createObject($query);
    }
    
    public function getByIds($ids) {
        $query = "SELECT * FROM business_image WHERE id IN ($ids)";
        $businessImageController = new BusinessImageController();
        return $businessImageController->createObjects($query);
    }
    public function getByBusinessId($businessId) {
        $query = "SELECT * FROM business_image WHERE businessId = $businessId";
        $businessImageController = new BusinessImageController();
        return $businessImageController->createObjects($query);
    }

    public function add($businessImage) {
        include('db_connection.php');
        $query = "INSERT INTO business_image (id, businessId, image, caption, createdDateTime, updatedDateTime, status) VALUES ('" . $businessImage->getId() . "', '" . $businessImage->getBusinessId() . "', '" . $businessImage->getImage() . "', '" . $businessImage->getCaption() . "', NOW(), NOW(), '" . $businessImage->getStatus() . "')";
        mysqli_query($db_connection, $query);
        return mysqli_insert_id($db_connection);
    }
    
    public function update($businessImage) {
        include('db_connection.php');
        $query = "UPDATE business_image SET businessId = '" . $businessImage->getBusinessId() . "', image = '" . $businessImage->getImage() . "', caption = '" . $businessImage->getCaption() . "', updatedDateTime = NOW(), status = '" . $businessImage->getStatus() . "' WHERE id = " . $businessImage->getId();
        return mysqli_query($db_connection, $query);
    }
    
    public function deleteById($businessImage) {
        include('db_connection.php');
        $query = "DELETE FROM business_image WHERE id = " . $businessImage->getId();
        return mysqli_query($db_connection, $query);
    }
}
?>