<?php
$noLogin = 1;
include('init.php');

//business table
$businessId = 0;
$name = $_POST['name'];
$shortDescription = "";
$cityId = $_POST['city_id'];
$categoryId = $_POST['category_id'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];

$tempName = str_replace("'","\'",$name);
$tempShortDesc = str_replace("'","\'",$shortDescription);

$duplicate = $businessController->getByMobile($mobile);
if( $duplicate != null ){
    echo "Mobile number already taken.";
    exit();
}

//business detail table
$businessDetailId = $_POST['business_detail_id'];
$description = $_POST['description'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$pincode = $_POST['pincode'];

$tempDescription = str_replace("'","\'",$description);
$tempAddress1 = str_replace("'","\'",$address1);
$tempAddress2 = str_replace("'","\'",$address2);

$userId = 1;

$lat = "0";
$lng = "0";

$business = new Business($businessId,$tempName,$tempShortDesc, $userId, $cityId,$categoryId,"","",$mobile,$password,"active");
$businessDetailId = $businessController->add($business);

$_SESSION['login_business'] = 1;
$_SESSION['login_business_id'] = $businessDetailId;

echo $businessDetailId;
exit();




?>