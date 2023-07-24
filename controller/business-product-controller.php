<?php
include("business-product-model.php");

class BusinessProductController {
    public function createObjects($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);

        $businessProducts = array();
        $businessIds = "0";

        while ($row = mysqli_fetch_array($rows)) {
            $businessProduct = new BusinessProduct($row['id'], $row['businessId'], $row['name'], $row['image'], $row['price'], $row['discountPercentage'], $row['taxPercentage'], $row['createdDateTime'], $row['updatedDateTime'], $row['status']);
            array_push($businessProducts, $businessProduct);
            $businessIds = $businessIds . "," . $row['businessId'];
        }

        if (sizeof($businessProducts)) {
            $businessController = new BusinessController();
            $businesses = $businessController->getByIds($businessIds);

            foreach ($businessProducts as $businessProduct) {
                foreach ($businesses as $business) {
                    if ($businessProduct->getBusinessId() == $business->getId()) {
                        $businessProduct->setBusiness($business);
                    }
                }
            }
        }

        return $businessProducts;
    }

    public function createObject($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);

        $businessProduct = null;
        $businessIds = "0";

        while ($row = mysqli_fetch_array($rows)) {
            $businessProduct = new BusinessProduct($row['id'], $row['businessId'], $row['name'], $row['image'], $row['price'], $row['discountPercentage'], $row['taxPercentage'], $row['createdDateTime'], $row['updatedDateTime'], $row['status']);
            $businessIds = $businessIds . "," . $row['businessId'];
        }

        if ($businessProduct !== null) {
            $businessController = new BusinessController();
            $businesses = $businessController->getByIds($businessIds);

            foreach ($businesses as $business) {
                if ($businessProduct->getBusinessId() == $business->getId()) {
                    $businessProduct->setBusiness($business);
                }
            }
        }

        return $businessProduct;
    }

    public function getAll() {
        $query = "SELECT * FROM business_product";
        $businessProductController = new BusinessProductController();
        return $businessProductController->createObjects($query);
    }

    public function getByStatus($status) {
        $query = "SELECT * FROM business_product WHERE status = '$status'";
        $businessProductController = new BusinessProductController();
        return $businessProductController->createObjects($query);
    }

    public function getByName($name) {
        $query = "SELECT * FROM business_product WHERE name = '$name'";
        $businessProductController = new BusinessProductController();
        return $businessProductController->createObjects($query);
    }

    public function getById($id) {
        $query = "SELECT * FROM business_product WHERE id = $id";
        $businessProductController = new BusinessProductController();
        return $businessProductController->createObject($query);
    }

    public function getByIds($ids) {
        $query = "SELECT * FROM business_product WHERE id IN ($ids)";
        $businessProductController = new BusinessProductController();
        return $businessProductController->createObjects($query);
    }
    public function getByBusinessId($businessId) {
        $query = "SELECT * FROM business_product WHERE businessId = $businessId";
        $businessProductController = new BusinessProductController();
        return $businessProductController->createObjects($query);
    }
    public function add($businessProduct) {
        include('db_connection.php');
        $query = "INSERT INTO business_product (id, businessId, name, image, price, discountPercentage, taxPercentage, createdDateTime, updatedDateTime, status) VALUES ('" . $businessProduct->getId() . "', '" . $businessProduct->getBusinessId() . "', '" . $businessProduct->getName() . "', '" . $businessProduct->getImage() . "','" . $businessProduct->getPrice() . "', '" . $businessProduct->getDiscountPercentage() . "', '" . $businessProduct->getTaxPercentage() . "', NOW(), NOW(), '" . $businessProduct->getStatus() . "')";
        mysqli_query($db_connection, $query);
        return mysqli_insert_id($db_connection);
    }

    public function update($businessProduct) {
        include('db_connection.php');
        $query = "UPDATE business_product SET businessId = '" . $businessProduct->getBusinessId() . "', name = '" . $businessProduct->getName() . "', image = '" . $businessProduct->getImage() . "', price = '" . $businessProduct->getPrice() . "', discountPercentage = '" . $businessProduct->getDiscountPercentage() . "', taxPercentage = '" . $businessProduct->getTaxPercentage() . "', updatedDateTime = NOW(), status = '" . $businessProduct->getStatus() . "' WHERE id = " . $businessProduct->getId();
        return mysqli_query($db_connection, $query);
    }

    public function deleteById($businessProduct) {
        include('db_connection.php');
        $query = "DELETE FROM business_product WHERE id = " . $businessProduct->getId();
        return mysqli_query($db_connection, $query);
    }
}
?>