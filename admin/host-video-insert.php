<?php
include('init.php');
$videoId = $_POST['id'];
$title = str_replace("'","\'",$_POST['title']);
$description = str_replace("'","\'",$_POST['description']);
$video = $_FILES['video']['name'];

$createdDateTime = null;
$updatedDateTime = null;

if (isset($_FILES['video'])) {
    $videoExtension = explode(".", $video);
    $videoExt = end($videoExtension);
} else {
    $video = null;
    $videoExt = null;
}

if ($videoId > 0) {
    // Update video
    $hostVideo = $hostVideoController->getById($videoId);
    $status = $_POST['status'];
    if ($videoExt == null) {
        $videoExt = $hostVideo->getVideo();
    }

    $hostVideo = new HostVideo($videoId, $title, $description, $videoExt, $createdDateTime, $updatedDateTime, $status);
    $hostVideoController->update($hostVideo);
} else {
    // Insert new video
    $hostVideo = new HostVideo("", $title, $description, $videoExt, "", "", "active");
    $videoId = $hostVideoController->add($hostVideo);
}

if (!empty($video)) {
    $videoSourcePath = $_FILES['video']['tmp_name'];
    $videoFilepath = "../images/hostvideos/" . $videoId . '.' . $videoExt;
    move_uploaded_file($videoSourcePath, $videoFilepath);

   // Video Compression using FFmpeg
$videoResolution = str_replace('*', 'x', $_POST['resolution']); 
$outputDir = "../images/hostvideos/"; 

$compressedVideoName = $videoId . '_compressed.mp4';
$compressedVideoPath = $outputDir . $compressedVideoName;

$command = "C:/ffmpeg/bin/ffmpeg -i \"$videoFilepath\" -s $videoResolution \"$compressedVideoPath\" 2>&1";
exec($command, $output, $returnVal);

if ($returnVal === 0) {
    unlink($videoFilepath);

    // Move compressed video to the specific folder
    $compressedVideoDestination = $outputDir . $videoId . '.' . $videoExt;
    rename($compressedVideoPath, $compressedVideoDestination);

    echo $videoId;
    exit();
} else {
    echo "Error: Video compression failed. Please check the FFmpeg command and try again.";
    exit();
}
}
echo $videoId;
exit();
?>