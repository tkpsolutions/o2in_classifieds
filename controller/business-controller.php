<?php
include("business-model.php");

class BusinessController {
    public function createObjects($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);

        $businesses = array();
        $userIds = "0";
        $cityIds = "0";
        $categoryIds = "0";
        

        while ($row = mysqli_fetch_array($rows)) {
            $business = new Business($row['id'], $row['name'], $row['descriptionShort'], $row['userId'], $row['cityId'], $row['categoryId'], $row['createdDateTime'], $row['updatedDateTime'], $row['mobile'], $row['password'], $row['status']);
            array_push($businesses, $business);
            $userIds = $userIds . "," . $row['userId'];
            $cityIds = $cityIds . "," . $row['cityId'];
            $categoryIds = $categoryIds . "," . $row['categoryId'];
            
        }

        if (sizeof($businesses)) {

            $userController = new UserController();
            $users = $userController->getByIds($userIds);

            $cityController = new CityController();
            $citys = $cityController->getByIds($cityIds);

            $categoryController = new CategoryController();
            $categories = $categoryController->getByIds($categoryIds);

            

            foreach ($businesses as $business) {
                foreach ($users as $user) {
                    if ($business->getUserId() == $user->getId()) {
                        $business->setUser($user);
                    }
                }
                foreach ($citys as $city) {
                    if ($business->getCityId() == $city->getId()) {
                        $business->setCity($city);
                    }
                }
                foreach ($categories as $category) {
                    if ($business->getcategoryId() == $category->getId()) {
                        $business->setcategory($category);
                    }
                }
                
            }
        }

        return $businesses;
    }

    public function createObject($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);
        $business = null;
        $userIds = "0";
        $cityIds = "0";
        $categoryIds = "0";


        while ($row = mysqli_fetch_array($rows)) {
            $business = new Business($row['id'], $row['name'], $row['descriptionShort'],$row['userId'], $row['cityId'], $row['categoryId'], $row['createdDateTime'], $row['updatedDateTime'], $row['mobile'], $row['password'], $row['status']);
            $userIds = $userIds . "," . $row['userId'];
            $cityIds = $cityIds . "," . $row['cityId'];
            $categoryIds = $categoryIds . "," . $row['categoryId'];
           
        }

        if ($business != null) {
            $userController = new UserController();
            $users = $userController->getByIds($userIds);

            $cityController = new CityController();
            $citys = $cityController->getByIds($cityIds);

            $categoryController = new CategoryController();
            $categories = $categoryController->getByIds($categoryIds);
            

            foreach ($users as $user) {
                if ($business->getUserId() == $user->getId()) {
                    $business->setUser($user);
                }
            }

            foreach ($citys as $city) {
                if ($business->getCityId() == $city->getId()) {
                    $business->setCity($city);
                }
            }
            foreach ($categories as $category) {
                if ($business->getCategoryId() == $category->getId()) {
                    $business->setCategory($category);
                }
            }
           
        }

        return $business;
    }

    public function getAll() {
        $query = "SELECT * FROM business";
        $businessController = new BusinessController();
        return $businessController->createObjects($query);
    }

    public function getByName($name) {
        $query = "SELECT * FROM business WHERE name = '$name'";
        $businessController = new BusinessController();
        return $businessController->createObjects($query);
    }

    public function getByUserId($userId) {
        $query = "SELECT * FROM business WHERE userId = $userId";
        $businessController = new BusinessController();
        return $businessController->createObjects($query);
    }

    public function getByCityId($cityId) {
        $query = "SELECT * FROM business WHERE cityId = $cityId";
        $businessController = new BusinessController();
        return $businessController->createObjects($query);
    }

    public function getByCategoryId($categoryId) {
        $query = "SELECT * FROM business WHERE categoryId = $categoryId";
        $businessController = new BusinessController();
        return $businessController->createObjects($query);
    }

    public function getByCityIdCategoryId($status, $cityId, $categoryId) {
        $query = "SELECT * FROM business WHERE id > 0";
        if( $status != null ){
            $query = $query . " and status = '$status' ";
        }
        if( $cityId != 0 ){
            $query = $query . " and cityId = $cityId ";
        }
        if( $categoryId != 0 ){
            $query = $query . " and categoryId = $categoryId ";
        }
        $businessController = new BusinessController();
        return $businessController->createObjects($query);
    }

   public function getById($id) {
        $query = "SELECT * FROM business WHERE id = $id";
        $businessController = new BusinessController();
        return $businessController->createObject($query);
    }

    public function getByIds($ids) {
        $query = "SELECT * FROM business WHERE id IN ($ids)";
        $businessController = new BusinessController();
        return $businessController->createObjects($query);
    }

    public function getByStatus($status) {
        $query = "SELECT * FROM business WHERE status = '$status'";
        $businessController = new BusinessController();
        return $businessController->createObjects($query);
    }

    public function getByLimit($status, $start, $count) {
        $query = "SELECT * FROM business";
        if( $status != null ){
            $query = $query . " where status = '$status' ";
        }
        $query = $query . " order by createdDateTime";
        $query = $query . " limit $start, $count";
        $businessController = new BusinessController();
        return $businessController->createObjects($query);
    }

    public function getByMobile($mobile)
    {
        include('db_connection.php');
        $query="SELECT * from `business` where mobile = '" . $mobile . "'";
        $businessController = new BusinessController();
        $business = $businessController->createObject($query);
        return $business;
    } 
    
    public function getCountCityWise() {
        $query = "SELECT count(*) as id, name, descriptionShort, userId, cityId, categoryId, createdDateTime, updatedDateTime, mobile, password, status FROM `business` where status = 'active' GROUP by cityId;";
        $businessController = new BusinessController();
        return $businessController->createObjects($query);
    }

    public function getCountCategoryWise() {
        $query = "SELECT count(*) as id, name, descriptionShort, userId, cityId, categoryId, createdDateTime, updatedDateTime, mobile, password, status FROM `business` where status = 'active' GROUP by categoryId;";
        $businessController = new BusinessController();
        return $businessController->createObjects($query);
    }
   
    public function add($business) {
        include('db_connection.php');
        $query = "INSERT INTO `business` ( `name`, `descriptionShort`,`userId`,`cityId`,`categoryId`,`createdDateTime`, `updatedDateTime`,`mobile`,`password`,`status`) VALUES ('" . $business->getName() . "', '" . $business->getDescriptionShort() . "', '" . $business->getUserId() . "','" . $business->getCityId() . "','" . $business->getCategoryId() . "',NOW(), NOW(),'" . $business->getMobile() . "','" . $business->getPassword() . "','" . $business->getStatus() . "')";
            
        mysqli_query($db_connection, $query);
        return mysqli_insert_id($db_connection);
    }

    public function update($business) {
        include('db_connection.php');
        $query = "UPDATE `business` SET `name` = '" . $business->getName() . "', `descriptionShort` = '" . $business->getDescriptionShort() . "',`userId` = '" . $business->getUserId() . "', `cityId` = '" . $business->getCityId() . "', `categoryId` = '" . $business->getCategoryId() . "', `mobile` = '" . $business->getMobile() . "', `status` = '" . $business->getStatus() . "',  updatedDateTime = NOW() WHERE id = " . $business->getId();
        return mysqli_query($db_connection, $query);
    }

    public function updatePassword($business) {
        include('db_connection.php');
        $query = "UPDATE `business` SET `password` = '" . $business->getPassword() . "',  updatedDateTime = NOW() WHERE id = " . $business->getId();
        return mysqli_query($db_connection, $query);
    }

    public function delete($business) {
        include('db_connection.php');
        $query = "DELETE FROM business WHERE id = " . $business->getId();
        return mysqli_query($db_connection, $query);
    }
}
?>