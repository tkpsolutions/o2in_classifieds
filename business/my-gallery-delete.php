<?php
include('init.php');
if (isset($_GET['id'])) 
{
    $businessImageId = $_GET['id'];
    $businessImage = $businessImageController->getById($businessImageId);

    if ($businessImage) 
	{
     	$businessImageController->deleteById($businessImage);
        header("location: my-gallery.php");
        exit();
    } 
	else 
	{
        header("location: index.php");
        exit();
    }
} 
else 
{
    header("location: index.php");
    exit();
}
?>