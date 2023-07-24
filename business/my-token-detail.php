<?php
include('init.php');

$business = $businessController->getById($loggedBusiness->getId());

if ($business == null) {
    echo "Error: Failed to fetch business profile.";
    exit();
}

$id = 0;
if( isset($_GET['id']) ){
    $id = $_GET['id'];
}

$businessToken = $businessTokenController->getById($id);
$users = $userController->getByRole("customer");
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
                                    <h4>Token Details</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label> Location : <?php echo $businessToken->getCity()->getName(); ?> </label>
                                    </div>
                                    <div class="form-group">
                                        <label> Date : <?php echo $businessToken->getTokenDate(); ?> </label>
                                    </div>
                                    <div class="form-group">
                                        <label> From : <?php echo $businessToken->getFromTime(); ?> </label>
                                    </div>
                                    <div class="form-group">
                                        <label> To : <?php echo $businessToken->getToTime(); ?> </label>
                                    </div>
                                    <div class="form-group">
                                        <label> Duration : <?php echo $businessToken->getDuration() . " mins"; ?> </label>
                                    </div>
                                    <div class="form-group">
                                        <label> Status : <?php echo $businessToken->getStatus(); ?> </label>
                                    </div>
                                        <?php
                                        if( strcasecmp($businessToken->getStatus(), "booked") == 0 ){
                                        ?>
                                            <div class="form-group">
                                                <label> Booked By : <?php echo $businessToken->getUser()->getName(); ?> </label>
                                            </div>
                                            <div class="form-group">
                                                <label> Mobile : <?php echo $businessToken->getUser()->getMobile(); ?> </label>
                                            </div>
                                        <?php
                                        }
                                        else{
                                        ?>
                                          <form id="form-1">
                                                <div class="form-group" style="display: none;">
                                                    <div class="pass-group group-img">
                                                        <input type="text" id="businessTokenId" name="businessTokenId" value="<?php echo $businessToken->getId(); ?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label> Select Customer </label>
                                                    <select class="form-control select2" name="userId">
                                                        <?php
                                                        foreach($users as $user){
                                                        ?>
                                                            <option value="<?php echo $user->getId(); ?>">
                                                                <?php echo $user->getName(); ?>
                                                            </option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <button class="btn btn-primary" type="submit">Confirm Booking</button>
                                          </form>
                                        <?php
                                        }
                                        ?>
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

	   // waitingDialog.show('Please wait. Action in progress..!!');
		// AJAX request
		$.ajax({
			url: "my-token-update.php",
			type: "POST",
			contentType: false,
			cache: false,
			processData:false,
			data: new FormData(this),
			success: function(data) {
                data = data.trim();
				if (isNaN(data)) {
					alert("Error: " + data);
					//waitingDialog.hide();
				} else {
					if (data > 0) {
						alert("Token updated successfully");
					   // waitingDialog.hide();
                       location.reload();
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