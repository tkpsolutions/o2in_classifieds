<?php
//login verification
if( !isset($_SESSION['login_user']) || !isset($_SESSION['login_user_id'])) //if either of the session login is not present redirect to login
{
	header("location:login.php");
	exit();
}

if( $_SESSION['login_user'] != 1 || $_SESSION['login_user_id'] <= 0 ) //if session : login value is not 1 (or) session : login_user_id is 0 or less than 0 redirect to login
{
	header("location:login.php");
	exit();
}

$loggedUser = $userController->getById($_SESSION['login_user_id']);
/*
//role verification
if( strcasecmp($loggedUser->getRole(), "member") != 0 )
{
	header("location:login.php");
	exit();
}
*/
?>