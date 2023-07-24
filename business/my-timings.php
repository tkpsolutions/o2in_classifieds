<?php
include("init.php");


if (!isset($_SESSION['login_business_id'])) {
    header("Location: logged-user-detail.php");
    exit();
}

$business = $businessController->getById($loggedBusiness->getId());

if ($business == null) {
    echo "Error: Failed to fetch business profile.";
    exit();
}
$businessTimings = $businessTimingController->getByBusinessId($loggedBusiness->getId());
    
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
                    <div class="col-md-4 col-sm-4 col-12">
                        <div class="profile-sidebar">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Add Business Timings</h4>
                                </div>
                                <div class="card-body">
                                <form id="form-1">
                                        <div class="form-group" style="display: none;">
                                            <label class="col-form-label">BusinessId</label>
                                            <div class="pass-group group-img">
                                                <input type="text" id="businessId" name="businessId" value="<?php echo $business->getId(); ?>" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Select Day</label>
                                            <div class="pass-group group-img">
                                                <select  id="dayNumber" name="dayNumber" class="form-control">
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
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">From Time</label>
                                            <div class="pass-group group-img">
                                                <input type="time" class="form-control" id="fromTime" name="fromTime" placeholder="Enter From Time">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">To Time</label>
                                            <div class="pass-group group-img">
                                                <input type="time" class="form-control" id="toTime" name="toTime" placeholder="Enter To Time">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="col-form-label">Is Full Day?</label>
                                            <select class="form-control" id="isFullday" name="isFullday">
                                                <option value="">Select</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="col-form-label">Is Holiday?</label>
                                            <select class="form-control" id="isHoliday" name="isHoliday">
                                                <option value="">Select</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Add Timings</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md8 col-sm-8 col-xs-12">
                        <div class="table-responsive">
                            <table class="listing-table datatable">
                                <thead>
                                    <tr>
										<th>Sl.no</th>
                                        <th>Day Number</th>
                                        <th>From Time</th>
                                        <th>To Time</th>
                                        <th>Is Full Day</th>
                                        <th>Is Holiday</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
									$i = 1;
									foreach ($businessTimings as $timing) 
									{ 
										$fullDay = "";
										if($timing->getIsFullDay() == 1)
										{
											$fullDay = "Yes";
										}
										else
										{
											$fullDay = "No";
										}
										
										$holiday = "";
										if($timing->getIsHoliday() == 1)
										{
											$holiday = "Yes";
										}
										else
										{
											$holiday = "No";
										}
										
										$deleteTiming = "my-timings-delete.php?id=" . $timing->getId();
                                    ?>
                                        <tr>
                                        <td> <?php echo $i++; ?> </td> 
                                        <td> <?php echo PF_ConvertNumberToDay($timing->getDayNumber()); ?> </td>
                                        <td> <?php echo $timing->getFromTime();?></td>
                                        <td> <?php echo $timing->getToTime();?></td>
                                        <td> <?php echo $fullDay; ?></td>
                                        <td> <?php echo $holiday; ?></td>
                                            <td>
                                            <a href="<?php echo $deleteTiming; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
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

                
                //daynumber
                value = document.getElementById("dayNumber").value.trim();
                if (value == "") {
                    alert("Please select a day Number");
                    value = document.getElementById("dayNumber").focus();
                    return false;
                }

                value = document.getElementById("fromTime").value.trim();
                if (value == "") {
                    alert("Please enter a From time");
                    value = document.getElementById("fromTime").focus();
                    return false;
                }

                value = document.getElementById("toTime").value.trim();
                if (value == "") {
                    alert("Please enter a To time");
                    value = document.getElementById("toTime").focus();
                    return false;
                }
                value = document.getElementById("isFullday").value.trim();
                if (value == "") {
                    alert("Please select Full Day option");
                    value = document.getElementById("isFullday").focus();
                    return false;
                }

                value = document.getElementById("isHoliday").value.trim();
                if (value == "") {
                    alert("Please select Holiday option");
                    value = document.getElementById("isHoliday").focus();
                    return false;
                }



               // waitingDialog.show('Please wait. Action in progress..!!');
                // AJAX request
                $.ajax({
                    url: "my-timings-insert.php",
                    type: "POST",
                    contentType: false,
                    cache: false,
                    processData:false,
                    data: new FormData(this),
                    success: function(data) {
                        if (isNaN(data)) {
                            alert("Error: " + data);
                            //waitingDialog.hide();
                        } else {
                            if (data > 0) {
                                alert("Timings added successfully");
                               // waitingDialog.hide();
                                window.location = "my-timings.php";
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