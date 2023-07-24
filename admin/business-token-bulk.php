<?php
// businessToken.php

include('init.php');
$businessId = 0;
if (isset($_GET['id'])) {
    $businessId = $_GET['id'];
}
$business = $businessController->getById($businessId);
if ($business == null) {
    header("location: business-view.php");
    exit();
}
$businessTokenId = 0;
if (isset($_GET['token_id'])) {
    $businessTokenId = $_GET['token_id'];
}
$businessToken = $businessTokenController->getById($businessTokenId);
$businessServiceId = 0;
$cityId = 0;
$tokenDate = "";
$fromTime = "";
$toTime = "";
$duration = "";
$userId = 0;
$bookedDateTime = "";
$walletId = 0;
$bookingRemarks = "";

if ($businessToken != null) {
    $id = $businessToken->getId();
    $businessId = $businessToken->getBusinessId();
    $businessServiceId = $businessToken->getBusinessServiceId();
    $cityId = $businessToken->getCityId();
    $tokenDate = $businessToken->getTokenDate();
    $fromTime = $businessToken->getFromTime();
    $toTime = $businessToken->getToTime();
    $duration = $businessToken->getDuration();
    $userId = $businessToken->getUserId();
    $bookedDateTime = $businessToken->getBookedDateTime();
    $walletId = $businessToken->getWalletId();
    $bookingRemarks = $businessToken->getBookingRemarks();
}
$businessServices = $businessServiceController->getByBusinessId($businessId);
$cities = $cityController->getAll();
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
                                    Create Multiple Token : <?php echo $business->getName(); ?>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <form method="GET" action="business-token-bulk-confirm.php">
                                            <input type="hidden" value="<?php echo $businessId; ?>" name="businessId" id="businessId" />
                                            <div class="form-group">
                                                <label for="BusinessService">Business Service</label>

                                                <select name="businessServiceId" id="businessServiceId" class="form-control select2">
                                                    <option>Select</option>
                                                    <?php
                                                    foreach ($businessServices as $businessService) {
                                                        $selected = "";
                                                        if ($businessService->getId() == $businessServiceId) {
                                                            $selected = "selected";
                                                        }
                                                    ?>
                                                        <option <?php echo $selected; ?> value="<?php echo $businessService->getId(); ?>"><?php echo $businessService->getName(); ?></option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="city">City</label>

                                                <select name="cityId" id="cityId" class="form-control select2">
                                                    <option>Select</option>
                                                    <?php
                                                    foreach ($cities as $city) {
                                                        $selected = "";
                                                        if ($city->getId() == $cityId) {
                                                            $selected = "selected";
                                                        }
                                                    ?>
                                                        <option <?php echo $selected; ?> value="<?php echo $city->getId(); ?>"><?php echo $city->getName(); ?></option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="tokenDate">Token From Date</label>
                                                <input type="date" class="form-control" id="tokenFromDate" name="tokenFromDate" placeholder="Enter From Token Date">
                                            </div>

                                            <div class="form-group">
                                                <label for="tokenDate">Token From Date</label>
                                                <input type="date" class="form-control" id="tokenToDate" name="tokenToDate" placeholder="Enter To Token Date">
                                            </div>

                                            <div class="form-group">
                                                <label for="fromTime">From Time</label>
                                                <input type="time" class="form-control" id="fromTime" name="fromTime" placeholder="Enter From Time">
                                            </div>

                                            <div class="form-group">
                                                <label for="fromTime">To Time</label>
                                                <input type="time" class="form-control" id="toTime" name="toTime" placeholder="Enter To Time">
                                            </div>

                                            <div class="form-group">
                                                <label for="Duration">Duration(In Mins)</label>
                                                <input type="number" class="form-control" id="duration" name="duration" placeholder="Enter Duration">
                                            </div>
                                            <button type="submit" class="btn btn-md btn-success">Preview</button>
                                        </form>
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