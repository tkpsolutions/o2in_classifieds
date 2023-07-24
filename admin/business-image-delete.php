<?php
include('init.php');

$businessImageId = $_GET['id'];
$businessId = $_GET['bid'];
$businessImage = $businessImageController->getById($businessImageId);
$businessImageController->deleteById($businessImage);
header("Location: business-images.php?id=".$businessId);
exit();

?>



