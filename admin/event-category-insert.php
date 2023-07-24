<?php
include('init.php');

$eventCategoryId = $_POST['id'];
$name = str_replace("'","\'",$_POST['name']);
$image = $_FILES['image']['name'];

if (isset($_FILES['image'])) {
    $imageExtension = explode(".", $image);
    $imageExt = end($imageExtension);
} else {
    $image = null;
    $imageExt = null;
}

$existingEventCategory = $eventCategoryController->getByName($name);

if ($existingEventCategory != null && $existingEventCategory->getId() != $eventCategoryId) {
    echo "Name already used";
    exit();
}

if ($eventCategoryId > 0) {
    $eventCategory = $eventCategoryController->getById($eventCategoryId);
    $status = $_POST['status'];

    if ($imageExt == null) {
        $imageExt = $eventCategory->getImage();
    }

    $eventCategory = new EventCategory($eventCategoryId, $name, $imageExt, $status);
    $eventCategoryController->update($eventCategory);
} else {
    $eventCategory = new EventCategory("", $name, $imageExt, "Active");
    $eventCategoryId = $eventCategoryController->add($eventCategory);
}

if ($imageExt != null) {
    $imageSourcePath = $_FILES['image']['tmp_name'];
    $imageFilepath = "../images/event_category/" . $eventCategoryId . '.' . $imageExt;
    move_uploaded_file($imageSourcePath, $imageFilepath);
}

echo $eventCategoryId;
exit();
?>
