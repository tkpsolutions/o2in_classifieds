<?php
include('init.php');

$userId = 0;
$user = null;
$password = "";

$user = $loggedUser;
$userId = $user->getId();
if( $user != null ){
	$password = $user->getPassword();
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
									My Password Update
								</h3>
							</div>
							<div class="panel-body">
								<form id="form-1">
									<input type="text" class="hidden" readonly required value="<?php echo $userId; ?>" name="userId" />
									<div class="row">
										<div class="col-md-4 col-sm-6 col-xs-12">
											<div class="form-group">
												<label class="required"> Old Password </label>
												<input type="password" class="form-control" required name="password" />
											</div>
										</div>
										<div class="col-md-4 col-sm-6 col-xs-12">
											<div class="form-group">
												<label class="required"> New Password </label>
												<input type="password" class="form-control" required name="password2" />
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

	$(document).ready(function(e)
	{
		//form-content
		$("#form-1").on('submit',(function(e)
		{
			e.preventDefault();
			
			waitingDialog.show('Please wait. Action in progress..!!');
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
							window.location = "my-password.php";
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