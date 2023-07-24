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
										<i class="feather-user"></i>
										<input type="text" class="form-control" placeholder="Full Name" id="name" name="name" required>
									</div>
								</div>
								<div class="form-group group-img">
								    <div class="group-img">
										<i class="feather-mail"></i>
										<input type="email" class="form-control" placeholder="Email Address" name="email" >
									</div>
								</div>
								<div class="form-group group-img">
								    <div class="group-img">
										<i class="feather-phone"></i>
										<input type="number" class="form-control" placeholder="Mobile" maxlength="10" minlength="10" name="mobile" required>
									</div>
								</div>
								<div class="form-group group-img">
								    <div class="group-img">
										<i class="feather-phone"></i>
										<input type="number" class="form-control" placeholder="Whatsapp Number" maxlength="10" minlength="10" name="whatsappNo">
									</div>
								</div>
								<div class="form-group">
									<div class="pass-group group-img">
									    <i class="feather-lock"></i>
										<input type="password" class="form-control pass-input" placeholder="Password" name="password" required>
										<span class="toggle-password feather-eye"></span>
									</div>
								</div>
								<div class="form-group">
									<div class="pass-group group-img">
									    <i class="feather-lock"></i>
										<input type="password" class="form-control pass-input" placeholder="Retype Password" name="retypePassword" required>
										<span class="toggle-password feather-eye" ></span>
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
				data = data.trim();
				console.log(data);
				if( isNaN(data) )
				{
					alert("Error : " + data);
					//waitingDialog.hide();
				}
				else
				{
					if( data > 0 )
					{
						alert("Successful Login");
						//waitingDialog.hide();
						window.location = "index.php";
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