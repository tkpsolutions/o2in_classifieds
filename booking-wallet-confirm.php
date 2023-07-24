<?php
	include('init.php');
	//loggedUser
    $businessId = $_POST['businessId'];
	$busienssTokenId = $_POST['busienssTokenId'];
    $bookingRemarks = $_POST['bookingRemarks'];

    //make a wallet entry
    //$id, $userId, $deposit, $used, $refund, $gift, $actionDateTime, $reference, $remarks, $status
    $wallet = new Wallet(0, $loggedUser->getId(), 0, 10, 0, 0, "", "For booking token ref Id : " .$busienssTokenId, "Booking Confirmation", "active");
    $walletId = $walletController->add($wallet);

    //updateBooking($businessTokenId, $userId, $walletId, $bookingRemarks)
    $businessTokenController->updateBooking($busienssTokenId, $loggedUser->getId(), $walletId, $bookingRemarks);

    header("location: my-bookings.php");
	exit();
	
?>