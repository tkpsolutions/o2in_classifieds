<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("head.php"); ?>
	<title>Login | O2in | Business Listing and Booking Management</title>
</head>

<body>

	
	<div class="main-wrapper innerpagebg">
	
		<?php include("menu.php"); ?>
		
		<!-- Login Section -->		
		<div class="login-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-5 mx-auto">
						<div class="login-wrap">
							
							<div class="login-header">
								<h3>Welcome Back</h3>
								<p>Please Enter your Details</p>								
							</div>
							
							<!-- Login Form -->
							<form id="form-1">
								<div class="form-group group-img">
								    <div class="group-img">
										<i class="feather-mail"></i>
										<input type="text" class="form-control" placeholder="10 digit mobile number" name="mobile" id="mobile" required>
									</div>
								</div>
								<div class="form-group">
									<div class="pass-group group-img">
									    <i class="feather-lock"></i>
										<input type="password" class="form-control pass-input" placeholder="Password" name="password" id="password" required>
										<span class="toggle-password feather-eye"></span>
									</div>
								</div>
								<div class="row">								
									<div class="col-md-6 col-sm-6">
										<div class="text-md-end">
											<a class="forgot-link" href="#">Forgot password?</a>
										</div>
									</div>									
								</div>
								<button class="btn btn-primary w-100 login-btn" type="submit">Sign in</button>
								<div class="register-link text-center">
									<p>No account yet? <a class="forgot-link" href="register.php">Signup</a></p>
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
		
		//mobile
		value = document.getElementById("mobile").value.trim();
		if( value == null || value == "" )	
		{
			alert("Please enter mobile");
			document.getElementById("mobile").focus();
			return false;
		}
		
		
		//password
		value = document.getElementById("password").value.trim();
		if( value == null || value == "" )	
		{
			alert("Please enter password");
			document.getElementById("password").focus();
			return false;
		}
		
		//waitingDialog.show('Please wait. Action in progress..!!');
		$.ajax
		({
			url: "login-validate.php",
			type: "POST",
			contentType: false,
			cache: false,
			processData:false,
			data: new FormData(this),
			success: function(data)
			{
				data = data.trim();
				if( isNaN(data) )
				{
					alert("Error : " + data);
					//waitingDialog.hide();
				}
				else
				{
					if( data == 0 )
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