<?php
include('init.php');

$businessProductId = $_POST['id'];
$businessId = $_POST['businessId'];
$name = str_replace("'", "\'", $_POST['name']);
$image = $_FILES['image']['name'];
$price = str_replace("'", "\'", $_POST['price']);
$discountPercentage = str_replace("'", "\'", $_POST['discountPercentage']);
$taxPercentage = $_POST['taxPercentage'];

$createdDateTime = null;
$updatedDateTime = null;

if (isset($_FILES['image'])) {
    $imageExtension = explode(".", $image);
    $imageExt = end($imageExtension);
} else {
    $image = null;
    $imageExt = null;
}


if ($businessProductId > 0) {
    $businessProduct = $businessProductController->getById($businessProductId);
    $status = str_replace("'", "\'", $_POST['status']);
    if ($imageExt == null) {
        $imageExt = $businessProduct->getImage();
    }
    $businessProduct = new BusinessProduct($businessProductId, $businessId, $name, $imageExt, $price, $discountPercentage, $taxPercentage, $createdDateTime, $updatedDateTime, $status);
    $businessProductController->update($businessProduct);
} else { 
    // Add
    $businessProduct = new BusinessProduct("", $businessId, $name, $imageExt, $price, $discountPercentage, $taxPercentage, "", "", "Active");
    $businessProductId = $businessProductController->add($businessProduct);
}


if (!empty($image)) {
    $imageSourcePath = $_FILES['image']['tmp_name'];
    $imageFilepath = "../images/product/" . $businessProductId . '.' . $imageExt;
    move_uploaded_file($imageSourcePath, $imageFilepath);
}

echo $businessId;
exit();
?>
