<?php
include("init.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("head.php"); ?>
	<title>My Profile | O2in | Business Listing and Booking Management</title>	
</head>

<body>

	
	<div class="main-wrapper innerpagebg">
		<?php include("menu.php"); ?>
		
		<!-- Profile Content -->
        <div class="dashboard-content">		
			<div class="container">
				<div class="profile-content">
				     <div class="row dashboard-info">
					    <div class="col-lg-9">
						    <div class="card dash-cards">
								<div class="card-header">
									<h4>Profile Details</h4>																
								</div>
                                <div class="card-body">
									<div class="profile-form">
										<form id="form-1">
										    <div class="form-group">
											    <label class="col-form-label">Your Full Name</label>
										        <div class="pass-group group-img">
													<span class="lock-icon"><i class="feather-user"></i></span>
													<input type="text" class="form-control" value="<?php echo $loggedUser->getName(); ?>" required id="name" name="name">	
												</div>
										    </div> 
											<div class="row">
											     <div class="col-lg-6 col-md-6">
												    <div class="form-group">
														<label class="col-form-label">Phone Number</label>
														<div class="pass-group group-img">
															<span class="lock-icon"><i class="feather-phone-call"></i></span>
															<input type="tel" class="form-control" value="<?php echo $loggedUser->getMobile(); ?>" required id="mobile" name="mobile" />		
														</div>
													</div>
												 </div>
												 <div class="col-lg-6 col-md-6">
												    <div class="form-group">
														<label class="col-form-label">Email Address</label>
														<div class="group-img">
															<i class="feather-mail"></i>
															<input type="text" class="form-control" value="<?php echo $loggedUser->getEmail(); ?>" required id="email" name="email" >
														</div>
													</div>
												 </div>	
												 <div class="col-lg-6 col-md-6">
												    <div class="form-group">
														<label class="col-form-label">Whatsapp Number</label>
														<div class="group-img">
															<i class="feather-mail"></i>
															<input type="text" class="form-control" value="<?php echo $loggedUser->getWhatsappNo(); ?>" required id="whatsappNo" name="whatsappNo" >
														</div>
													</div>
												 </div>											
											</div>										 
											<button class="btn btn-primary" type="submit"> Update Profile</button>
										 </form>
								    </div> 
								</div>								
							</div>	
						</div>
                        <div class="col-lg-3">
						    <div class="profile-sidebar">
							    <div class="card">
								    <div class="card-header">
									    <h4>Change Password</h4>
									</div>	
                                    <div class="card-body">
                                       <form id="form-2">
                                            <div class="form-group">
											    <label class="col-form-label">Current Password</label>
										        <div class="pass-group group-img">
													<span class="lock-icon"><i class="feather-lock"></i></span>
													<input type="password" class="form-control pass-input" placeholder="Password" name="oldPassword" id="oldPassword" required>
												</div>
										    </div>
                                            <div class="form-group">
											    <label class="col-form-label">New Password</label>
										        <div class="pass-group group-img">
													<span class="lock-icon"><i class="feather-lock"></i></span>
													<input type="password" class="form-control pass-input" id="newPassword" name="newPassword" required placeholder="New Password">
													<span class="toggle-password feather-eye-off"></span>
												</div>
										    </div>
                                            <div class="form-group">
											    <label class="col-form-label">Confirm New Password</label>
										        <div class="pass-group group-img">
													<span class="lock-icon"><i class="feather-lock"></i></span>
													<input type="password" class="form-control pass-input" id="retypePassword" name="retypePassword" required placeholder="Re-type New Password">
													<span class="toggle-password feather-eye-off"></span>
												</div>
										    </div>	
                                            <button class="btn btn-primary" type="submit"> Change Password</button>
									   </form>								
									</div>  									
								</div>							
							</div>
						</div>							
					 </div>				
				</div>
			</div>		
		</div>		
		<!-- /Profile Content -->
		
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
		value = document.getElementById("email").value.trim();
		if( value == null || value == "" )	
		{
			alert("Please enter email");
			document.getElementById("email").focus();
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
						alert("Successful Update");
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


$(document).ready(function(e)
{
	//form-content
	$("#form-2").on('submit',(function(e)
	{
		e.preventDefault();
		
		//waitingDialog.show('Please wait. Action in progress..!!');
		$.ajax
		({
			url: "my-password-update.php",
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
						alert("Successful Update");
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