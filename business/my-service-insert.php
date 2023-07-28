<?php
include('init.php');

$businessId = $_POST['businessId'];
$name = str_replace("'", "\'", $_POST['name'] );
$price =  $_POST['price'];
$tax = $_POST['tax'];
$discount =  $_POST['discount'];



$businessService = new BusinessService("", $businessId, $name, $price, $tax, $discount, 'active');
$businessServiceId = $businessServiceController->add($businessService);

echo $businessId;
exit();
?>
