<?php
include("event-model.php");

class EventController {
    public function createObjects($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);
    
        $events = array();
        $eventCategoryIds = "0";
        $cityIds = "0";
    
        while ($row = mysqli_fetch_array($rows)) {
            $event = new Event($row['id'], $row['eventCategoryId'], $row['cityId'], $row['eventDate'], $row['title'], $row['description'], $row['image'], $row['address'], $row['createdDateTime'], $row['updatedDateTime'], $row['status']);
            array_push($events, $event);
            $eventCategoryIds = $eventCategoryIds . "," . $row['eventCategoryId'];
            $cityIds = $cityIds . "," . $row['cityId'];
        }
    
        if (sizeof($events)) {
            $eventCategoryController = new EventCategoryController();
            $eventCategories = $eventCategoryController->getByIds($eventCategoryIds);
    
            $cityController = new CityController();
            $cities = $cityController->getByIds($cityIds);
    
            foreach ($events as $event) {
                foreach ($eventCategories as $eventCategory) {
                    if ($event->getEventCategoryId() == $eventCategory->getId()) {
                        $event->setEventCategory($eventCategory);
                        break;
                    }
                }
    
                foreach ($cities as $city) {
                    if ($event->getCityId() == $city->getId()) {
                        $event->setCity($city);
                        break;
                    }
                }
            }
        }
    
        return $events;
    }
    
    public function createObject($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);
    
        $event = null;
        $eventCategoryIds = "0";
        $cityIds = "0";
    
        while ($row = mysqli_fetch_array($rows)) {
            $event = new Event($row['id'], $row['eventCategoryId'], $row['cityId'], $row['eventDate'], $row['title'], $row['description'], $row['image'], $row['address'], $row['createdDateTime'], $row['updatedDateTime'], $row['status']);
            $eventCategoryIds = $eventCategoryIds . "," . $row['eventCategoryId'];
            $cityIds = $cityIds . "," . $row['cityId'];
        }
    
        if ($event !== null) {
            $eventCategoryController = new EventCategoryController();
            $eventCategories = $eventCategoryController->getByIds($eventCategoryIds);
    
            $cityController = new CityController();
            $cities = $cityController->getByIds($cityIds);
    
            foreach ($eventCategories as $eventCategory) {
                if ($event->getEventCategoryId() == $eventCategory->getId()) {
                    $event->setEventCategory($eventCategory);
                    break;
                }
            }
    
            foreach ($cities as $city) {
                if ($event->getCityId() == $city->getId()) {
                    $event->setCity($city);
                    break;
                }
            }
        }
    
        return $event;
    }
    
    public function getAll() {
        $query = "SELECT * FROM events";
        $eventController = new EventController();
        return $eventController->createObjects($query);
    }
    
    public function getByStatus($status) {
        $query = "SELECT * FROM events WHERE status = '$status'";
        $eventController = new EventController();
        return $eventController->createObjects($query);
    }
    
    public function getById($id) {
        $query = "SELECT * FROM events WHERE id = $id";
        $eventController = new EventController();
        return $eventController->createObject($query);
    }
    
    public function getByIds($ids) {
        $query = "SELECT * FROM events WHERE id IN ($ids)";
        $eventController = new EventController();
        return $eventController->createObjects($query);
    }
    
    public function getByEventCategoryId($eventCategoryId) {
        $query = "SELECT * FROM events WHERE eventCategoryId = $eventCategoryId";
        $eventController = new EventController();
        return $eventController->createObjects($query);
    }
    
    public function getByCityId($cityId) {
        $query = "SELECT * FROM events WHERE cityId = $cityId";
        $eventController = new EventController();
        return $eventController->createObjects($query);
    }
    
    public function add($event) {
        include('db_connection.php');
        $query = "INSERT INTO events (id, eventCategoryId, cityId, eventDate, title, description, image, address, createdDateTime, updatedDateTime, status) VALUES ('" . $event->getId() . "', '" . $event->getEventCategoryId() . "', '" . $event->getCityId() . "', '" . $event->getEventDate() . "', '" . $event->getTitle() . "', '" . $event->getDescription() . "', '" . $event->getImage() . "', '" . $event->getAddress() . "', NOW(), NOW(), '"  . $event->getStatus() . "')";
        mysqli_query($db_connection, $query);
        return mysqli_insert_id($db_connection);
    }
    
    public function update($event) {
        include('db_connection.php');
        $query = "UPDATE events SET eventCategoryId = '" . $event->getEventCategoryId() . "', cityId = '" . $event->getCityId() . "', eventDate = '" . $event->getEventDate() . "', title = '" . $event->getTitle() . "', description = '" . $event->getDescription() . "', image = '" . $event->getImage() . "', address = '" . $event->getAddress() . "', updatedDateTime = NOW(), status = '" . $event->getStatus() . "' WHERE id = " . $event->getId();
        //echo $query;
        return mysqli_query($db_connection, $query);
    }
    
    public function deleteById($eventId) {
        include('db_connection.php');
        $query = "DELETE FROM events WHERE id = " . $eventId;
        return mysqli_query($db_connection, $query);
    }
}
?>
