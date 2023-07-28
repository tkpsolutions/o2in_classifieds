<?php 
$noLogin = 1;
include("init.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("head.php"); ?>
	<title>Forgot Password | O2in | Business Listing and Booking Management</title>
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
								<h3>Recover Password</h3>
								<p>Please Enter your Mobile Number</p>								
							</div>
							
							<!-- Login Form -->
							<form action="forgot-password-send.php" id="form-2" method="post">
								<div class="form-group group-img">
								    <div class="group-img">
										<i class="feather-mail"></i>
										<input type="text" class="form-control" placeholder="Mobile Number" id="mobile" name="mobile">
									</div>
								</div>
								<div class="row">								
									<div class="col-md-12 col-sm-12">
										<div class="text-md-end">
											<a class="forgot-link" href="login.php">Already have account? Login Here</a>
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
		
		
		//waitingDialog.show('Please wait. Action in progress..!!');
		$.ajax
		({
			url: "forgot-password-send.php",
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
						alert("Password sent in sms");
						//waitingDialog.hide();
						window.location = "login.php";
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
							