<?php
include('init.php');
if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    $post = $postController->deleteById($postId);
    header("location: post-view.php");
    exit();
}
?>