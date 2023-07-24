<?php
include('category-model.php');

class CategoryController {
    public function createObjects($query) {
        include('db_connection.php');
        $rows = mysqli_query($db_connection, $query);

        $categories = array();

        while ($row = mysqli_fetch_array($rows)) {
            $category = new Category($row['id'], $row['name'], $row['image'], $row['isBooking'], $row['isGallery'], $row['isProduct'], $row['isRide'], $row['isFeedback'], $row['contactCount'], $row['status']);
            array_push($categories, $category);
        }

        return $categories;
    }

    public function createObject($query) {
        include('db_connection.php');
        $rows = mysqli_query($db_connection, $query);

        $category = null;

        while ($row = mysqli_fetch_array($rows)) {
            $category = new Category($row['id'], $row['name'], $row['image'], $row['isBooking'], $row['isGallery'], $row['isProduct'], $row['isRide'], $row['isFeedback'], $row['contactCount'], $row['status']);
        }

        return $category;
    }

   

    public function getAll() {
        $query = "SELECT * FROM category";
        $categoryController = new CategoryController();
        return $categoryController->createObjects($query);
    }

    public function getById($id) {
        $query = "SELECT * FROM `category` WHERE id = " . $id;
        $categoryController = new CategoryController();
        return $categoryController->createObject($query);
    }

    public function getByIds($ids) {
        $query = "SELECT * FROM `category` WHERE id IN ($ids)";
        $categoryController = new CategoryController();
        return $categoryController->createObjects($query);
    }

    public function getByName($name) {
        $query = "SELECT * FROM `category` WHERE name = '" . $name . "'";
        $categoryController = new CategoryController();
        return $categoryController->createObject($query);
    }

    public function getByStatus($status) {
        $query = "SELECT * FROM `category` WHERE status = '" . $status . "'";
        $categoryController = new CategoryController();
        return $categoryController->createObjects($query);
    }
    
    public function getByLimit($start, $count, $status) {
        $query = "SELECT * FROM `category`";
        if( $status != null ){
            $query = $query . " where status = '$status' ";
        }
        $query = $query . " limit $start, $count";
        $categoryController = new CategoryController();
        return $categoryController->createObjects($query);
    }

    
    public function add($category) {
        include('db_connection.php');
        $query = "INSERT INTO `category`(`name`, `image`, `isBooking`, `isGallery`, `isProduct`, `isRide`, `isFeedback`, `contactCount`, `status`) VALUES ('" . $category->getName() . "', '" . $category->getImage() . "', '" . $category->getIsBooking() . "', '" . $category->getIsGallery() . "', '" . $category->getIsProduct() . "', '" . $category->getIsRide() . "', '" . $category->getIsFeedback() . "', '" . $category->getContactCount() . "','" . $category->getStatus() . "')";
        mysqli_query($db_connection, $query);
        return mysqli_insert_id($db_connection);
    }

    public function update($category) {
        include('db_connection.php');
        $query = "UPDATE `category` SET `name`='" . $category->getName() . "', `image`='" . $category->getImage() . "', `isBooking`='" . $category->getIsBooking() . "', `isGallery`='" . $category->getIsGallery() . "', `isProduct`='" . $category->getIsProduct() . "', `isRide`='" . $category->getIsRide() . "', `isFeedback`='" . $category->getIsFeedback() . "', `contactCount`='" . $category->getContactCount() . "',`status`='" . $category->getStatus() . "' WHERE id = " . $category->getId();
        return mysqli_query($db_connection, $query);
    }

    public function delete($id) {
        include('db_connection.php');
        $query = "DELETE FROM `category` WHERE `id` = '$id'";
        return mysqli_query($db_connection, $query);
    }
    

    
}
