<?php
include('init.php');

$businessTokenId = $_POST['businessTokenId'];
$userId = $_POST['userId'];

$bookedDateTime = "";
$walletId = 0;
$bookingRemarks = "Booked from vendor";
$createdDateTime = Null;
$updatedDateTime = Null;

$businessTokenController->updateBooking($businessTokenId, $userId, $walletId, $bookingRemarks);

echo 1;
exit();
?>
