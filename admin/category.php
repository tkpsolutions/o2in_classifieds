<?php
include('init.php');

$categoryId = 0;
if( isset($_GET['id']) )
{
	$categoryId = $_GET['id'];
}
$category = $categoryController->getById($categoryId);

$name = "";
$image = "";
$isBooking = "";
$isGallery = "";
$isProduct = "";
$isRide = "";
$isFeedback = "";
$contactCount = "";
$status = "";


$image = "";
$imageRequired = "required";

if( $category != null )
{
	$name = $category->getName();
	$image = $category->getImage();
	$image = "../images/category/images/" . $category->getId() . "." . $category->getImage();
    if (is_file($image)) {
        $imageRequired = "";
    }
	$isBooking = $category->getIsBooking();
	$isGallery = $category->getIsGallery();
	$isProduct = $category->getIsProduct();
	$isRide = $category->getIsRide();
	$isFeedback = $category->getIsFeedback();
	$contactCount = $category->getContactCount();
	$status = $category->getStatus();
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

	<title>Category Management | <?php echo $websiteTitle; ?></title>

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
									if($categoryId > 0 )
									{
									?>
										Edit Category Information
										<a href="category-view.php" class="btn btn-xs btn-danger pull-right"><i class="fas fa-backward fa-fw"></i> Back </a>
									<?php
									}
									else
									{
										?>
										Add Category Information
										<a href="category-view.php" class="btn btn-xs btn-danger pull-right"><i class="fas fa-backward fa-fw"></i> Back </a>
										<?php
									}
									?>
								</h3>
							</div>
							<div class="panel-body">
								<form id="form-1">
									<input type="text" id="id" name="id" value="<?php echo $categoryId; ?>" class="hidden" readonly />
									<div class="row">
										<div class="col-md-6 col-xs-12">
											<div class="form-group">
												<label>Name</label>
												<input type="text" id="name" name="name" class="form-control" autocomplete="off" value="<?php echo $name; ?>"/>
											</div>
										</div>
										<div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label> Image </label>
                                                <input type="file" <?php echo $imageRequired; ?> id="image" name="image" class="form-control" />
                                                <?php if ( is_file($image)) { ?>
                                                    <div>
                                                        <img src="<?php echo $image; ?>" alt="Category Image" width="100" height="100" />
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
										
										<div class="col-md-6 col-xs-12">
											<div class="form-group">
												<label>Is Booking</label>
												<input type="text" id="isBooking" name="isBooking" class="form-control" autocomplete="off" value="<?php echo $isBooking; ?>"/>
											</div>
										</div>
										<div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label> Is Gallery </label>
                                                <input type="text" id="isGallery" name="isGallery" class="form-control" value="<?php echo $isGallery; ?>" />
                                            </div>
                                        </div>
										
										</div>
										<div class="col-md-6 col-xs-12">
											<div class="form-group">
												<label>Is Product</label>
												<input type="text" id="isProduct" name="isProduct" class="form-control" autocomplete="off" value="<?php echo $isProduct; ?>"/>
											</div>
										</div>
										<div class="col-md-6 col-xs-12">
											<div class="form-group">
												<label>Is Ride</label>
												<input type="text" id="isRide" name="isRide" class="form-control" autocomplete="off" value="<?php echo $isRide; ?>"/>
											</div>
										</div>
										<div class="col-md-6 col-xs-12">
											<div class="form-group">
												<label>Is Feedback</label>
												<input type="text" id="isFeedback" name="isFeedback" class="form-control" autocomplete="off" value="<?php echo $isFeedback; ?>"/>
											</div>
										</div>
										<div class="col-md-6 col-xs-12">
											<div class="form-group">
												<label>Contact Count</label>
												<input type="text" id="contactCount" name="contactCount" class="form-control" autocomplete="off" value="<?php echo $contactCount; ?>"/>
											</div>
										</div>
										<?php if ($categoryId > 0) { ?>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label> Status </label>
                                                    <select id="status" name="status" class="form-control">
                                                        <?php if (strcasecmp($status, "Active") == 0) { ?>
                                                            <option value="Active" selected> Active </option>
                                                            <option value="Deactive"> Deactive </option>
                                                        <?php } else { ?>
                                                            <option value="Active"> Active </option>
                                                            <option value="Deactive" selected> Deactive </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php } ?>
										
										<div class="clearfix"></div>
										<div class="col-md-3 col-sm-6 col-xs-12">
											<div class="form-group">
												<?php
												if($categoryId > 0 )
												{
													?>
													<button type="submit" class="btn btn-md btn-success">Update</button>
													<?php
												}
												else{
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
		
		// isBooking
		value = document.getElementById("isBooking").value.trim();
		if( value == null || value == "" )	
		{
			showAlert("2", "Please enter isBooking");
			document.getElementById("isBooking").focus();
			return false;
		}
		
		// isGallery
		value = document.getElementById("isGallery").value.trim();
		if( value == null || value == "" )	
		{
			showAlert("2", "Please enter isGallery");
			document.getElementById("isGallery").focus();
			return false;
		}
		
		// isProduct
		value = document.getElementById("isProduct").value.trim();
		if( value == null || value == "" )	
		{
			showAlert("2", "Please enter isProduct");
			document.getElementById("isProduct").focus();
			return false;
		}
		
		// isRide
		value = document.getElementById("isRide").value.trim();
		if( value == null || value == "" )	
		{
			showAlert("2", "Please enter isRide");
			document.getElementById("isRide").focus();
			return false;
		}
		
		// isFeedback
		value = document.getElementById("isFeedback").value.trim();
		if( value == null || value == "" )	
		{
			showAlert("2", "Please enter isFeedback");
			document.getElementById("isFeedback").focus();
			return false;
		}
		
		// contactCount
		value = document.getElementById("contactCount").value.trim();
		if( value == null || value == "" )	
		{
			showAlert("2", "Please enter contactCount");
			document.getElementById("contactCount").focus();
			return false;
		}
		
		waitingDialog.show('Please wait. Action in progress..!!');
		$.ajax
		({
			url: "category-insert.php",
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
						window.location = "category.php?id=" + data;
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
