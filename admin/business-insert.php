<?php
include('init.php');
$businessId= $_POST['id'];
$name = str_replace("'","\'", $_POST['name']);
$descriptionShort = str_replace("'","\'", $_POST['descriptionShort']);
$cityId = $_POST['cityId'];
$categoryId = $_POST['categoryId'];
$mobile = str_replace("'","\'", $_POST['mobile']);
$password = str_replace("'","\'", $_POST['password']);
$userId = $_POST['userId'];

$createdDateTime = null;
$updatedDateTime = null;

//previour it was calling usercontroller
$duplicationBusiness = $businessController->getByMobile($mobile);

if( strcasecmp($mobile, "0000000000") == 0 ){
	if( $duplicationBusiness != null && $businessId != $duplicationBusiness->getId()  ){
		echo "Mobile number already in use";
		exit();
	}
}

if( $businessId > 0  ){
	//update
	$status = $_POST['status'];
	$business = new Business ($businessId, $name, $descriptionShort, $userId, $cityId, $categoryId, $createdDateTime,$updatedDateTime,$mobile, $password, $status);
	$businessController->update($business);
	echo $businessId;
	exit();

}
else{
	//new
	$business = new Business("", $name, $descriptionShort, $userId, $cityId, $categoryId, "", "",$mobile, $password,"Active");
	$id = $businessController->add($business);
	echo $id;
	exit();
}

echo "Operation Failed";
exit();


/*
if($businessId > 0)
{	
	 
	if($selectedName != null && $selectedName->getId() != $businessId)
	{	
		echo "business already exist";
		exit();
	}
	else
	$createdDateTime = $_POST['createdDateTime'];
    $updatedDateTime = $_POST['updatedDateTime'];
	$status = $_POST['status'];
	{  
		$business = new Business ($businessId, $tempName, $descriptionShort, $cityId, $categoryId, $createdDateTime,$updatedDateTime,$mobile, $password, $status);
		$businessId = $businessController->update($business);
		echo $businessId;
		exit();
	}

}
else
{
	
	if($selectedName != null)
	{
		echo "Business already exist";
		exit();
	}
	else
	{
        $business = new Business ("", $tempName, $descriptionShort, $cityId, $categoryId, "", "",$mobile, $password,"Active");
		$id = $businessController->add($business);
		echo $id;
		exit();
	}
}

echo "Operation Failed";
exit();
*/
?>


