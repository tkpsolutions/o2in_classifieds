<?php
include('init.php');

$businessId = $_POST['business_id'];
$image = $_FILES['image']['name'];
$caption = str_replace("'","\'",$_POST['caption']);
$createdDateTime = null;
$updatedDateTime = null;


if (isset($_FILES['image'])) {
    $imageExtension = explode(".", $image);
    $imageExt = end($imageExtension);
} else {
    $image = '';
    $imageExt = '';
}

$businessImage = new BusinessImage(0, $businessId, $imageExt, $caption, $createdDateTime, $updatedDateTime, "active");
$businessImageId = $businessImageController->add($businessImage);

if (!empty($image)) {
    $imageSourcePath = $_FILES['image']['tmp_name'];
    $imageFilepath = "../images/businessimage/" . $businessImageId . '.' . $imageExt;
    move_uploaded_file($imageSourcePath, $imageFilepath);
}

echo $businessId;
exit();
?>
