<?php
include('init.php');
if (isset($_GET['id'])) 
{
    $businessTimingId = $_GET['id'];	
	$businessTiming = $businessTimingController->getById($businessTimingId);

	if ($businessTiming) 
	{
     	$businessTimingController->deleteById($businessTimingId);
		header("location: my-timings.php");
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
