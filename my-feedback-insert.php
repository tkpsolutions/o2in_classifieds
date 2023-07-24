<?php
	include('init.php');
	
	$businessId = $_POST['businessId'];
	$message = $_POST['message'];
	$starCount = $_POST['starCount'];

	$businessFeedback = new BusinessFeedback(0, $businessId, $loggedUser->getId(), $starCount, $message, "", "", "active");
	
	$businessFeedbackId = $businessFeedbackController->add($businessFeedback);
	echo $businessFeedbackId;
	exit();
	
?>