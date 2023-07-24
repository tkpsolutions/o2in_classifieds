<?php
	$noLogin = 1;
	include('init.php');
	
	$mobile = $_POST['mobile'];
	$password = $_POST['password'];
	
	$business = $businessController->getByMobile($mobile);
	
	if( $business != null && strcmp($password, $business->getPassword()) == 0 )
	{
		$_SESSION['login_business'] = 1;
		$_SESSION['login_business_id'] = $business->getId();
		echo 0;
	}
	else
	{
		echo "Invalid email / password.";
	}
	exit();
	
?>