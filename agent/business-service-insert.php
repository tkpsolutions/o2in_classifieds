<?php
include('init.php');

$businessServiceId = $_POST['id'];
$businessId = $_POST['businessId'];
$name = str_replace("'", "\'", $_POST['name']);
$price = $_POST['price'];
$tax = $_POST['tax'];
$discount = $_POST['discount'];

if ($businessServiceId > 0) {
    // Update
    $status = $_POST['status'];
    $businessService = new BusinessService($businessServiceId, $businessId, $name, $price, $tax, $discount, $status);
    $businessServiceController->update($businessService);
} else {
    // Add
    $businessService = new BusinessService("", $businessId, $name, $price, $tax, $discount, "Active");
    $businessServiceId = $businessServiceController->add($businessService);
}

echo $businessId;
exit();
?>
