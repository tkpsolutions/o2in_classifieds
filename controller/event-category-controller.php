<?php
include("event-category-model.php");

class EventCategoryController {
    public function createObjects($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);
    
        $eventCategories = array();
    
        while ($row = mysqli_fetch_array($rows)) {
            $eventCategory = new EventCategory($row['id'], $row['name'],$row['image'],$row['status']);
            array_push($eventCategories, $eventCategory);
        }
    
        return $eventCategories;
    }
    
    public function createObject($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);
    
        $eventCategory = null;
    
        while ($row = mysqli_fetch_array($rows)) {
            $eventCategory = new EventCategory($row['id'], $row['name'], $row['image'], $row['status']);
        }
    
        return $eventCategory;
    }
    
    public function getAll() {
        $query = "SELECT * FROM event_category";
        $eventCategoryController = new EventCategoryController();
        return $eventCategoryController->createObjects($query);
    }
    
    public function getById($id) {
        $query = "SELECT * FROM event_category WHERE id = $id";
        $eventCategoryController = new EventCategoryController();
        return $eventCategoryController->createObject($query);
    }
    
    public function getByIds($ids) {
        $query = "SELECT * FROM event_category WHERE id IN ($ids)";
        $eventCategoryController = new EventCategoryController();
        return $eventCategoryController->createObjects($query);
    }
    public function getByName($name) {
        $query = "SELECT * FROM event_category WHERE name = '" . $name . "'";
        $eventCategoryController = new EventCategoryController();
        return $eventCategoryController->createObject($query);
    }

    public function add($eventCategory) {
        include('db_connection.php');
        $query = "INSERT INTO event_category (id, name, image, status) VALUES ('" . $eventCategory->getId() . "', '" . $eventCategory->getName() . "', '" . $eventCategory->getImage() . "','" . $eventCategory->getStatus() . "')";
        mysqli_query($db_connection, $query);
        return mysqli_insert_id($db_connection);
    }
    
    public function update($eventCategory) {
        include('db_connection.php');
        $query = "UPDATE event_category SET name = '" . $eventCategory->getName() . "', image = '" . $eventCategory->getImage() . "', status = '" . $eventCategory->getStatus() . "' WHERE id = " . $eventCategory->getId();
        return mysqli_query($db_connection, $query);
    }
    
    public function deleteById($eventCategory) {
        include('db_connection.php');
        $query = "DELETE FROM event_category WHERE id = " . $eventCategory->getId();
        return mysqli_query($db_connection, $query);
    }
}
?>
