<?php
include('init.php');
if (isset($_GET['id'])) {
    $businessTagId = $_GET['id'];
    $businessId = $_GET['businessId'];
    $businessTag = $businessTagController->deleteById($businessTagId);
    header("location: business-tag.php?id=" . $businessId);
} else {
    header("location: business-view.php");
    exit();
}
?>