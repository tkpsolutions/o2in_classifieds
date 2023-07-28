<?php

include('init.php');

$businessId = $_POST['businessId'];
$dayNumber = $_POST['dayNumber'];
$fromTime = $_POST['fromTime'];
$toTime = $_POST['toTime'];
$isFullday = $_POST['isFullday'];
$isHoliday = $_POST['isHoliday'];
//$status = $_POST['status'];

if( $isFullday == 1 && $isHoliday == 1 ){
    echo "Can not select holiday and fullday at same time";
    exit();
}

$businessTiming = new BusinessTiming("",$businessId, $dayNumber, $fromTime, $toTime, $isFullday, $isHoliday,'Active');
$businessTimingId = $businessTimingController->add($businessTiming);

echo $businessId;
exit();
?>
