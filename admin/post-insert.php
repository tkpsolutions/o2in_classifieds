<?php
include('init.php');

$postId = $_POST['id'];
$cityId = $_POST['cityId'];
$postCategoryId = $_POST['postCategoryId'];
$title = str_replace("'", "\'", $_POST['title']);
$description = str_replace("'", "\'", $_POST['description']);
$image = $_FILES['image']['name'];

$createdDateTime = null;
$updatedDateTime = null;


if (isset($_FILES['image'])) {
    $imageExtension = explode(".", $image);
    $imageExt = end($imageExtension);
} else {
    $image = null;
    $imageExt = null;
}

if ($postId > 0) {
    // Update post
    $post = $postController->getById($postId);
    $status = str_replace("'", "\'", $_POST['status']);
    if ($imageExt == null) {
        $imageExt = $post->getImage();
    }

    $post = new Post($postId, $cityId,$postCategoryId, $title, $description,  $createdDateTime, $updatedDateTime, $imageExt, $status);
    $postController->update($post);
} else {
    // Insert new post
    $post = new Post("",$cityId, $postCategoryId,$title, $description,"","", $imageExt, "active");
    $postId = $postController->add($post);   
}

if (!empty($image)) {
    $imageSourcePath = $_FILES['image']['tmp_name'];
    $imageFilepath = "../images/post/" . $postId . '.' . $imageExt;
    move_uploaded_file($imageSourcePath, $imageFilepath);
}

echo $postId;
exit();
?>
