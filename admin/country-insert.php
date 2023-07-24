<?php

include('init.php');

$countryId = $_POST['id'];
$name = $_POST['name'];

$tempName = str_replace("'","\'",$name);


$selectedName = $countryController->selectByName($tempName);
if($countryId > 0)
{	
	$status = $_POST['status'];
	if($selectedName != null && $selectedName->getId() != $countryId)
	{	
		echo "Country already exist";
		exit();
	}
	else
	{
		$country = new Country($countryId,$tempName,$status);
		$countryId = $countryController->update($country);;
		echo $countryId;
		exit();
	}
}
else
{
	
	if($selectedName != null)
	{
		echo "Country already exist";
		exit();
	}
	else
	{
		$country = new Country("",$tempName,"active");
		$id = $countryController->add($country);
		echo $id;
		exit();
	}
}

echo "Operation Failed";
exit();

?>