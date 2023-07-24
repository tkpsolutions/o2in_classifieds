<?php
//login verification
if( !isset($_SESSION['login_business']) || !isset($_SESSION['login_business_id'])) //if either of the session login is not present redirect to login
{
	if( !isset($noLogin) )
	{
		header("location:login.php");
		exit();
	}
}


$loggedBusiness = null;

if( isset($_SESSION['login_business_id']) )
{
	$loggedBusiness = $businessController->getById($_SESSION['login_business_id']);
}

if( $loggedBusiness == null )
{
	if( !isset($noLogin) )
	{
		header("location:login.php");
		exit();
	}
}
?>