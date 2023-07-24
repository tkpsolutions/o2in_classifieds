<?php
include('init.php');

$businessId = $_POST['businessId'];
$name = str_replace("'", "\'", $_POST['name'] );



$businessService = new BusinessService("", $businessId, $name, 'active');
$businessServiceId = $businessServiceController->add($businessService);

echo $businessId;
exit();
?>
