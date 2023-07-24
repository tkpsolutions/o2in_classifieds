<?php 
include("init.php");
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
					<div class="col-md-6 col-lg-5 mx-auto">
						<div class="profile-sidebar">
							<div class="card">
								<div class="card-header">
									<h4>Change Password</h4>
								</div>
								<div class="card-body">
									<form id="form-1">
										<div class="form-group">
											<label class="col-form-label">Old Password</label>
											<div class="pass-group group-img">
												<span class="lock-icon"><i class="feather-lock"></i></span>
												<input type="password" class="form-control pass-input" placeholder="Old password" id="old_password" name="old_password">
											</div>
										</div>
										<div class="form-group">
											<label class="col-form-label">New Password</label>
											<div class="pass-group group-img">
												<span class="lock-icon"><i class="feather-lock"></i></span>
												<input type="password" class="form-control pass-input" placeholder="New password" id="new_password" name="new_password">
											</div>
										</div>
										<button class="btn btn-primary" type="submit"> Update Password</button>
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
		
	//reading old_password
		value = document.getElementById("old_password").value.trim();
		//validate old_password
		if( value == null || value == "" )	
		{
			alert("Please enter old password");
			value = document.getElementById("old_password").focus();
			return false;
		}
			
		
		//reading new_password
		value = document.getElementById("new_password").value.trim();
		//validate new_password
		if( value == null || value == "" )	
		{
			alert("Please enter new password");
			value = document.getElementById("new_password").focus();
			return false;
		}
		
	
		//waitingDialog.show('Please wait. Action in progress..!!');
		$.ajax
		({
			url: "change-password-update.php",
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
						alert("Password changed successfully");
						location.reload();
						//waitingDialog.hide();
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