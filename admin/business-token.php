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
$businessTokens = $businessTokenController->getByBusinessId($businessId);
$businessServices = $businessServiceController->getAll();
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
                                    Create Single Token : <?php echo $business->getName(); ?>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <form id="form-1" method="POST">
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
                                                <label for="tokenDate">Token Date</label>
                                                <input type="date" class="form-control" id="tokenDate" name="tokenDate" placeholder="Enter Token Date">
                                            </div>

                                            <div class="form-group">
                                                <label for="fromTime">From Time</label>
                                                <input type="time" class="form-control" id="fromTime" name="fromTime" placeholder="Enter From Time">
                                            </div>

                                            <div class="form-group">
                                                <label for="Duration">Duration(In Mins)</label>
                                                <input type="number" class="form-control" id="duration" name="duration" placeholder="Enter Duration">
                                            </div>



                                            <button type="submit" class="btn btn-md btn-success">Add</button>
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

    <script>
        $(document).ready(function() {
            // Form submission
            $("#form-1").on('submit', function(e) {
                e.preventDefault();

                //business id
                value = document.getElementById("businessServiceId");
                if (value.selectedIndex == 0) {
                    showAlert("2", "Please select Business Srevice");
                    value = document.getElementById("businessServiceId").focus();
                    return false;
                }
                //daynumber
                value = document.getElementById("cityId");
                if (value.selectedIndex == 0) {
                    showAlert("2", "Please select city");
                    value = document.getElementById("cityId").focus();
                    return false;
                }
                value = document.getElementById("tokenDate");
                if (value.selectedIndex == 0) {
                    showAlert("2", "Please select token Date");
                    value = document.getElementById("tokenDate").focus();
                    return false;
                }
                value = document.getElementById("fromTime").value.trim();
                if (value == "") {
                    showAlert("2", "Please enter a From time");
                    value = document.getElementById("fromTime").focus();
                    return false;
                }

                value = document.getElementById("duration").value.trim();
            if (value === "") {
                showAlert("2", "Please enter a Duration");
                document.getElementById("duration").focus();
                return false;
            }
                
                waitingDialog.show('Please wait. Action in progress..!!');
                // AJAX request
                $.ajax({
                    url: "business-token-insert.php",
                    type: "POST",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (isNaN(data)) {
                            showAlert("2", "Error: " + data);
                            waitingDialog.hide();
                        } else {
                            if (data > 0) {
                                showAlert("1", "Successfully inserted");
                                waitingDialog.hide();
                                window.location = "business-token.php?id=" + data;
                            } else {
                                showAlert("2", "Error: " + data);
                                waitingDialog.hide();
                            }
                        }
                    },
                    error: function() {
                        showAlert("2", "Oops something went wrong. Please try later.");
                        waitingDialog.hide();
                    }
                });
            });
        });
    </script>


</body>

</html>