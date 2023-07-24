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

$businessTags = $businessTagController->getByBusinessId($loggedBusiness->getId());
$tags = $tagController->getByCategoryId($business->getCategoryId());
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
                                    <h4>Add Business Tag</h4>
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
											<label>Select Tag</label>
											<select name="tag_id" id="tag_id" class="form-control">
												<option>Select</option>
												<?php
												foreach ($tags as $tag) 
												{
												?>
													<option  value="<?php echo $tag->getId(); ?>"><?php echo $tag->getName(); ?></option>
												<?php
												}
												?>

											</select>
										</div>
										<button class="btn btn-primary" type="submit">Add Tag</button>
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
                                        <th>Tag Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
								$i = 1;
								foreach ($businessTags as $businessTag) 
								{
									$id = $businessTag->getId();
									$businessTagId = $businessTag->getTagId();
									$businessName = $businessTag->getBusiness()->getName();
									$tagName = $businessTag->getTag()->getName();
									
									$deleteTag = "my-tag-delete.php?id=" . $id;

								?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td><?php echo $tagName; ?></td>
										<td>
											<a href="<?php echo $deleteTag; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
										</td>
									</tr>
									<?php
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


		//tag_id
		value = document.getElementById("tag_id");
		if( value.selectedIndex == 0 )	
		{
			alert("Please select tag");
			document.getElementById("tag_id").focus();
			return false;	
		}
		

	   // waitingDialog.show('Please wait. Action in progress..!!');
		// AJAX request
		$.ajax({
			url: "my-tag-insert.php",
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
						alert("Tag added successfully");
					   // waitingDialog.hide();
						window.location = "my-tag.php";
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