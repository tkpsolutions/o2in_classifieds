<?php
$noLogin = 1;
include('init.php');

$mobile = $_POST['mobile'];

$business = $businessController->getByMobile($mobile);

if ($business != null) {
	$message = "Hi " . $business->getName() . ", your password for SBL O2in application login will be " . $business->getPassword() . ". Please reset the password after login.";
	$templateId = "1307168959427294101";

	/*
	//send sms
	//PF_sendSMS($configController, $mobile, $message, $templateId);

	//sms code
	//getting sms plugin information
	
	$senderId = $configController->getByName("msg_sms_sender_id")->getValue();
	echo "<br>senderId : " . $senderId;
	$username = "XiyHNZcXPdlYdhLYh4/AklQI31lO6L0nrArq9gMYpPE="; //api key
	$password = "687700d1-aaeb-44cc-abe1-d1e9445166be"; //client id
	$entityId = "1301167688760756044";
	$mobile = "9790256734";
	//sms coding
	$message = urlencode($message);
	//$message = str_replace(" ", "%20", $message);
	echo "<br>message : " . $message;

	$url = "http://139.99.131.165/api/v2/SendSMS?SenderId=" . $senderId . "&Message=" . $message . "&MobileNumbers=" . $mobile . "&PrincipleEntityId=" . $entityId . "&TemplateId=" . $templateId . "&ApiKey=" . $username . "&ClientId=" . $password;

	echo "<br>url : " . $url;
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	curl_close($ch);
	echo "<br>" . $output;
	*/
} else {
	echo "Invalid mobile number.";
}
exit();
