<?php
	$noLogin = 1;
	include('init.php');
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$user = $userController->getByEmail($email);
	
	if( $user != null && strcmp($password, $user->getPassword()) == 0 )
	{
		$_SESSION['login_user'] = 1;
		$_SESSION['login_user_id'] = $user->getId();
		echo 0;
	}
	else
	{
		echo "Invalid email / password.";
	}
	exit();
	
?>