<?php
include('init.php');

$eventId = $_POST['id'];
$eventCategoryId = $_POST['eventCategoryId'];
$cityId = $_POST['cityId'];
$eventDate = $_POST['eventDate'];
$title = str_replace("'", "\'", $_POST['title']);
$description = str_replace("'", "\'", $_POST['description']);
$image = $_FILES['image']['name'];
$address = str_replace("'", "\'", $_POST['address']);
$createdDateTime = null;
$updatedDateTime = null;

if (isset($_FILES['image'])) {
    $imageExtension = explode(".", $image);
    $imageExt = end($imageExtension);
} else {
    $image = null;
    $imageExt = null;
}

if ($eventId > 0) {
    // Update event
    $event = $eventController->getById($eventId);
    $status = $_POST['status'];
    if ($imageExt == null) {
        $imageExt = $event->getImage();
    }

    $event = new Event($eventId, $eventCategoryId, $cityId, $eventDate, $title, $description, $imageExt, $address, $createdDateTime, $updatedDateTime,$status);
    $eventController->update($event);
} else {
    // Insert new event
    $event = new Event(0, $eventCategoryId, $cityId, $eventDate, $title, $description, $imageExt, $address, $createdDateTime, $updatedDateTime, "active");
    $eventId = $eventController->add($event);
}

if (!empty($image)) {
    $imageSourcePath = $_FILES['image']['tmp_name'];
    $imageFilepath = "../images/event/" . $eventId . '.' . $imageExt;
    move_uploaded_file($imageSourcePath, $imageFilepath);
}

echo $eventId;
exit();
?>
