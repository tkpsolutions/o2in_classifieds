<?php
include('init.php');
if (isset($_GET['id'])) {
    $hostVideo = $_GET['id'];

    $hostVideo = $hostVideoController->deleteById($hostVideo);
    header("location: host-video-view.php");
    exit();
}
?>