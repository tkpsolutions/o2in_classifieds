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

//reading inputs
$businessServiceId = 0;
if( isset($_GET['businessServiceId']) ){
    $businessServiceId = $_GET['businessServiceId'];
}

$cityId = 0;
if( isset($_GET['cityId']) ){
    $cityId = $_GET['cityId'];
}

$startDate = null;
if( isset($_GET['tokenFromDate']) ){
    $startDate = $_GET['tokenFromDate'];
}

$endDate = null;
if( isset($_GET['tokenToDate']) ){
    $endDate = $_GET['tokenToDate'];
}

$status = null;
if( isset($_GET['status']) ){
    $status = $_GET['status'];
}

$businessTokens = $businessTokenController->search1($loggedBusiness->getId(), $startDate, $endDate, $cityId, $businessServiceId, $status);
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
                    <div class="col-md-3 col-sm-4 col-12">
                        <div class="profile-sidebar">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Add Business Token</h4>
                                </div>
                                <div class="card-body">
									<form action="my-tokens.php" method="GET">
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
                                            <label class="col-form-label">Status</label>
                                            <div class="pass-group group-img">
                                                <select class="form-control" name="status">
                                                    <option>Open</option>
                                                    <option>Booked</option>
                                                </select>
                                            </div>
                                        </div>
										<button class="btn btn-primary" type="submit">Add Tag</button>
									</form>
								</div>
							</div>
						</div>
					</div>
                       
                    
                    <div class="col-md-9 col-sm-8 col-xs-12">
                        <div class="table-responsive">
                            <table class="listing-table datatable">
						        <thead>
                                    <tr>
                                        <th> Sl.no.</th>
                                        <th> Business Service </th>
                                        <th> City</th>
                                        <th> Token Date </th>
                                        <th> From Time </th>
                                        <th> To Time </th>
                                        <th> Duration<br>(in mins) </th>
                                        <th> Status </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i =1;
                                    foreach ($businessTokens as $businessToken) { 
                                        // $deleteToken = "my-token-delete.php?id=" . $businessToken->getId();
                                        $buttonClass = "btn-info";
                                        if( strcasecmp($businessToken->getStatus(), "booked") == 0 ){
                                            $buttonClass = "btn-success";
                                        }
                                        ?>
                                        <tr>
                                            <td> <?php echo $i++; ?> </td>
                                            <td><?php echo $businessToken->getBusinessService()->getName(); ?></td>
                                            <td><?php echo $businessToken->getCity()->getName(); ?></td>
                                            <td><?php echo $businessToken->getTokenDate(); ?></td>
                                            <td><?php echo $businessToken->getFromTime(); ?></td>
                                            <td><?php echo $businessToken->getToTime(); ?></td>
                                            <td><?php echo $businessToken->getDuration(); ?></td>
                                            <td>
                                                <a href="my-token-detail.php?id=<?php echo $businessToken->getId(); ?>" class="btn btn-sm <?php echo $buttonClass; ?>">
                                                    <?php echo $businessToken->getStatus(); ?>
                                                </a>
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