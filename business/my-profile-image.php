<?php 
include("init.php");

$business = $businessController->getById($loggedBusiness->getId());
$businessDetail = $businessDetailController->getByBusinessId($loggedBusiness->getId());


$logoUrl="../images/businesslogo/". $businessDetail->getId() . "." . $businessDetail->getLogo();
$bannerUrl="../images/businessbanner/". $businessDetail->getId() . "." . $businessDetail->getBanner();
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
					<div class="col-md-6 col-sm-6 col-12">
						<div class="profile-sidebar">
							<div class="card">
								<div class="card-header">
									<h4>Edit Logo Image</h4>
								</div>
								<div class="card-body">
									<form id="form-1">
										<input type="text" class="form-control pass-input d-none" value="<?php echo $business->getId(); ?>" id="business_id" name="business_id">
										<input type="text" class="form-control pass-input d-none" value="<?php echo $businessDetail->getId(); ?>" id="business_detail_id" name="business_detail_id">
										<div class="row">
											<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
												<div class="form-group">
													<label class="col-form-label">Existing Image</label>
													<div class="pass-group group-img">
														<img src="<?php echo $logoUrl; ?>" style="width:100px;height:100px"/>
													</div>
												</div>
											</div>
											<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
												<div class="form-group">
													<label class="col-form-label">Logo</label>
													<div class="pass-group group-img">
														<input type="file" class="form-control pass-input" id="logo_image" name="logo_image">
													</div>
												</div>
											</div>
											
											<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
												<button class="btn btn-primary" type="submit"> Update Image </button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-sm-6 col-12">
						<div class="profile-sidebar">
							<div class="card">
								<div class="card-header">
									<h4>Edit Banner Image</h4>
								</div>
								<div class="card-body">
									<form id="form-2">
										<input type="text" class="form-control pass-input d-none" value="<?php echo $business->getId(); ?>" id="business_id" name="business_id">
										<input type="text" class="form-control pass-input d-none" value="<?php echo $businessDetail->getId(); ?>" id="business_detail_id" name="business_detail_id">
										<div class="row">
											<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
												<div class="form-group">
													<label class="col-form-label">Existing Image</label>
													<div class="pass-group group-img">
														<img src="<?php echo $bannerUrl; ?>" style="width:100%;height:100px"/>
													</div>
												</div>
											</div>
											<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
												<div class="form-group">
													<label class="col-form-label">Banner</label>
													<div class="pass-group group-img">
														<input type="file" class="form-control pass-input" id="banner_image" name="banner_image">
													</div>
												</div>
											</div>
											
											<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
												<button class="btn btn-primary" type="submit"> Update Image </button>
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

<script>

$(document).ready(function(e)
{
	//form-content
	$("#form-1").on('submit',(function(e)
	{
		e.preventDefault();
		
		//reading logo_image
		value = document.getElementById("logo_image").value.trim();		
		var allowedFiles = [".png", ".jpg", ".jpeg", ".gif", ".bmp", ".PNG", ".JPG", ".JPEG", ".GIF", ".BMP"];
		var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
		if( value == null || value == "" )	
		{
			alert("Please select logo image");
			document.getElementById("logo_image").focus();
			return false;
		}
		else if(!regex.test(value))
		{
			alert("Allowed Only  .jpg, .JPG, .jpeg, .JPEG, .png, .PNG, .bmp, .BMP, .gif, .GIF Files.");
			document.getElementById("logo_image").focus();
			return false;
		}
			
		//waitingDialog.show('Please wait. Action in progress..!!');
		$.ajax
		({
			url: "my-profile-logo-update.php",
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
						alert("Logo image updated Successfully");
						//waitingDialog.hide();
						window.location = "my-profile-image.php";
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


$(document).ready(function(e)
{
	//form-content
	$("#form-2").on('submit',(function(e)
	{
		e.preventDefault();
		
		//reading banner_image
		value = document.getElementById("banner_image").value.trim();		
		var allowedFiles = [".png", ".jpg", ".jpeg", ".gif", ".bmp", ".PNG", ".JPG", ".JPEG", ".GIF", ".BMP"];
		var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
		if( value == null || value == "" )	
		{
			alert("Please select banner image");
			document.getElementById("banner_image").focus();
			return false;
		}
		else if(!regex.test(value))
		{
			alert("Allowed Only  .jpg, .JPG, .jpeg, .JPEG, .png, .PNG, .bmp, .BMP, .gif, .GIF Files.");
			document.getElementById("banner_image").focus();
			return false;
		}
		
		
		//waitingDialog.show('Please wait. Action in progress..!!');
		$.ajax
		({
			url: "my-profile-banner-update.php",
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
						alert("Banner image updated Successfully");
						//waitingDialog.hide();
						window.location = "my-profile-image.php";
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