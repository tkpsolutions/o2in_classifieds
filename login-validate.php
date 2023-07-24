<?php
	$noLogin = 1;
	include('init.php');
	
	$mobile = $_POST['mobile'];
	$password = $_POST['password'];
	
	$user = $userController->getByMobile($mobile);
	
	if( $user != null && strcmp($password, $user->getPassword()) == 0 )
	{
		$_SESSION['login_public_user'] = 1;
		$_SESSION['login_public_user_id'] = $user->getId();
		echo 0;
	}
	else
	{
		echo "Invalid mobile / password.";
	}
	exit();
	
?>