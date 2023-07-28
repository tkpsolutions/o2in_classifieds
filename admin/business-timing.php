<?php
include('init.php');

$id = 0;
$businessId = 0;
$dayNumber = "";
$fromTime = "";
$toTime = "";
$isFullDay = 0;
$isHoliday = 0;
$status = 0;

$businessTimings = null;

if (isset($_GET['id'])) {
    $businessId = $_GET['id'];
    $business = $businessController->getById($businessId);
    if ($business == null) {
        header("location: business-view.php");
        exit();
    }
    $businessTimings = $businessTimingController->getByBusinessId($businessId);
} else {
    header("location: business-view.php");
    exit();
}
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
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <form id="form-1" method="POST">
                                            <input type="hidden" value="<?php echo $businessId; ?>" name="businessId" id="businessId" />
                                            <div class="form-group">
                                                <label for="dayNumber">Day Number</label>
                                                <select class="form-control" id="dayNumber" name="dayNumber">
                                                    <option value="0"> Select a day </option>
                                                    <?php
                                                    for($i = 1; $i <= 7; $i++){
                                                    ?>
                                                        <option value="<?php echo $i; ?>">
                                                            <?php echo PF_ConvertNumberToDay($i); ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="fromTime">From Time</label>
                                                <input type="time" class="form-control" id="fromTime" name="fromTime" placeholder="Enter From Time">
                                            </div>

                                            <div class="form-group">
                                                <label for="toTime">To Time</label>
                                                <input type="time" class="form-control" id="toTime" name="toTime" placeholder="Enter To Time">
                                            </div>

                                            <div class="form-group">
                                                <label for="isFullday">Is Full Day?</label>
                                                <select class="form-control" id="isFullday" name="isFullday">
                                                    <option value="">Select</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="isHoliday">Is Holiday?</label>
                                                <select class="form-control" id="isHoliday" name="isHoliday">
                                                    <option value="">Select</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>

                                            <button type="submit" class="btn btn-md btn-success">Add</button>
                                        </form>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <table class="table table-bordered app-table">
                                            <thead>
                                                <tr>
                                                    <th> Day Number </th>
                                                    <th> From Time </th>
                                                    <th> To Time </th>
                                                    <th> Is Full Day </th>
                                                    <th> Is Holiday </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                //$businessTimings = $businessTimingController->getAll();
                                                foreach ($businessTimings as $businessTiming) {
                                                    $businessTimingId = $businessTiming->getId();
                                                    $dayNumber = $businessTiming->getDayNumber();
                                                    $fromTime = $businessTiming->getFromTime();
                                                    $toTime = $businessTiming->getToTime();
                                                    $isFullDay = $businessTiming->getIsFullDay();
                                                    $isHoliday = $businessTiming->getIsHoliday();
                                                    $status = $businessTiming->getStatus();
                                                    $deleteLink = "business-timing-delete.php?id=" . $businessTimingId . "&businessId=" . $businessId;

                                                    //row class
                                                    $rowClass = "";
                                                    if( $isFullDay == 1 ){
                                                        $rowClass = "bg-success";
                                                    }
                                                    else if( $isHoliday == 1 ){
                                                        $rowClass = "bg-danger";
                                                    }
                                                ?>
                                                    <tr class="<?php echo $rowClass; ?>">
                                                        <td><?php echo PF_ConvertNumberToDay($dayNumber); ?></td>
                                                        <td><?php echo $fromTime; ?></td>
                                                        <td><?php echo $toTime; ?></td>
                                                        <td><?php echo $isFullDay ? 'Yes' : 'No'; ?></td>
                                                        <td><?php echo $isHoliday ? 'Yes' : 'No'; ?></td>

                                                        <td>
                                                            <a href="<?php echo $deleteLink; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
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

    <script>
        $(document).ready(function() {
            // Form submission
            $("#form-1").on('submit', function(e) {
                e.preventDefault();


                //business id
                value = document.getElementById("dayNumber");
                if (value.selectedIndex == 0) {
                    showAlert("2", "Please select Day");
                    value = document.getElementById("dayNumber").focus();
                    return false;
                }

                //daynumber
                value = document.getElementById("dayNumber").value.trim();
                if (value == "") {
                    showAlert("2", "Please select a day Number");
                    value = document.getElementById("dayNumber").focus();
                    return false;
                }

                value = document.getElementById("fromTime").value.trim();
                if (value == "") {
                    showAlert("2", "Please enter a From time");
                    value = document.getElementById("fromTime").focus();
                    return false;
                }

                value = document.getElementById("toTime").value.trim();
                if (value == "") {
                    showAlert("2", "Please enter a To time");
                    value = document.getElementById("toTime").focus();
                    return false;
                }
                value = document.getElementById("isFullday").value.trim();
                if (value == "") {
                    showAlert("2", "Please select Full Day option");
                    value = document.getElementById("isFullday").focus();
                    return false;
                }

                value = document.getElementById("isHoliday").value.trim();
                if (value == "") {
                    showAlert("2", "Please select Holiday option");
                    value = document.getElementById("isHoliday").focus();
                    return false;
                }



                waitingDialog.show('Please wait. Action in progress..!!');
                // AJAX request
                $.ajax({
                    url: "business-timing-insert.php",
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
                                window.location = "business-timing.php?id=" + data;
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