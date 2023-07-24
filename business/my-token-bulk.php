<?php
include('init.php');

if (!isset($_SESSION['login_business_id'])) {
    header("Location: logged-user-detail.php");
    exit();
}

$business = $businessController->getById($loggedBusiness->getId());


if ($business == null) {
    echo "Error: Failed to fetch business profile.";
    exit();
}

$businessTokens = $businessTokenController->getByBusinessId($loggedBusiness->getId());
$businessServices = $businessServiceController->getByBusinessId($loggedBusiness->getId());
$cities = $cityController->getAll();
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
                                    <h4>Add Business Token (Bulk)</h4>
                                </div>
                                <div class="card-body">
									<form method="GET" action="my-token-bulk-confirm.php">
										<div class="form-group" style="display: none;">
											<label class="col-form-label">BusinessId</label>
											<div class="pass-group group-img">
												<input type="text" id="businessId" name="businessId" value="<?php echo $business->getId(); ?>" readonly />
											</div>
										</div>
										<div class="form-group">
                                            <label class="col-form-label">Business Service</label>
                                            <div class="pass-group group-img">
                                            <select class="form-control" id="businessServiceId" name="businessServiceId">
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
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">City</label>
                                            <div class="pass-group group-img">
                                            <select class="form-control" id="cityId" name="cityId">
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
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Token From Date</label>
                                            <div class="pass-group group-img">
                                            <input type="date" class="form-control" id="tokenFromDate" name="tokenFromDate" placeholder="Enter Token Date">
                                             </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Token To Date</label>
                                            <div class="pass-group group-img">
                                            <input type="date" class="form-control" id="tokenToDate" name="tokenToDate" placeholder="Enter Token Date">
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
                                                <input type="time" class="form-control" id="toTime" name="toTime" placeholder="Enter From Time">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Duration(minutes)</label>
                                            <div class="pass-group group-img">
                                            <input type="number" class="form-control" id="duration" name="duration" placeholder="Enter Duration">
                                            </div>
                                        </div>
										<button class="btn btn-primary" type="submit">Preview Tags</button>
									</form>
								</div>
							</div>
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
			processData:false,
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