<?php
	$noLogin = 1;
	include('init.php');
	
	$name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$whatsappNo = $_POST['whatsappNo'];
	$password = $_POST['password'];
	$retypePassword = $_POST['retypePassword'];
	
	$user = $userController->getByMobile($mobile);
	
	if( $user != null )
	{
		echo "Mobile number already in use";
		exit();
	}

	if( strcmp($password, $retypePassword) != 0 ){
		echo "Retype password did not match with new password";
		exit();
	}

	$user = new User(0, $name, $mobile, $whatsappNo, $email, "", "", "", "customer", 0, $password, "active");
	$userId = $userController->add($user);

	$message = "Hi $name, you have successfully activated your account at SBL SERVICES O2IN. Now search required services and book your appointments.";
	//PF_sendSMS($configController, $mobile, $message);

	//auto login
	$_SESSION['login_public_user'] = 1;
	$_SESSION['login_public_user_id'] = $userId;

	//echo $message;
	echo $userId;
	exit();
	
?>