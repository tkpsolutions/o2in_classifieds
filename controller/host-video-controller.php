<?php
include("host-video-model.php");

class HostVideoController {
    public function createObjects($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);
    
        $hostVideos = array();
    
        while ($row = mysqli_fetch_array($rows)) {
            $hostVideo = new HostVideo($row['id'], $row['title'], $row['description'], $row['video'], $row['createdDateTime'], $row['updatedDateTime'], $row['status']);
            array_push($hostVideos, $hostVideo);
        }
    
        return $hostVideos;
    }
    
    public function createObject($query) {
        include("db_connection.php");
        $rows = mysqli_query($db_connection, $query);
    
        $hostVideo = null;
    
        while ($row = mysqli_fetch_array($rows)) {
            $hostVideo = new HostVideo($row['id'], $row['title'], $row['description'], $row['video'], $row['createdDateTime'], $row['updatedDateTime'], $row['status']);
        }
    
        return $hostVideo;
    }
    
    public function getAll() {
        $query = "SELECT * FROM host_video";
        $hostVideoController = new HostVideoController();
        return $hostVideoController->createObjects($query);
    }
    
    public function getByStatus($status) {
        $query = "SELECT * FROM host_video WHERE status = '$status'";
        $hostVideoController = new HostVideoController();
        return $hostVideoController->createObjects($query);
    }
    
    public function getById($id) {
        $query = "SELECT * FROM host_video WHERE id = $id";
        $hostVideoController = new HostVideoController();
        return $hostVideoController->createObject($query);
    }
    
    public function add($hostVideo) {
        include('db_connection.php');
        $query = "INSERT INTO host_video (id, title, description, video, createdDateTime, updatedDateTime, status) VALUES ('" . $hostVideo->getId() . "', '" . $hostVideo->getTitle() . "', '" . $hostVideo->getDescription() . "', '" . $hostVideo->getVideo() . "', Now(), Now(), '" . $hostVideo->getStatus() . "')";
        mysqli_query($db_connection, $query);
        return mysqli_insert_id($db_connection);
    }
    
    public function update($hostVideo) {
        include('db_connection.php');
        $query = "UPDATE host_video SET title = '" . $hostVideo->getTitle() . "', description = '" . $hostVideo->getDescription() . "', video = '" . $hostVideo->getVideo() . "', updatedDateTime = NOW(), status = '" . $hostVideo->getStatus() . "' WHERE id = " . $hostVideo->getId();
        return mysqli_query($db_connection, $query);
    }
    
    public function deleteById($hostVideoId) {
        include('db_connection.php');
        $query = "DELETE FROM host_video WHERE `id` = " .$hostVideoId;
        return mysqli_query($db_connection, $query);
    }
}
?>
