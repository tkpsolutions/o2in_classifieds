<?php
include('init.php');
if (isset($_GET['id'])) 
{
    $businessServiceId = $_GET['id'];
    $businessService = $businessServiceController->getById($businessServiceId);

    if ($businessService) 
	{
     	$businessServiceController->deleteById($businessServiceId);
        header("location: my-service.php");
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