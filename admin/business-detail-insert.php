<?php

include('init.php');

$businessdetailId = $_POST['id'];
$businessId = $_POST['businessId'];
$descriptionLong = str_replace("'", "\'", $_POST['descriptionLong']);
$addressLine1 = str_replace("'", "\'", $_POST['addressLine1']);
$addressLine2 = str_replace("'", "\'", $_POST['addressLine2']);
$pincode = str_replace("'", "\'", $_POST['pincode']);
$lat = str_replace("'", "\'", $_POST['lat']);
$lng = str_replace("'", "\'", $_POST['lng']);
$createdDateTime = null;
$updatedDateTime = null;

$logo = null;
$logoExt = null;

$banner = null;
$bannerExt = null;

if (isset($_FILES['logo'])) {
    $logo = $_FILES['logo']['name'];
    $logoExtension = explode(".", $logo);
    $logoExt = end($logoExtension);
} else {
    $logo = '';
    $logoExt = '';
}

if (isset($_FILES['banner'])) {
    $banner = $_FILES['banner']['name'];
    $bannerExtension = explode(".", $banner);
    $bannerExt = end($bannerExtension);
} else {
    $banner = '';
    $bannerExt = '';
}

$existingBusinessDetail = $businessDetailController->getById($businessdetailId);

if ($businessdetailId > 0) {
    $status = $_POST['status'];
    if ($existingBusinessDetail != null && $existingBusinessDetail->getId() != $businessdetailId) {
        echo "Business Detail already exists";
        exit();
    } else {
        if( $logoExt == null ){
            $logoExt = $existingBusinessDetail->getLogo();
        }
        if( $bannerExt == null ){
            $bannerExt = $existingBusinessDetail->getBanner();
        }
        
        $businessdetail = new BusinessDetail($businessdetailId, $businessId, $descriptionLong, $logoExt, $bannerExt, $addressLine1, $addressLine2, $pincode, $lat, $lng, $createdDateTime, $updatedDateTime, $status);
        $businessdetailId = $businessDetailController->update($businessdetail);
    }
} else {
    if ($existingBusinessDetail != null) {
        echo "Business Detail already exists";
        exit();
    } else {
        $businessdetail = new BusinessDetail("", $businessId, $descriptionLong, $logoExt, $bannerExt, $addressLine1, $addressLine2, $pincode, $lat, $lng, $createdDateTime, $updatedDateTime, 'Active');
        $businessdetailId = $businessDetailController->add($businessdetail);
    }
}

//upload image if loaded
if( $logoExt != null ){
    $logoSourcePath = $_FILES['logo']['tmp_name'];
    $logoFilepath = "../images/businesslogo/" . $businessdetailId . '.' . $logoExt;
    move_uploaded_file($logoSourcePath, $logoFilepath);
}
if( $bannerExt != null ){
    $bannerSourcePath = $_FILES['banner']['tmp_name'];
    $bannerFilepath = "../images/businessbanner/" . $businessdetailId . '.' . $bannerExt;
    move_uploaded_file($bannerSourcePath, $bannerFilepath);
}

echo $businessId;
exit();

?>
