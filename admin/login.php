<?php
$noLogin = 1;
include('init.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Page | <?php echo $websiteTitle; ?></title>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->


		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style1.css">



	<?php include('head.php'); ?>
		
    </head>

    <body>
		
		<div class="login-panel">
			<div class="row">
				<div class="col-md-4 col-md-push-4 col-def">
					<div class="design-section" style="height: auto">
						<form id="form-1">
							<center>
								<img src="<?php echo $websiteLogo; ?>" style="width: 50%; margin-bottom: 20px; padding-bottom: 25px; border-bottom: double lightblue 5px;height:100px;background:#fff" />
							</center>
							<div class="form-group">
								<label> Email Address </label>
								<input type="email" id="email" name="email" required class="form-control" />
							</div>
							<div class="form-group">
								<label> Password </label>
								<input type="password" id="password" name="password" required class="form-control" autocomplete="off"/>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-lg btn-info"> Login Now </button>
							</div>
							<div class="form-group">
								<a href="#" class="btn btn-xs btn-dark"> <i class="fas fa-question-circle"></i> Forgot my password
								</a>
							</div>	
						</form>
					</div>
				</div>
			</div>
		</div>
		
    </body>

</html>

<style>
body
{
	margin-top: 0px;
	background-image: url('../images/login-bg.jpg');
	background-size: 100% 100%;
}

@media only screen and (max-width: 600px) {
	body
	{
		margin-top: 0px !important;
	}
}
</style>

<script>

$(document).ready(function(e)
{
	//form-content
	$("#form-1").on('submit',(function(e)
	{
		e.preventDefault();
		
		//email
		value = document.getElementById("email").value.trim();
		if( value == null || value == "" )	
		{
			showAlert("2", "Please enter email");
			document.getElementById("email").focus();
			return false;
		}
		
		//password
		value = document.getElementById("password").value.trim();
		if( value == null || value == "" )	
		{
			showAlert("2", "Please enter password");
			document.getElementById("password").focus();
			return false;
		}
		
		waitingDialog.show('Please wait. Action in progress..!!');
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
				if( isNaN(data) )
				{
					showAlert("2", "Error : " + data);
					waitingDialog.hide();
				}
				else
				{
					if( data == 0 )
					{
						showAlert("1", "Successful Login");
						waitingDialog.hide();
						window.location = "index.php";
					}
					else
					{
						showAlert("2", "Error : " + data);
						waitingDialog.hide();
					}
				}
			},
			error: function()
			{
				showAlert("2", "Oops something went wrong. Please try later.");
				waitingDialog.hide();
			}
		});
		
	}));
	
});

</script>