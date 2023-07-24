<?php
include('init.php');
if (isset($_GET['id'])) {
    $businessContactId = $_GET['id'];
    $businessContact = $businessContactTypeController->getById($businessContactId);
    
    if ($businessContact != null) 
	{
        echo "here";
        $businessContactTypeController->deleteById($businessContact);
        header("location: my-contact.php");
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