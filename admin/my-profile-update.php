<?php
	include('init.php');

	$userId = $_POST['userId'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$whatsappNo = $_POST['whatsappNo'];
	$mobile = $_POST['mobile'];

	//duplicate
	$duplicateUser = $userController->getByMobile($mobile);
	if( $duplicateUser != null && $duplicateUser->getId() != $userId ){
		echo "Mobile number already in user";
		exit();
	}
	
	$user = new User($userId, $name, $mobile, $whatsappNo, $email, "", "", "", "", "", "", "active");

	if( $userId == 0 ){
		//insert 
		$userId = $userController->add($user);
	}
	else{
		//update 
		$userController->updateProfile($user);
	}
	
	echo $userId;
	exit();
	
	
?>