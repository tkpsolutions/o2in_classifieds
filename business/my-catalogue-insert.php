<?php
include('init.php');

$businessId = $_POST['businessId'];
$name = str_replace("'", "\'", $_POST['name'] );
$image = $_FILES['image']['name'];
$price = $_POST['price'];
$discountPercentage = $_POST['discountPercentage'];
$taxPercentage = $_POST['taxPercentage'];

/**
$createdDateTime = null;
$updatedDateTime = null;
**/
if (isset($_FILES['image'])) {
    $imageExtension = explode(".", $image);
    $imageExt = end($imageExtension);
} else {
    $image = null;
    $imageExt = null;
}

$businessProduct = new BusinessProduct("", $businessId, $name, $imageExt, $price, $discountPercentage, $taxPercentage, "", "", "Active");
    $businessProductId = $businessProductController->add($businessProduct);



if (!empty($image)) {
    $imageSourcePath = $_FILES['image']['tmp_name'];
    $imageFilepath = "../images/product/" . $businessProductId . '.' . $imageExt;
    move_uploaded_file($imageSourcePath, $imageFilepath);
}

echo $businessId;
exit();
?>

