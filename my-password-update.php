<?php
	include('init.php');
	
	$oldPassword = $_POST['oldPassword'];
	$newPassword = $_POST['newPassword'];
	$retypePassword = $_POST['retypePassword'];
	
	if( strcmp($oldPassword, $loggedUser->getPassword()) != 0 ){
		echo "Old password did not match";
		exit();
	}

	if( strcmp($newPassword, $retypePassword) != 0 ){
		echo "Retype password did not match with new password";
		exit();
	}
	
	$user = $loggedUser;
	$user->setPassword($newPassword);
	$userController->updatePassword($user);
	exit();
	
?>