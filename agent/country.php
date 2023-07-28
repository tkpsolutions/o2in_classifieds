<?php
include('init.php');

$countryId = 0;
if( isset($_GET['id']) )
{
	$countryId = $_GET['id'];
}
$country = $countryController->getById($countryId);

$name = "";
$status = "";

if( $country != null )
{
	$name = $country->getName();
	$status = $country->getStatus();
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

	<title>Country Management | <?php echo $websiteTitle; ?></title>

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
									<?php
									if($countryId > 0 )
									{
									?>
										Edit country Information
										<a href="country-view.php" class="btn btn-xs btn-danger pull-right"><i class="fas fa-backward fa-fw"></i> Back </a>
									<?php
									}
									else
									{
										?>
										Add country Information
										<a href="country-view.php" class="btn btn-xs btn-danger pull-right"><i class="fas fa-backward fa-fw"></i> Back </a>
										<?php
									}
									?>
								</h3>
							</div>
							<div class="panel-body">
								<form id="form-1">
									<input type="text" id="id" name="id" value="<?php echo $countryId; ?>" class="hidden" readonly />
									<div class="row">
										<div class="col-md-6 col-xs-12">
											<div class="form-group">
												<label> Name </label>
												<input type="text" id="name" name="name"  class="form-control" autocomplete="off" value="<?php echo $name; ?>"/>
											</div>
										</div>
										<?php
										if($countryId > 0 )
										{
										?>
											<div class="col-md-6 col-xs-12">
												<div class="form-group">
													<label> Status </label>
													<select id="status" name="status" class="form-control">
														<?php
														if(strcasecmp($status, "active") == 0)
														{
															?>
																<option value="active" selected> Active </option>
																<option value="deactive"> De-Active </option>
															<?php
														}	
														else
														{
															?>
																<option value="active"> Active </option>
																<option value="deactive" selected> De-Active </option>
															<?php
														}
														?>															
													</select>
												</div>
											</div>	
										<?php
										}
										?>
										<div class="clearfix"></div>
										<div class="col-md-3 col-sm-6 col-xs-12">
											<div class="form-group">
												<?php
												if($countryId > 0 )
												{
													?>
													<button type="submit" class="btn btn-md btn-success">Update</button>
													<?php
												}
												else
												{
													?>
													<button type="submit" class="btn btn-md btn-success">Add</button>
													<?php
												}
												?>
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
		
		//name
		value = document.getElementById("name").value.trim();
		if( value == null || value == "" )	
		{
			showAlert("2", "Please enter name");
			document.getElementById("name").focus();
			return false;
		}
		
		
		waitingDialog.show('Please wait. Action in progress..!!');
		$.ajax
		({
			url: "country-insert.php",
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
						showAlert("1", "Successful update");
						waitingDialog.hide();
						window.location = "country-view.php";
					}
					else
					{
						showAlert("2", "Error: " + data);
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