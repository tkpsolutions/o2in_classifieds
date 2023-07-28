<?php
// businessToken.php

include('init.php');
$businessId = 0;
if (isset($_GET['businessId'])) {
    $businessId = $_GET['businessId'];
}
$business = $businessController->getById($businessId);
if ($business == null) {
    header("location: business-view.php");
    exit();
}

//reading inputs
$businessServiceId = $_GET['businessServiceId'];
$cityId = $_GET['cityId'];
$startDate = $_GET['tokenFromDate'];
$endDate = $_GET['tokenToDate'];
$startTimeSource = $_GET['fromTime'];
$endTimeSource = $_GET['toTime'];

$period = new DatePeriod(
    new DateTime($startDate),
    new DateInterval('P1D'),
    //$end = $end->modify( '+1 day' ); 
    new DateTime($endDate)
);

$slotDurationMinutes = $_GET['duration'];
$slotDuration = '+' . $slotDurationMinutes . ' minutes'; //minutes
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Business Timings | <?php echo $websiteTitle; ?></title>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php include('head.php'); ?>

</head>

<body>

    <!-- ... Previous Code ... -->

    <div id="wrapper">

        <?php include('menu.php'); ?>

        <div id="page-wrapper">

            <div class="admin-panel-content">
                <div class="row">
                    <div class="col-xs-12">
                        <?php include("business-menu.php"); ?>
                        <div class="panel app-panel-1">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    List of Business Timings : <?php echo $business->getName(); ?>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <form action="business-token-bulk-insert.php" method="POST">
                                        <input type="text" value="<?php echo $businessId; ?>" name="businessId" />
                                        <input type="text" value="<?php echo $businessServiceId; ?>" name="businessServiceId" />
                                        <input type="text" value="<?php echo $cityId; ?>" name="cityId" />
                                        <input type="text" value="<?php echo $startDate; ?>" name="tokenFromDate" />
                                        <input type="text" value="<?php echo $endDate; ?>" name="tokenToDate" />
                                        <input type="text" value="<?php echo $startTimeSource; ?>" name="fromTime" />
                                        <input type="text" value="<?php echo $endTimeSource; ?>" name="toTime" />
                                        <input type="text" value="<?php echo $slotDurationMinutes; ?>" name="duration" />
                                        <button type="submit" class="btn btn-success">Confirm Tokens</button>
                                    </form>
                                    <div class="col-md-8 col-md-push-2 col-sm-12 col-xs-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>From Time</th>
                                                    <th>To Time</th>
                                                    <th>Duration (mins)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($period as $key => $value) {
                                                    //re-init the time range
                                                    $startTime = $startTimeSource;
                                                    $endTime = $endTimeSource;

                                                    $dayNumber = date('N', strtotime($value->format('Y-m-d')));
                                                    $dateTemp = date('Y-m-d', strtotime($value->format('Y-m-d')));

                                                    //echo "<hr> --> " . $dateTemp;
                                                    //echo "<br> --> " . $startTime . " to " . $endTime;
                                                    $count = 1;
                                                    while (strtotime($endTime) > strtotime($startTime)) {
                                                        $tokenEndTime = date('H:i:s', strtotime($startTime . $slotDuration));
                                                        //echo "<br> --------------> " . $tokenEndTime;

                                                        //only for first row
                                                        $rowClass = "";
                                                        if( $count == 1 ){
                                                            $rowClass = "bg-primary";
                                                        }
                                                ?>
                                                        <tr class="<?php echo $rowClass; ?>">
                                                            <td><?php echo $dateTemp; ?></td>
                                                            <td><?php echo $startTime; ?></td>
                                                            <td><?php echo $tokenEndTime; ?></td>
                                                            <td><?php echo $slotDurationMinutes . " Mins"; ?></td>
                                                        </tr>
                                                <?php
                                                        $count++;
                                                        $startTime = $tokenEndTime;
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include('footer.php'); ?>

</body>

</html>