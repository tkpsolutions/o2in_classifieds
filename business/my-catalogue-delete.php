<?php
include('init.php');
if (isset($_GET['id'])) 
{
    $businessProductId = $_GET['id'];
    $businessProduct = $businessProductController->getById($businessProductId);

    if ($businessProduct) 
	{
     	$businessProductController->deleteById($businessProduct);
        header("location: my-catalogue.php");
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