<?php
include('init.php');

$businessId = $_POST['business_id'];
$businessServiceId = $_POST['business_service_id'];
$name = str_replace("'", "\'", $_POST['name'] );
$status = "Active";


$businessService = new BusinessService($businessServiceId, $businessId, $name, $status);
$businessServiceController->update($businessService);

echo $businessServiceId;
exit();
?>
