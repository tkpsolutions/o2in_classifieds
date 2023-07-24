<?php
	include('init.php');
	
	$name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$whatsappNo = $_POST['whatsappNo'];
	
	$user = $userController->getByMobile($mobile);
	
	if( $user != null && $user->getId() != $loggedUser->getId() )
	{
		echo "Mobile number already in use";
		exit();
	}
	$user = new User($loggedUser->getId(), $name, $mobile, $whatsappNo, $email, "", "", "", "customer", 0, "", $loggedUser->getStatus());
	$userController->updateProfile($user);
	exit();
	
?>