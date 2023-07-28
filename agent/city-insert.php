<?php
include('init.php');

$cityId = $_POST['id'];
$stateId = $_POST['stateId'];
$name = str_replace("'", "\'", $_POST['name']);
$image = $_FILES['image']['name'];
$lat = str_replace("'", "\'",$_POST['lat']);
$lng = str_replace("'", "\'",$_POST['lng']);

if (isset($_FILES['image'])) {
    $imageExtension = explode(".", $image);
    $imageExt = end($imageExtension);
} else {
    $image = null;
    $imageExt = null;
}

if ($cityId > 0) {
    // Update city
    $city = $cityController->getById($cityId);
    $status = $_POST['status'];
    if ($imageExt == null) {
        $imageExt = $city->getImage();
    }

    $city = new City($cityId, $stateId, $name, $imageExt, $lat, $lng, $status);
    $cityController->update($city);
} else {
    // Insert new city
    $city = new City(0, $stateId, $name, $imageExt, $lat, $lng, "active");
    $cityId = $cityController->add($city);
}

if (!empty($image)) {
    $imageSourcePath = $_FILES['image']['tmp_name'];
    $imageFilepath = "../images/city/" . $cityId . '.' . $imageExt;
    move_uploaded_file($imageSourcePath, $imageFilepath);
}

echo $cityId;
exit();
?>
