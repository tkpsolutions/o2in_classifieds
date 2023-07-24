<?php
include("business-detail-model.php");

class BusinessDetailController {
    public function createObjects($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);
    
        $businessDetails = array();
        $businessIds = "0";
    
        while ($row = mysqli_fetch_array($rows)) {
            $businessDetail = new BusinessDetail($row['id'], $row['businessId'], $row['descriptionLong'], $row['logo'], $row['banner'], $row['addressLine1'], $row['addressLine2'], $row['pincode'], $row['lat'], $row['lng'], $row['createdDateTime'], $row['updateDateTime'], $row['status']);
            array_push($businessDetails, $businessDetail);
            $businessIds = $businessIds . "," . $row['businessId'];
        }
    
        if (sizeof($businessDetails)) {
            $businessController = new BusinessController();
            $businesses = $businessController->getByIds($businessIds);
    
            foreach ($businessDetails as $businessDetail) {
                foreach ($businesses as $business) {
                    if ($businessDetail->getBusinessId() == $business->getId()) {
                        $businessDetail->setBusiness($business);
                    }
                }
            }
        }
    
        return $businessDetails;
    }
    
    public function createObject($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);
    
        $businessDetail = null;
        $businessIds = "0";
    
        while ($row = mysqli_fetch_array($rows)) {
            $businessDetail = new BusinessDetail($row['id'], $row['businessId'], $row['descriptionLong'], $row['logo'], $row['banner'], $row['addressLine1'], $row['addressLine2'], $row['pincode'], $row['lat'], $row['lng'], $row['createdDateTime'], $row['updateDateTime'], $row['status']);
            $businessIds = $businessIds . "," . $row['businessId'];
        }
    
        if ($businessDetail !== null) {
            $businessController = new BusinessController();
            $businesses = $businessController->getByIds($businessIds);
    
            foreach ($businesses as $business) {
                if ($businessDetail->getBusinessId() == $business->getId()) {
                    $businessDetail->setBusiness($business);
                }
            }
        }
    
        return $businessDetail;
    }
    
    public function getAll() {
        $query = "SELECT * FROM business_detail";
        $businessDetailController = new BusinessDetailController();
        return $businessDetailController->createObjects($query);
    }
    
    public function getByStatus($status) {
        $query = "SELECT * FROM business_detail WHERE status = '$status'";
        $businessDetailController = new BusinessDetailController();
        return $businessDetailController->createObjects($query);
    }
    
    public function getById($id) {
        $query = "SELECT * FROM business_detail WHERE id = $id";
        $businessDetailController = new BusinessDetailController();
        return $businessDetailController->createObject($query);
    }
    
    public function getByIds($ids) {
        $query = "SELECT * FROM business_detail WHERE id IN ($ids)";
        $businessDetailController = new BusinessDetailController();
        return $businessDetailController->createObjects($query);
    }

    public function getByBusinessId($businessId) {
        $query = "SELECT * FROM business_detail WHERE businessId = $businessId";
        $businessDetailController = new BusinessDetailController();
        return $businessDetailController->createObject($query);
    }

    public function getByBusinessIds($businessIds) {
        $query = "SELECT * FROM business_detail WHERE businessId in ($businessIds)";
        $businessDetailController = new BusinessDetailController();
        return $businessDetailController->createObjects($query);
    }

    public function add($businessDetail) {
        include('db_connection.php');
        $query = "INSERT INTO business_detail (id, businessId, descriptionLong, logo, banner, addressLine1, addressLine2, pincode,lat, lng, createdDateTime, updateDateTime, status) VALUES ('" . $businessDetail->getId() . "', '" . $businessDetail->getBusinessId() . "', '" . $businessDetail->getDescriptionLong() . "', '" . $businessDetail->getLogo() . "', '" . $businessDetail->getBanner() . "', '" . $businessDetail->getAddressLine1() . "', '" . $businessDetail->getAddressLine2() . "', '" . $businessDetail->getPincode() .  "', '" . $businessDetail->getLat() .  "','" . $businessDetail->getLng() .  "', NOW(), NOW(), '"  . $businessDetail->getStatus() . "')";
        mysqli_query($db_connection, $query);
        return mysqli_insert_id($db_connection);
    }
    
    public function update($businessDetail) {
        include('db_connection.php');
        $query = "UPDATE business_detail SET businessId = '" . $businessDetail->getBusinessId() . "', descriptionLong = '" . $businessDetail->getDescriptionLong() . "', logo = '" . $businessDetail->getLogo() . "', banner = '" . $businessDetail->getBanner() . "', addressLine1 = '" . $businessDetail->getAddressLine1() . "', addressLine2 = '" . $businessDetail->getAddressLine2() . "', pincode = '" . $businessDetail->getPincode() . "', lat = '" . $businessDetail->getLat() . "', lng = '" . $businessDetail->getLng() . "', updateDateTime = NOW(), status = '" . $businessDetail->getStatus() . "' WHERE id = " . $businessDetail->getId();
        return mysqli_query($db_connection, $query);
    }

    public function updateLogo($businessDetail) {
        include('db_connection.php');
        $query = "UPDATE business_detail SET  `logo` = '" . $businessDetail->getLogo() . "' WHERE id = " . $businessDetail->getId();
        return mysqli_query($db_connection, $query);
    }
	
	public function updateBanner($businessDetail) {
        include('db_connection.php');
        $query = "UPDATE business_detail SET  `banner` = '" . $businessDetail->getBanner() . "' WHERE id = " . $businessDetail->getId();
        return mysqli_query($db_connection, $query);
    }
    
    public function deleteById($businessDetail) {
        include('db_connection.php');
        $query = "DELETE FROM business_detail WHERE id = " . $businessDetail->getId();
        return mysqli_query($db_connection, $query);
    }
}
?>
