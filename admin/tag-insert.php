<?php
include('init.php');

$tagId = $_POST['id'];
$name = str_replace("'", "\'", $_POST['name']);
$categoryId = $_POST['categoryId'];
$existingTag = $tagController->getByNameAndCategoryId($name,$categoryId);

if( $existingTag != null && $existingTag->getId() != $tagId ){
    echo "Tag Name already used";
    exit();
}

if( $tagId > 0 ){
    //update
    $tag = $tagController->getById($tagId);
    $status = $_POST['status'];
    
    $tag = new Tag($tagId, $categoryId, $name, $status);
    $tagId = $tagController->update($tag);
}
else{
    //insert
    $tag = new Tag("", $categoryId, $name, "Active");
    $tagId = $tagController->add($tag);
}

echo $tagId;
exit();

?>