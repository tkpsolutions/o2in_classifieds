<?php
	$noLogin = 1;
	include("init.php");
	$_SESSION['login'] = 0;
	unset($_SESSION['login']);
	unset($_SESSION['login_business_id']);
	session_destroy();
	header("location: login.php");
	exit();
	
?>