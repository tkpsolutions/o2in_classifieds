<?php
include('init.php');

$userId = 0;
$user = null;
$name = "";
$email = "";
$mobile = "";
$whatsappNo = 0;

$user = $loggedUser;
$userId = $user->getId();
if( $user != null ){
	$name = $user->getName();
	$email = $user->getEmail();
	$mobile = $user->getMobile();
	$whatsappNo = $user->getWhatsappNo();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>My Profile | <?php echo $websiteTitle; ?></title>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

	<?php include('head.php'); ?>

</head>

<body>

	<div id="wrapper">

		<?php include('menu.php'); ?>

		<div id="page-wrapper">

			<div class="admin-panel-content">
				<div class="row">
					<div class="col-xs-12">
						<div class="panel app-panel-1">
							<div class="panel-heading">
								<h3 class="panel-title">
									My Profile
								</h3>
							</div>
							<div class="panel-body">
								<form id="form-1">
									<input type="text" class="hidden" readonly required value="<?php echo $userId; ?>" name="userId" />
									<div class="row">
										<div class="col-md-4 col-sm-6 col-xs-12">
											<div class="form-group">
												<label class="required"> Name </label>
												<input type="text" class="form-control" required value="<?php echo $name; ?>" name="name" />
											</div>
										</div>
										<div class="col-md-4 col-sm-6 col-xs-12">
											<div class="form-group">
												<label class="required"> Email </label>
												<input type="text" class="form-control" required value="<?php echo $email; ?>" name="email" />
											</div>
										</div>
										<div class="col-md-4 col-sm-6 col-xs-12">
											<div class="form-group">
												<label class="required"> Mobile </label>
												<input type="text" class="form-control" required value="<?php echo $mobile; ?>" name="mobile" />
											</div>
										</div>
										<div class="col-md-4 col-sm-6 col-xs-12">
											<div class="form-group">
												<label class="required"> Whatsapp </label>
												<input type="text" class="form-control" required value="<?php echo $whatsappNo; ?>" name="whatsappNo" />
											</div>
										</div>
										<div class="clearfix"></div>
										<div class="col-md-3 col-sm-6 col-xs-12">
											<div class="form-group">
												<button type="submit" class="btn btn-md btn-success">Submit</button>
											</div>
										</div>
									</div>

								</form>
							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- /.admin-panel-content -->

			<?php include('footer.php'); ?>

		</div>
		<!-- /#page-wrapper -->

	</div>
	<!-- /#wrapper -->

</body>

</html>

<script>
	function togglePackDiv(){
		var div = document.getElementById("pack-count-div");
		if( div.classList.contains("hidden") ){
			div.classList.remove("hidden");
		}
		else{
			div.classList.add("hidden");
		}
	}

	$(document).ready(function(e)
	{
		//form-content
		$("#form-1").on('submit',(function(e)
		{
			e.preventDefault();
			
			waitingDialog.show('Please wait. Action in progress..!!');
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
						showAlert("2", "Error : " + data);
						waitingDialog.hide();
					}
					else
					{
						if( data > 0 )
						{
							showAlert("1", "Successful Update");
							waitingDialog.hide();
							window.location = "my-profile.php";
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