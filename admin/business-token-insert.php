<?php
include('init.php');

$businessId = $_POST['businessId'];
$businessServiceId = $_POST['businessServiceId'];
$cityId = $_POST['cityId'];
$tokenDate = $_POST['tokenDate'];
$fromTime = $_POST['fromTime'];
$duration = $_POST['duration'];
$toTime = date("h:i:s A", strtotime($fromTime. ' + ' . $duration . "minute"));
$userId = 0;
$bookedDateTime = "";
$walletId = 0;
$bookingRemarks = "";
$createdDateTime = Null;
$updatedDateTime = Null;

$businessToken = new BusinessToken("", $businessId, $businessServiceId, $cityId, $tokenDate, $fromTime, $toTime, $duration, $userId, $bookedDateTime, $walletId, $bookingRemarks, $createdDateTime, $updatedDateTime,'open');
$businessTokenId = $businessTokenController->add($businessToken);

if ($businessTokenId > 0) {
    echo $businessId;
} else {
    echo "Error: Failed to insert business token.";
}
exit();
?>
