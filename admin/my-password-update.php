<?php
	include('init.php');

	$userId = $_POST['userId'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	//duplicate
	$user = $userController->getById($userId);
	
	if( strcmp($user->getPassword(), $password) != 0 ){
		echo "Old password did not match";
		exit();
	}
	
	$user->setPassword($password2);
	$userController->updatePassword($user);

	echo $userId;
	exit();
	
	
?>