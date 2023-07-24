<?php
include("video-model.php");

class VideoController {
    public function createObjects($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);
    
        $videos = array();
           
        while ($row = mysqli_fetch_array($rows)) {
            $video = new Video($row['id'], $row['youtubeLink'], $row['title'], $row['description'], $row['createdDateTime'], $row['updatedDateTime'], $row['status']);
            array_push($videos, $video);
    
        }
    
        return $videos;
    }
    
    public function createObject($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);
    
        $video = null;
      
    
        while ($row = mysqli_fetch_array($rows)) {
            $video = new Video($row['id'], $row['youtubeLink'], $row['title'], $row['description'], $row['createdDateTime'], $row['updatedDateTime'], $row['status']);
            
        }

        return $video;
    }
    
    public function getAll() {
        $query = "SELECT * FROM video";
        $videoController = new VideoController();
        return $videoController->createObjects($query);
    }
    
    public function getByStatus($status) {
        $query = "SELECT * FROM video WHERE status = '$status'";
        $videoController = new VideoController();
        return $videoController->createObjects($query);
    }
    
    public function getById($id) {
        $query = "SELECT * FROM video WHERE id = $id";
        $videoController = new VideoController();
        return $videoController->createObject($query);
    }

    public function getByTitle($title) {
        $query = "SELECT * FROM video WHERE title = '$title'";
        $videoController = new VideoController();
        return $videoController->createObject($query);
    }
    

    public function getByIds($ids) {
        $query = "SELECT * FROM video WHERE id IN ($ids)";
        $videoController = new VideoController();
        return $videoController->createObjects($query);
    }
    public function getByYoutubeLink($youtubeLink) {
        $query = "SELECT * FROM video WHERE youtubeLink = $youtubeLink";
        $videoController = new VideoController();
        return $videoController->createObjects($query);
    }

    public function getByDescription($description) {
        $query = "SELECT * FROM video WHERE description = $description";
        $videoController = new VideoController();
        return $videoController->createObjects($query);
    }

    public function add($video) {
        include('db_connection.php');
        $query = "INSERT INTO video ( youtubeLink, title, description, createdDateTime, updatedDateTime, status) VALUES ( '" . $video->getYoutubeLink() . "', '" . $video->getTitle() . "', '" . $video->getDescription() . "', NOW(), NOW(), '" . $video->getStatus() . "')";
        mysqli_query($db_connection, $query);
        return mysqli_insert_id($db_connection);
    }
    
    public function update($video) {
        include('db_connection.php');
        $query = "UPDATE video SET youtubeLink = '" . $video->getYoutubeLink() . "', title = '" . $video->getTitle() . "', description = '" . $video->getDescription() . "', status = '" . $video->getStatus() . "', updatedDateTime = NOW() WHERE id = " . $video->getId();
        return mysqli_query($db_connection, $query);
    }
    
    public function delete($video) {
        include('db_connection.php');
        $query = "DELETE FROM video WHERE id = " . $video->getId();
        return mysqli_query($db_connection, $query);
    }
}
?>