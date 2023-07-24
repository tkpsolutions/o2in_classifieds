<?php
include("init.php");
$businessId = $loggedBusiness->getId();

$oldPassword = $_POST['old_password'];
$newPassword = $_POST['new_password'];

$business = $businessController->getById($businessId);

if( strcasecmp($oldPassword, $business->getPassword()) != 0 )
{
	echo "Invalid old password";
	exit();
}

$business = new Business($businessId,"","","","","","","",$newPassword,"");
$businessController->updatePassword($business);
echo 0;
exit();
?>