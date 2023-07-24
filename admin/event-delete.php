<?php
include('init.php');
if (isset($_GET['id'])) {
    $eventId = $_GET['id'];

    $event = $eventController->deleteById($eventId);
    header("location: event-view.php");
    exit();
}
?>