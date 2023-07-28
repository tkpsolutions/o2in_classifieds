﻿<?php 
include("init.php");

$citys = $cityController->getByStatus("active");
$categorys = $categoryController->getByStatus("active");

$business = $businessController->getById($loggedBusiness->getId());
$businessDetail = $businessDetailController->getByBusinessId($loggedBusiness->getId());

$businessDetailId = 0;
$businessDetailAddressLine1 = "";
$businessDetailAddressLine2 = "";
$businessDetailPincode = "";
$businessDetailDescriptionLong = "";
$lat = $business->getCity()->getLng();
$lng = $business->getCity()->getLat();

if( $businessDetail != null ){
	$businessDetailId = $businessDetail->getId();
	$businessDetailAddressLine1 = $businessDetail->getAddressLine1();
	$businessDetailAddressLine2 = $businessDetail->getAddressLine2();
	$businessDetailPincode = $businessDetail->getPincode();
	$businessDetailDescriptionLong = $businessDetail->getDescriptionLong();
	$lat = $businessDetail->getLat();
    $lng = $businessDetail->getLng();
    if( strlen( trim($lat) ) <= 2 ){
        $lat = $business->getCity()->getLng();
        $lng = $business->getCity()->getLat();
    }
}

$businessCategoryId = 0;
if( $business->getCategory() != null ){
	$businessCategoryId = $business->getCategoryId();
}
echo $lat . " --- " . $lng;
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
					<div class="col-md-12 col-sm-12 col-12">
						<div class="profile-sidebar">
							<div class="card">
								<div class="card-header">
									<h4>Edit Business Profile</h4>
								</div>
								<div class="card-body">
									<form id="form-1">
										<input type="text" class="form-control pass-input d-none" value="<?php echo $business->getId(); ?>" id="business_id" name="business_id">
										<input type="text" class="form-control pass-input d-none" value="<?php echo $businessDetailId; ?>" id="business_detail_id" name="business_detail_id">
										
										<input type="text" class="form-control pass-input d-none" value="<?php echo $businessCategoryId; ?>" id="category_id" name="category_id">

										<div class="row">
											<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
												<div class="form-group">
													<label class="col-form-label">Business Name</label>
													<div class="pass-group group-img">
														<span class="lock-icon"><i class="feather-lock"></i></span>
														<input type="text" class="form-control pass-input" value="<?php echo $business->getName(); ?>" id="name" name="name">
													</div>
												</div>
											</div>
											<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
												<div class="form-group">
													<label class="col-form-label">Mobile</label>
													<div class="pass-group group-img">
														<span class="lock-icon"><i class="feather-lock"></i></span>
														<input type="text" class="form-control pass-input" value="<?php echo $business->getMobile(); ?>" id="mobile" name="mobile">
													</div>
												</div>
											</div>
											<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
												<div class="form-group">
													<label class="col-form-label">Category</label>
													<div class="pass-group group-img">
														<span class="lock-icon"><i class="feather-lock"></i></span>
														<input type="text" class="form-control pass-input" value="<?php echo $business->getCategory()->getName(); ?>" id="category_name" name="category_name" readonly>
													</div>
												</div>
											</div>
											<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
												<div class="form-group">
													<label class="col-form-label">City</label>
													<div class="pass-group group-img">
														<select class="form-control" id="city_id" name="city_id">
															<option value="0">Select city</option>											
															<?php											
															foreach($citys as $city)
															{
																$selected="";
																if($city->getId() == $loggedBusiness->getCityId())
																{
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
											</div>
											<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
												<div class="form-group">
													<label class="col-form-label">Address Line1</label>
													<div class="pass-group group-img">
														<span class="lock-icon"><i class="feather-lock"></i></span>
														<input type="text" class="form-control pass-input" value="<?php echo $businessDetailAddressLine1; ?>" id="address1" name="address1">
													</div>
												</div>
											</div>
											<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
												<div class="form-group">
													<label class="col-form-label">Address Line2</label>
													<div class="pass-group group-img">
														<span class="lock-icon"><i class="feather-lock"></i></span>
														<input type="text" class="form-control pass-input" value="<?php echo $businessDetailAddressLine2; ?>" id="address2" name="address2">
													</div>
												</div>
											</div>
											<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
												<div class="form-group">
													<label class="col-form-label">Pincode</label>
													<div class="pass-group group-img">
														<span class="lock-icon"><i class="feather-lock"></i></span>
														<input type="text" class="form-control pass-input" value="<?php echo $businessDetailPincode; ?>" id="pincode" name="pincode">
													</div>
												</div>
											</div>
											<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
												<div class="form-group">
													<label class="col-form-label">Short Description</label>
													<div class="pass-group group-img">
														<textarea rows="3" cols="3" class="form-control pass-input" id="short_desc" name="short_desc"><?php echo $business->getDescriptionShort(); ?></textarea>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
												<div class="form-group">
													<label class="col-form-label">Description</label>
													<div class="pass-group group-img">
														<textarea rows="3" cols="3" class="form-control pass-input" id="description" name="description"><?php echo $businessDetailDescriptionLong; ?></textarea>
													</div>
												</div>
											</div>
											<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
												<div class="form-group">
													<label class="col-form-label">Latitude</label>
													<div class="pass-group group-img">
														<span class="lock-icon"><i class="feather-lock"></i></span>
														<input type="text" readonly class="form-control pass-input" value="<?php echo $lat; ?>" id="lat" name="lat">
													</div>
												</div>
											</div>
											<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
												<div class="form-group">
													<label class="col-form-label">Longitude</label>
													<div class="pass-group group-img">
														<span class="lock-icon"><i class="feather-lock"></i></span>
														<input type="text" readonly class="form-control pass-input" value="<?php echo $lng; ?>" id="lng" name="lng">
													</div>
												</div>
											</div>
											<div class="clearfix"></div>
											<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
												<div id="us2" style="width: 100%; height: 400px; border: #000 2px solid"></div>
												<br>
											</div>
											<div class="clearfix"></div>
											<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
												<button class="btn btn-primary" type="submit"> Update Profile </button>
											</div>
										</div>
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

</body>

</html>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/location-picker@1.1.1/dist/location-picker.min.js"></script>
<script src="../theme/js/gmap.js"></script>

<script>
function loadMap()
{
	//googleMapPicker(45.5017, -73.5673);
	googleMapPicker(<?php echo $lat; ?>, <?php echo $lng; ?>);
}

$(document).ready(function(e)
{

	//form-content
	$("#form-1").on('submit',(function(e)
	{
		e.preventDefault();
		
		//name
		value = document.getElementById("name").value.trim();
		if( value == null || value == "" )	
		{
			alert("Please enter name");
			document.getElementById("name").focus();
			return false;
		}
				
		//mobile
		value = document.getElementById("mobile").value.trim();
		if( value == null || value == "" )	
		{
			alert("Please enter mobile");
			document.getElementById("mobile").focus();
			return false;
		}
			
		/**
		//category_id
		value = document.getElementById("category_id");
		if( value.selectedIndex == 0 )	
		{
			alert("Please select category");
			document.getElementById("category_id").focus();
			return false;	
		}
		**/
		
		//city_id
		value = document.getElementById("city_id");
		if( value.selectedIndex == 0 )	
		{
			alert("Please select city");
			document.getElementById("city_id").focus();
			return false;	
		}
		
		//address1
		value = document.getElementById("address1").value.trim();
		if( value == null || value == "" )	
		{
			alert("Please enter address line1");
			document.getElementById("address1").focus();
			return false;
		}
		
		//address2
		value = document.getElementById("address2").value.trim();
		if( value == null || value == "" )	
		{
			alert("Please enter address line2");
			document.getElementById("address2").focus();
			return false;
		}
		
		//pincode
		value = document.getElementById("pincode").value.trim();
		if( value == null || value == "" )	
		{
			alert("Please enter pincode");
			document.getElementById("pincode").focus();
			return false;
		}
		
		//short_desc
		value = document.getElementById("short_desc").value.trim();
		if( value == null || value == "" )	
		{
			alert("Please enter short description");
			document.getElementById("short_desc").focus();
			return false;
		}
		
		//description
		value = document.getElementById("description").value.trim();
		if( value == null || value == "" )	
		{
			alert("Please enter description");
			document.getElementById("description").focus();
			return false;
		}
		
		
		//waitingDialog.show('Please wait. Action in progress..!!');
		$.ajax
		({
			url: "my-profile-update.php",
			type: "POST",
			contentType: false,
			cache: false,
			processData:false,
			data: new FormData(this),
			success: function(data)
			{
				if( isNaN(data) )
				{
					alert("Error : " + data);
					//waitingDialog.hide();
				}
				else
				{
					if( data == 0 )
					{
						alert("Profile Updated Successfully");
						//waitingDialog.hide();
						window.location = "my-profile.php";
					}
					else
					{
						alert("Error : " + data);
						//waitingDialog.hide();
					}
				}
			},
			error: function()
			{
				alert("Oops something went wrong. Please try later.");
				//waitingDialog.hide();
			}
		});
		
	}));
	
});

</script>

<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyBpJ-1-6A67HL_x2UzmsBB4NrT8pd-3oLs&callback=loadMap"></script>