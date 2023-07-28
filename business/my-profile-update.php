<?php
include('init.php');

//business table
$businessId = $_POST['business_id'];
$name = $_POST['name'];
$shortDescription = $_POST['short_desc'];
$cityId = $_POST['city_id'];
$categoryId = $_POST['category_id'];
$mobile = $_POST['mobile'];

$tempName = str_replace("'","\'",$name);
$tempShortDesc = str_replace("'","\'",$shortDescription);


//business detail table
$businessDetailId = $_POST['business_detail_id'];
$description = $_POST['description'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$pincode = $_POST['pincode'];

$tempDescription = str_replace("'","\'",$description);
$tempAddress1 = str_replace("'","\'",$address1);
$tempAddress2 = str_replace("'","\'",$address2);

$lat = $_POST['lat'];
$lng = $_POST['lng'];

$businessOriginal = $businessController->getById($businessId);

$business = new Business($businessId,$tempName,$tempShortDesc, $businessOriginal->getUserId(), $cityId,$categoryId,"","",$mobile,"","");
$businessController->update($business);

$businessDetail = $businessDetailController->getById($businessDetailId);
$logo = "";
$banner = "";
if( $businessDetail != null ){
    $logo = $businessDetail->getLogo();
    $banner = $businessDetail->getBanner();
}

//$id, $businessId, $descriptionLong, $logo, $banner, $addressLine1, $addressLine2, $pincode, $lat, $lng, $createdDateTime, $updatedDateTime, $status
$businessDetail = new BusinessDetail($businessDetailId,$businessId,$tempDescription,$logo,$banner,$tempAddress1,$tempAddress2,$pincode, $lat, $lng, "","","");
if( $businessDetailId > 0 ){
    $businessDetailController->update($businessDetail);
}
else{
    $businessDetailController->add($businessDetail);
}


echo 0;
exit();




?>