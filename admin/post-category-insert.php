<?php
include('init.php');

$postCategoryId = $_POST['id'];
$name = str_replace("'","\'",$_POST['name']);
$image = $_FILES['image']['name'];

if (isset($_FILES['image'])) {
    $imageExtension = explode(".", $image);
    $imageExt = end($imageExtension);
} else {
    $image = null;
    $imageExt = null;
}

$existingPostCategory = $postCategoryController->getByName($name);

if ($existingPostCategory != null && $existingPostCategory->getId() != $postCategoryId) {
    echo "Name already used";
    exit();
}

if ($postCategoryId > 0) {
    $postCategory = $postCategoryController->getById($postCategoryId);
    $status = $_POST['status'];

    if ($imageExt == null) {
        $imageExt = $postCategory->getImage();
    }

    $postCategory = new PostCategory($postCategoryId, $name, $imageExt, $status);
    $postCategoryController->update($postCategory);
} else {
    $postCategory = new PostCategory("", $name, $imageExt, "Active");
    $postCategoryId = $postCategoryController->add($postCategory);
}

if ($imageExt != null) {
    $imageSourcePath = $_FILES['image']['tmp_name'];
    $imageFilepath = "../images/post_category/" . $postCategoryId . '.' . $imageExt;
    move_uploaded_file($imageSourcePath, $imageFilepath);
}

echo $postCategoryId;
exit();
?>
