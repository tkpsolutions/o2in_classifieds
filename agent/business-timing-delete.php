<?php
include('init.php');
if (isset($_GET['id'])) {
    $businessTimingId = $_GET['id'];
    $businessId = $_GET['businessId'];

    $businessTimingController->deleteById($businessTimingId);
    header("location: business-timing.php?id=" . $businessId);
    exit();
} else {
    header("location: business-view.php");
    exit();
}
?>
