<?php
	$noLogin = 1;
	include("init.php");
	$_SESSION['login'] = 0;
	unset($_SESSION['login_public_user']);
	unset($_SESSION['login_public_user_id']);
	session_destroy();
	header("location: login.php");
	exit();
	
?>