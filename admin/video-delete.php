<?php
include('init.php');

$videoId = $_GET['id'];


$video = $videoController->getById($videoId);
$videoController->delete($video);
header("Location: video-view.php?id=".$videoId);
exit();

?>



