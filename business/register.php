<?php 
$noLogin = 1;
include("init.php");
$categorys = $categoryController->getByStatus("active");
$citys = $cityController->getByStatus("active");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("head.php"); ?>
	<title>Register | O2in | Business Listing and Booking Management</title>
</head>

<body>

	
	<div class="main-wrapper innerpagebg">
	
		<?php include("menu.php"); ?>
		
		<!-- Login Section -->		
		<div class="login-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-5 mx-auto">
						<div class="login-wrap register-form">
							
							<div class="login-header">
								<h3>Create an Account</h3>
								<p>Lets start with <span>O2In Business Listing</span></p>								
							</div>
							
							<!-- Login Form -->
							<form id="form-1">
								<div class="form-group group-img">
								    <div class="group-img">
										<label>Select Category </label>
										<select class="form-control" name="category_id">
											<?php
											foreach($categorys as $category){
											?>
												<option value="<?php echo $category->getId(); ?>">
													<?php echo $category->getName(); ?>
												</option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
								<div class="form-group group-img">
								    <div class="group-img">
										<label>Select Location </label>
										<select class="form-control" name="city_id">
											<?php
											foreach($citys as $city){
											?>
												<option value="<?php echo $city->getId(); ?>">
													<?php echo $city->getName(); ?>
												</option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
							    <div class="form-group group-img">
								    <div class="group-img">
										<i class="feather-user"></i>
										<input required type="text" name="name" class="form-control" placeholder="Full Name">
									</div>
								</div>
								<div class="form-group group-img">
								    <div class="group-img">
										<i class="feather-mail"></i>
										<input type="email" name="email" class="form-control" placeholder="Email Address">
									</div>
								</div>
								<div class="form-group group-img">
								    <div class="group-img">
										<i class="feather-phone"></i>
										<input type="text" required name="mobile" class="form-control" placeholder="Mobile">
									</div>
								</div>
								<div class="form-group">
									<div class="pass-group group-img">
									    <i class="feather-lock"></i>
										<input type="password" required name="password" class="form-control pass-input" placeholder="Password">
										<span class="toggle-password feather-eye"></span>
									</div>
								</div>
								<div class="form-group d-none">
									<div class="pass-group group-img">
									    <i class="feather-lock"></i>
										<input type="password" class="form-control pass-input" placeholder="Retype Password">
										<span class="toggle-password feather-eye"></span>
									</div>
								</div>
								<button class="btn btn-primary w-100 login-btn" type="submit">Create Account</button>
								<div class="register-link text-center">
									<p>Already have an account? <a class="forgot-link" href="login.php">Sign In</a></p>
								</div>
							</form>
							<!-- /Login Form -->
											
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<!-- /Login Section -->
					
		<?php include("footer.php"); ?>
	
</body>
</html>
							

<script>

$(document).ready(function(e)
{
	//form-content
	$("#form-1").on('submit',(function(e)
	{
		e.preventDefault();
		
		//waitingDialog.show('Please wait. Action in progress..!!');
		$.ajax
		({
			url: "register-insert.php",
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
					if( data > 0 )
					{
						alert("Profile Created Successfully");
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