<?php
	$noLogin = 1;
	include('init.php');
	
	$email = $_POST['email'];
	$password = $_POST['password'];	
	
	$user = $userController->getByEmail($email);

	
	if( $user != null && strcmp($password, $user->getPassword()) == 0 && strcmp($user->getStatus(),"active") == 0 && strcmp($user->getRole(),"agent") == 0)
	{
		$_SESSION['login_agent'] = 1;
		$_SESSION['login_agent_id'] = $user->getId();
		echo 0;
	}
	else
	{
		echo "Invalid email / password.";
	}
	exit();
	
?>