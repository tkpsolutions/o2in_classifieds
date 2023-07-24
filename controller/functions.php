<?php

function PF_getManualDateTimeFormat($mysqlDate, $manualFormat)
{
	$newDate = date($manualFormat, strtotime($mysqlDate));
	return $newDate;
}

function PF_isImageExtensionAllowed($configController, $ext)
{
	$validExtension = 0;
	$ext = trim($ext);
	//getting allowed extensions
	$allowedExtnesions = $configController->getByName("website_image_allowed_extensions")->getCode();
	//echo $allowedExtnesions . " ::: ";
	$allowedExtnesions = explode("," , $allowedExtnesions);
	//echo sizeof( $allowedExtnesions ) . " ::: ";
	if( sizeof( $allowedExtnesions ) > 0 )
	{
		foreach( $allowedExtnesions as $allowedExtnesion )
		{
			$allowedExtnesion = trim($allowedExtnesion);
			//echo $allowedExtnesion . " - " . $ext . " :: " . strcasecmp( $allowedExtnesion, $ext ) . " >> ";
			if( strcasecmp( $allowedExtnesion, $ext ) == 0 )
			{
				$validExtension = 1;
				return $validExtension;
			}
		}
	}
	return $validExtension;
}

function PF_sendSMS($configController, $mobile, $message)
{
	//getting sms plugin information
	$senderId = $configController->getByName("msg_sms_sender_id")->getValue();
	$username = $configController->getByName("msg_sms_username")->getValue();
	$password = $configController->getByName("msg_sms_password")->getValue();
	$entityId = $configController->getByName("msg_sms_entity_id")->getValue();
	//sms coding
	$message = urlencode($message);

	$url = "http://139.99.131.165/api/v2/SendSMS?SenderId=".$senderId."&Message=".$message."&MobileNumbers=".$mobile."&PrincipleEntityId=".$entityId."&TemplateId=1307168958929119020&ApiKey=".$username."&ClientId=" . $password;
	//echo $url;
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);      
	curl_close($ch);
}

function PF_generateRandomPassword($length)
{
	$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
	$randomString = ''; 
  
	for ($i = 0; $i < $length; $i++) { 
		$index = rand(0, strlen($characters) - 1); 
		$randomString .= $characters[$index]; 
	}   
	return $randomString; 
}

function PF_generateRandomNumber($length)
{
	$characters = '0123456789';
	$randomString = ''; 
  
	for ($i = 0; $i < $length; $i++) { 
		$index = rand(0, strlen($characters) - 1); 
		$randomString .= $characters[$index]; 
	}   
	return $randomString; 
}

function PF_neturalizeString($string)
{
	$string = str_replace("'", "\'", $string);
	return $string;
}

function PF_getIds($objects)
{
	
	$ids = "";
	foreach( $objects as $object )
	{
		if( strlen($ids) == 0 )
		{
			$ids = $object->getId();
		}
		else
		{
			$ids = $ids . "," . $object->getId();
		}
	}
	return $ids;
}

function PF_getFromConfig($configs, $name)
{
	foreach( $configs as $config )
	{
		if( strcasecmp( $config->getName(), $name ) == 0 )
		{
			return $config->getCode();
		}
	}
	return "";
}

function PF_getZerosForIds($number, $maxZeros, $maxCharacters, $prefix, $suffix)
{
	$requiredZeros = 0;
	if( strlen($number) < $maxCharacters )
	{
		$requiredZeros =  $maxCharacters - strlen($number);
	}
	for($i = 1; $i <= $requiredZeros; $i++)
	{
		$number = "0" . $number;
	}
	$number = $prefix . $number . $suffix;
	return $number;
}

function PF_getSaleTotal($saleProducts){

	$billTotal = 0;

	foreach($saleProducts as $saleProduct){
		$price = $saleProduct->getRate();
		$weight = $saleProduct->getWeight();
		$discountPercentage = $saleProduct->getDiscount();
		$taxPercentage = $saleProduct->getTax();
		$wasteagePercentage = $saleProduct->getDamage();
		$labour = $saleProduct->getLabour();

		$discountAmount = $price * ($discountPercentage / 100);
		$discountedPrice = $price - $discountAmount;

		$productPrice = round ( $weight * $discountedPrice, 2 );

		//finding wasteage details
		$wasteageCharge = round ( $productPrice * ($wasteagePercentage / 100), 2 );

		//finding labout charge
		$labourCharge = round ( $weight * $labour, 2 );
	
		//final amount
		$finalProductPrice = round ( $productPrice + $wasteageCharge + $labourCharge, 2 );
	
		//tax calculation
		$taxAmount = round ( $finalProductPrice * ($taxPercentage/100), 2 );
	
		$grandTotal = round ( $finalProductPrice + $taxAmount );

		$billTotal = $billTotal + $grandTotal;
	}

	return $billTotal;
}

function PF_getEstimateTotal($saleProducts){

	$billTotal = 0;

	foreach($saleProducts as $saleProduct){
		$price = $saleProduct->getRate();
		$weight = $saleProduct->getWeight();
		$discountPercentage = $saleProduct->getDiscount();
		$taxPercentage = $saleProduct->getTax();
		$wasteagePercentage = $saleProduct->getDamage();
		$labour = $saleProduct->getLabour();

		$discountAmount = $price * ($discountPercentage / 100);
		$discountedPrice = $price - $discountAmount;

		$productPrice = round ( $weight * $discountedPrice, 2 );

		//finding wasteage details
		$wasteageCharge = round ( $productPrice * ($wasteagePercentage / 100), 2 );

		//finding labout charge
		$labourCharge = round ( $weight * $labour, 2 );
	
		//final amount
		$finalProductPrice = round ( $productPrice + $wasteageCharge + $labourCharge, 2 );
	
		//tax calculation
		$taxAmount = round ( $finalProductPrice * ($taxPercentage/100), 2 );
	
		$grandTotal = round ( $finalProductPrice + $taxAmount );

		$billTotal = $billTotal + $grandTotal;
	}

	return $billTotal;
}

function PF_ConvertNumberToDay($number){
	$days = array(
		1 => 'Monday',
		2 => 'Tuesday',
		3 => 'Wednesday',
		4 => 'Thursday',
		5 => 'Friday',
		6 => 'Saturday',
		7 => 'Sunday'
	);
	
	return $days[$number];
}

?>