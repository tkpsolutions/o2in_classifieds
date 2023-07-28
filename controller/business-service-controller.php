<?php
include("business-service-model.php");

class BusinessServiceController {
    public function createObjects($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);

        $businessServices = array();
        $businessIds = "0";

        while ($row = mysqli_fetch_array($rows)) {
            $businessService = new BusinessService($row['id'], $row['businessId'], $row['name'], $row['price'], $row['tax'], $row['discount'], $row['status']);
            array_push($businessServices, $businessService);
            $businessIds = $businessIds . "," . $row['businessId'];
        }

        if (sizeof($businessServices)) {
            $businessController = new BusinessController();
            $businesses = $businessController->getByIds($businessIds);

            foreach ($businessServices as $businessService) {
                foreach ($businesses as $business) {
                    if ($businessService->getBusinessId() == $business->getId()) {
                        $businessService->setBusiness($business);
                    }
                }
            }
        }

        return $businessServices;
    }

    public function createObject($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);

        $businessService = null;
        $businessIds = "0";

        while ($row = mysqli_fetch_array($rows)) {
            $businessService = new BusinessService($row['id'], $row['businessId'], $row['name'], $row['price'], $row['tax'], $row['discount'], $row['status']);
           $businessIds = $businessIds . "," . $row['businessId'];
        }

        if ($businessService !== null) {
            $businessController = new BusinessController();
            $businesses = $businessController->getByIds($businessIds);

            foreach ($businesses as $business) {
                if ($businessService->getBusinessId() == $business->getId()) {
                    $businessService->setBusiness($business);
                }
            }
        }

        return $businessService;
    }

    public function getAll() {
        $query = "SELECT * FROM business_service";
        $businessServiceController = new BusinessServiceController();
        return $businessServiceController->createObjects($query);
    }

    public function getByStatus($status) {
        $query = "SELECT * FROM business_service WHERE status = '$status'";
        $businessServiceController = new BusinessServiceController();
        return $businessServiceController->createObjects($query);
    }

    public function getById($id) {
        $query = "SELECT * FROM business_service WHERE id = $id";
        $businessServiceController = new BusinessServiceController();
        return $businessServiceController->createObject($query);
    }

    public function getByIds($ids) {
        $query = "SELECT * FROM business_service WHERE id IN ($ids)";
        $businessServiceController = new BusinessServiceController();
        return $businessServiceController->createObjects($query);
    }
    public function getByName($name){
		$query = "SELECT * FROM business_service WHERE name = '" . $name . "'";
		$businessServiceController = new BusinessServiceController();
		return $businessServiceController->createObject($query);
	}
	
    public function getByBusinessId($businessId) {
        $query = "SELECT * FROM business_service WHERE businessId = $businessId";
        $businessServiceController = new BusinessServiceController();
        return $businessServiceController->createObjects($query);
    }
    public function add($businessService) {
        include('db_connection.php');
        $query = "INSERT INTO business_service ( `businessId`, `name`, `price`, `tax`, `discount`, `status`) VALUES ( '" . $businessService->getBusinessId() . "', '" . $businessService->getName() . "', '" . $businessService->getPrice() . "', '" . $businessService->getTax() . "','" . $businessService->getDiscount() . "', '" . $businessService->getStatus() . "')";
        mysqli_query($db_connection, $query);
        return mysqli_insert_id($db_connection);
    }

    public function update($businessService) {
        include('db_connection.php');
        $query = "UPDATE business_service SET businessId = '" . $businessService->getBusinessId() . "', name = '" . $businessService->getName() . "', price = '" . $businessService->getPrice() . "', tax = '" . $businessService->getTax() . "', discount = '" . $businessService->getDiscount() . "', status = '" . $businessService->getStatus() . "' WHERE id = " . $businessService->getId();
        return mysqli_query($db_connection, $query);
    }

    public function deleteById($businessServiceId) {
        include('db_connection.php');
        $query = "DELETE FROM business_service WHERE id = " . $businessServiceId;
        return mysqli_query($db_connection, $query);
    }
}
?>