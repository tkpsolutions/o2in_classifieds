<?php
include('init.php');

$categoryId = $_POST['id'];
$name = str_replace("'","\'",$_POST['name']);
$image = $_FILES['image']['name'];
$isBooking = $_POST['isBooking'];
$isGallery = $_POST['isGallery'];
$isProduct = $_POST['isProduct'];
$isRide = $_POST['isRide'];
$isFeedback = $_POST['isFeedback'];
$contactCount = $_POST['contactCount'];


if (isset($_FILES['image'])) {
    $imageExtension = explode(".", $image);
    $imageExt = end($imageExtension);
} else {
    $image = null;
    $imageExt = null;
}

$existingCategory = $categoryController->getByName($name);

if( $existingCategory != null && $existingCategory->getId() != $categoryId ){
    echo "Name already used";
    exit();
}

if( $categoryId > 0 ){
    //update
    $category = $categoryController->getById($categoryId);
    $status = $_POST['status'];
    if( $imageExt == null ){
        $imageExt = $category->getImage();
    }
    $category = new Category($categoryId, $name, $imageExt, $isBooking, $isGallery, $isProduct, $isRide, $isFeedback, $contactCount, $status);
    $categoryController->update($category);
}
else{
    //insert
    $category = new Category("", $name, $imageExt, $isBooking, $isGallery, $isProduct, $isRide, $isFeedback, $contactCount, "Active");
    $categoryId = $categoryController->add($category);
}

//upload image if loaded
if( $imageExt != null ){
    $imageSourcePath = $_FILES['image']['tmp_name'];
    $imageFilepath = "../images/category/images/" . $categoryId . '.' . $imageExt;
    move_uploaded_file($imageSourcePath, $imageFilepath);
}

echo $categoryId;
exit();

/*
if ($id > 0) {
    $status = $_POST['status'];
    if ($existingCategory != null && $existingCategory->getId() != $id) {
        echo "Category already exists";
        exit();
    } else {
        $existingImage = $existingCategory->getImage();
        $existingGallery = $existingCategory->getisGallery();
        
        $category = new Category($id, $name, $existingImage, $isBooking, $existingGallery, $isProduct, $isRide, $isFeedback, $contactCount, $status);
        $categoryId = $categoryController->update($category);
        
        if (!empty($image)) {
            $imageSourcePath = $_FILES['image']['tmp_name'];
            $imageFilepath = "../images/category/images/" . $categoryId . '.' . $imageExt;
            move_uploaded_file($imageSourcePath, $imageFilepath);
        }
        
        if (!empty($isGallery)) {
            $gallerySourcePath = $_FILES['isGallery']['tmp_name'];
            $galleryFilepath = "../images/category/gallery/" . $categoryId . '.' . $galleryExt;
            move_uploaded_file($gallerySourcePath, $galleryFilepath);
        }
        
        echo $categoryId;
        exit();
    }
} else {
    if ($existingCategory != null) {
        echo "Category already exists";
        exit();
    } else {
        $category = new Category("", $name, $imageExt, $isBooking, $galleryExt, $isProduct, $isRide, $isFeedback, $contactCount, "Active");
        $categoryId = $categoryController->add($category);

        if (!empty($image)) {
            $imageSourcePath = $_FILES['image']['tmp_name'];
            $imageFilepath = "../images/category/images/" . $categoryId . '.' . $imageExt;
            move_uploaded_file($imageSourcePath, $imageFilepath);
        }

        if (!empty($isGallery)) {
            $gallerySourcePath = $_FILES['isGallery']['tmp_name'];
            $galleryFilepath = "../images/category/gallery/" . $categoryId . '.' . $galleryExt;
            move_uploaded_file($gallerySourcePath, $galleryFilepath);
        }

        echo $categoryId;
        exit();
    }
}

echo "Operation Failed";
exit();
*/
?>
