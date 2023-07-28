<?php
include('init.php');

$businessId = $_POST['businessId'];
$businessServiceId = $_POST['businessServiceId'];
$cityId = $_POST['cityId'];
$startDate = $_POST['tokenFromDate'];
$endDate = $_POST['tokenToDate'];
$startTimeSource = $_POST['fromTime'];
$endTimeSource = $_POST['toTime'];
$slotDurationMinutes = $_POST['duration'];
$slotDuration = '+' . $slotDurationMinutes . ' minutes'; //minutes

//altered endDate
$endDateAltered = new DateTime($endDate);
$endDateAltered->add(new DateInterval('P1D'));

$userId = 0;
$bookedDateTime = "";
$walletId = 0;
$bookingRemarks = "";
$createdDateTime = Null;
$updatedDateTime = Null;


$period = new DatePeriod(
    new DateTime($startDate),
    new DateInterval('P1D'),
    //$end = $end->modify( '+1 day' ); 
    //new DateTime($endDate)
    new DateTime($endDateAltered->format('Y-m-d'))
);

$businessTokens = array();
foreach ($period as $key => $value) {
    //re-init the time range
    $startTime = $startTimeSource;
    $endTime = $endTimeSource;

    $dayNumber = date('N', strtotime($value->format('Y-m-d')));
    $dateTemp = date('Y-m-d', strtotime($value->format('Y-m-d')));

    //echo "<hr> --> " . $dateTemp;
    //echo "<br> --> " . $startTime . " to " . $endTime;
    while (strtotime($endTime) > strtotime($startTime)) {
        $tokenEndTime = date('H:i:s', strtotime($startTime . $slotDuration));

        $businessToken = new BusinessToken("", $businessId, $businessServiceId, $cityId, $dateTemp, $startTime, $endTime, $slotDurationMinutes, $userId, $bookedDateTime, $walletId, $bookingRemarks, $createdDateTime, $updatedDateTime,'open');

        array_push($businessTokens, $businessToken);

        $startTime = $tokenEndTime;
    }
}
$businessTokenController->addBulk($businessTokens);
header("location: business-tokens.php?id=" . $businessId);
exit();
?>
