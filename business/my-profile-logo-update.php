<?php
include('init.php');

$businessDetailId = $_POST['business_detail_id'];

//logo
//getting extension
$sourcePath=$_FILES['logo_image']['tmp_name'];
$imagename=$_FILES['logo_image']['name'];
$ext=end((explode(".",$imagename)));

$businessDetail = new BusinessDetail($businessDetailId,"","",$ext,"","","","","", "", "","","");
$businessDetailController->updateLogo($businessDetail);

$filepath="../images/businesslogo/".$businessDetailId.'.'.$ext;
move_uploaded_file($sourcePath,$filepath);

echo 0;
exit();

?>