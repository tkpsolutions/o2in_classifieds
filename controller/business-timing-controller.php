<?php
include("business-timing-model.php");

class BusinessTimingController {
    public function createObjects($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);
    
        $businessTimings = array();
        $businessIds = "0";
    
        while ($row = mysqli_fetch_array($rows)) {
            $businessTiming = new BusinessTiming($row['id'], $row['businessId'], $row['dayNumber'], $row['fromTime'], $row['toTime'], $row['isFullday'], $row['isHoliday'], $row['status']);
            array_push($businessTimings, $businessTiming);
            $businessIds = $businessIds . "," . $row['businessId'];
        }
    
        if (sizeof($businessTimings)) {
            $businessController = new BusinessController();
            $businesses = $businessController->getByIds($businessIds);
    
            foreach ($businessTimings as $businessTiming) {
                foreach ($businesses as $business) {
                    if ($businessTiming->getBusinessId() == $business->getId()) {
                        $businessTiming->setBusiness($business);
                    }
                }
            }
        }
    
        return $businessTimings;
    }
    
    public function createObject($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);
    
        $businessTiming = null;
        $businessIds = "0";
    
        while ($row = mysqli_fetch_array($rows)) {
            $businessTiming = new BusinessTiming($row['id'], $row['businessId'], $row['dayNumber'], $row['fromTime'], $row['toTime'], $row['isFullday'], $row['isHoliday'], $row['status']);
            $businessIds = $businessIds . "," . $row['businessId'];
        }
    
        if ($businessTiming !== null) {
            $businessController = new BusinessController();
            $businesses = $businessController->getByIds($businessIds);
    
            foreach ($businesses as $business) {
                if ($businessTiming->getBusinessId() == $business->getId()) {
                    $businessTiming->setBusiness($business);
                }
            }
        }
    
        return $businessTiming;
    }
    
    public function getAll() {
        $query = "SELECT * FROM business_timing";
        $businessTimingController = new BusinessTimingController();
        return $businessTimingController->createObjects($query);
    }
    
    public function getByStatus($status) {
        $query = "SELECT * FROM business_timing WHERE status = '$status'";
        $businessTimingController = new BusinessTimingController();
        return $businessTimingController->createObjects($query);
    }
    
    public function getById($id) {
        $query = "SELECT * FROM business_timing WHERE id = $id";
        $businessTimingController = new BusinessTimingController();
        return $businessTimingController->createObject($query);
    }
    
    public function getByIds($ids) {
        $query = "SELECT * FROM business_timing WHERE id IN ($ids)";
        $businessTimingController = new BusinessTimingController();
        return $businessTimingController->createObjects($query);
    }
    
    public function getByBusinessId($businessId) {
        $query = "SELECT * FROM business_timing WHERE businessId = $businessId order by dayNumber, fromTime";
        $businessTimingController = new BusinessTimingController();
        return $businessTimingController->createObjects($query);
    }
    
    public function add($businessTiming) {
        include('db_connection.php');
        $query = "INSERT INTO business_timing (id, businessId, dayNumber, fromTime, toTime, isFullday, isHoliday, status) VALUES ('" . $businessTiming->getId() . "', '" . $businessTiming->getBusinessId() . "', '" . $businessTiming->getDayNumber() . "', '" . $businessTiming->getFromTime() . "', '" . $businessTiming->getToTime() . "', '" . $businessTiming->getIsFullday() . "', '" . $businessTiming->getIsHoliday() . "', '" . $businessTiming->getStatus() . "')";
        mysqli_query($db_connection, $query);
        return mysqli_insert_id($db_connection);
    }
    
    public function update($businessTiming) {
        include('db_connection.php');
        $query = "UPDATE business_timing SET businessId = '" . $businessTiming->getBusinessId() . "', dayNumber = '" . $businessTiming->getDayNumber() . "', fromTime = '" . $businessTiming->getFromTime() . "', toTime = '" . $businessTiming->getToTime() . "', isFullday = '" . $businessTiming->getIsFullday() . "', isHoliday = '" . $businessTiming->getIsHoliday() . "', status = '" . $businessTiming->getStatus() . "' WHERE id = " . $businessTiming->getId();
        return mysqli_query($db_connection, $query);
    }
    
    public function deleteById($businessTimingId) {
        include('db_connection.php');
        $query = "DELETE FROM business_timing WHERE id = " . $businessTimingId;
        return mysqli_query($db_connection, $query);
    }
}
?>