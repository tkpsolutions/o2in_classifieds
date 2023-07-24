<?php
include("init.php");
if (isset($_GET['id'])) 
{
    $businessTagId = $_GET['id'];
    $businessTag = $businessTagController->getById($businessTagId);

    if ($businessTag) 
	{
     	$businessTagController->deleteById($businessTagId);
        header("location: my-tag.php");
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