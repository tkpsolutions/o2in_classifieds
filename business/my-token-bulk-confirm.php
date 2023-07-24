<?php
include('init.php');

if (!isset($_SESSION['login_business_id'])) {
    header("Location: logged-user-detail.php");
    exit();
}

$business = $businessController->getById($loggedBusiness->getId());
$businessId = $business->getId();

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
    <?php include("head.php"); ?>
    <title>O2in | Business Listing and Booking Management</title>
</head>

<body>
    <div class="main-wrapper">
        <?php include("menu.php"); ?>
        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <div class="container">
                <div class="row">
                    <div class="col-md8 col-sm-8 col-xs-12">
                        <div class="table-responsive">
                            <form action="my-token-bulk-insert.php" method="POST">
                                <input type="text" value="<?php echo $businessId; ?>" name="businessId" class="d-none" />
                                <input type="text" value="<?php echo $businessServiceId; ?>" name="businessServiceId" class="d-none" />
                                <input type="text" value="<?php echo $cityId; ?>" name="cityId" class="d-none" />
                                <input type="text" value="<?php echo $startDate; ?>" name="tokenFromDate" class="d-none" />
                                <input type="text" value="<?php echo $endDate; ?>" name="tokenToDate" class="d-none" />
                                <input type="text" value="<?php echo $startTimeSource; ?>" name="fromTime" class="d-none" />
                                <input type="text" value="<?php echo $endTimeSource; ?>" name="toTime" class="d-none" />
                                <input type="text" value="<?php echo $slotDurationMinutes; ?>" name="duration" class="d-none" />
                                <button type="submit" class="btn btn-success">Confirm Tokens</button>
                                <br><br>
                            </form>
                            <table class="listing-table datatable">
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
                                            if ($count == 1) {
                                                $rowClass = "bg-info";
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
            <!-- /Dashboard Content -->
            <?php include("footer.php"); ?>
        </div>
    </div>

</body>

</html>

<script>
    $(document).ready(function() {
        // Form submission
        $("#form-1").on('submit', function(e) {
            e.preventDefault();

            value = document.getElementById("businessServiceId");
            if (value.selectedIndex == 0) {
                alert("Please select Business Service");
                value = document.getElementById("businessServiceId").focus();
                return false;
            }
            //daynumber
            value = document.getElementById("cityId");
            if (value.selectedIndex == 0) {
                alert("Please select city");
                value = document.getElementById("cityId").focus();
                return false;
            }
            value = document.getElementById("tokenDate");
            if (value.selectedIndex == 0) {
                alert("Please select token Date");
                value = document.getElementById("tokenDate").focus();
                return false;
            }
            value = document.getElementById("fromTime").value.trim();
            if (value == "") {
                alert("Please enter a From time");
                value = document.getElementById("fromTime").focus();
                return false;
            }

            value = document.getElementById("duration").value.trim();
            if (value === "") {
                alert("Please enter a Duration");
                document.getElementById("duration").focus();
                return false;
            }



            // waitingDialog.show('Please wait. Action in progress..!!');
            // AJAX request
            $.ajax({
                url: "my-token-insert.php",
                type: "POST",
                contentType: false,
                cache: false,
                processData: false,
                data: new FormData(this),
                success: function(data) {
                    if (isNaN(data)) {
                        alert("Error: " + data);
                        //waitingDialog.hide();
                    } else {
                        if (data > 0) {
                            alert("Token added successfully");
                            // waitingDialog.hide();
                            window.location = "my-token.php";
                        } else {
                            alert("Error: " + data);
                            //waitingDialog.hide();
                        }
                    }
                },
                error: function() {
                    alert("Oops something went wrong. Please try later.");
                    //waitingDialog.hide();
                }
            });
        });
    });
</script>