<?php
include('init.php');

$businessServiceId = $_POST['id'];
$businessId = $_POST['businessId'];
$name = str_replace("'", "\'", $_POST['name']);


if ($businessServiceId > 0) {
    // Update
    $status = $_POST['status'];
    $businessService = new BusinessService($businessServiceId, $businessId, $name, $status);
    $businessServiceController->update($businessService);
} else {
    // Add
    $businessService = new BusinessService("", $businessId, $name, "Active");
    $businessServiceId = $businessServiceController->add($businessService);
}

echo $businessId;
exit();
?>
