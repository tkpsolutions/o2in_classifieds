<?php 
include("init.php");
$businesProducts = $businessProductController->getByBusinessId($loggedBusiness->getId());

$businessFeedbackSummary = $businessFeedbackController->getSummaryByBussinessId($loggedBusiness->getId());
$businessFeedbackValue = 0;
if ($businessFeedbackSummary != null) {
	$businessFeedbackValue = $businessFeedbackSummary->getStarCount() / $businessFeedbackSummary->getId();
}

$businessTokensToday = $businessTokenController->search1($loggedBusiness->getId(), date("Y-m-d"), date("Y-m-d"), 0, 0, "booked");

$businessTokensOverall = $businessTokenController->search1($loggedBusiness->getId(), null, null, 0, 0, "booked");

$businessImages = $businessImageController->getByBusinessId($loggedBusiness->getId());
$businessTags = $businessTagController->getByBusinessId($loggedBusiness->getId());
$businessContactTypes = $businessContactTypeController->getByBusinessId($loggedBusiness->getId());

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
				<div class="dashboard-details">
				    <div class="row">
					    <div class="col-lg-3 col-md-3">
						    <div class="card dash-cards">
							     <div class="card-body">
									<div class="dash-top-content">
										<div class="dashcard-img">
											<img src="../assets/img/icons/verified.svg" class="img-fluid" alt="">
										</div>
									</div>
									<div class="dash-widget-info">
										<h6>Catalog Listing</h6>
										<h3 class="counter"><?php echo sizeof($businesProducts); ?></h3>
									</div>
								</div>									
							</div>
						</div>
						 <div class="col-lg-3 col-md-3">
						    <div class="card dash-cards">
							     <div class="card-body">
									<div class="dash-top-content">
										<div class="dashcard-img">
											<img src="../assets/img/icons/rating.svg" class="img-fluid" alt="">
										</div>
									</div>
									<div class="dash-widget-info">
										<h6>Review Ratings</h6>
										<h3><?php echo $businessFeedbackValue; ?></h3>
									</div>
								</div>									
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
						    <div class="card dash-cards">
							     <div class="card-body">
									<div class="dash-top-content">
										<div class="dashcard-img">
											<img src="../assets/img/icons/bookmark.svg" class="img-fluid" alt="">
										</div>
									</div>
									<div class="dash-widget-info">
										<h6>Today Bookings</h6>
										<h3><?php echo sizeof($businessTokensToday); ?></h3>
									</div>
								</div>									
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
						    <div class="card dash-cards">
							     <div class="card-body">
									<div class="dash-top-content">
										<div class="dashcard-img">
											<img src="https://cdn-icons-png.flaticon.com/512/1375/1375106.png" class="img-fluid" alt="">
										</div>
									</div>
									<div class="dash-widget-info">
										<h6>Images</h6>
										<h3><?php echo sizeof($businessImages); ?></h3>
									</div>
								</div>									
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
						    <div class="card dash-cards">
							     <div class="card-body">
									<div class="dash-top-content">
										<div class="dashcard-img">
											<img src="../assets/img/icons/tags.png" class="img-fluid" alt="">
										</div>
									</div>
									<div class="dash-widget-info">
										<h6>Tags</h6>
										<h3><?php echo sizeof($businessTags); ?></h3>
									</div>
								</div>									
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
						    <div class="card dash-cards">
							     <div class="card-body">
									<div class="dash-top-content">
										<div class="dashcard-img">
											<img src="../assets/img/icons/phone-book.png" class="img-fluid" alt="">
										</div>
									</div>
									<div class="dash-widget-info">
										<h6>Contacts</h6>
										<h3><?php echo sizeof($businessContactTypes); ?></h3>
									</div>
								</div>									
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
						    <div class="card dash-cards">
							     <div class="card-body">
									<div class="dash-top-content">
										<div class="dashcard-img">
											<img src="../assets/img/icons/tokens.png" class="img-fluid" alt="">
										</div>
									</div>
									<div class="dash-widget-info">
										<h6>Overall Booked Tokens</h6>
										<h3><?php echo sizeof($businessTokensOverall); ?></h3>
									</div>
								</div>									
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