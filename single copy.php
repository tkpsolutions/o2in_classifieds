<?php
$noLogin = 1;
include("init.php");
if( !isset($_GET['id']) ){
	header("location: index.php");
	exit();
}
$businessId = $_GET['id'];
$business = $businessController->getById($businessId);
if( $business == null ){
	header("location: index.php");
	exit();
}
$businessDetail = $businessDetailController->getByBusinessId($businessId);
$businessLogo = $systemImage404;
$descriptionLong = "";
if( $businessDetail != null ){
	$businessLogo = "images/businesslogo/" . $businessDetail->getId() . "." . $businessDetail->getLogo();
	$descriptionLong = $businessDetail->getDescriptionLong();
}
$businessImages = $businessImageController->getByBusinessId($businessId);
$businessFeedbackSummary = $businessFeedbackController->getSummaryByBussinessId($businessId);

$businessFeedbackValue = 0;
if( $businessFeedbackSummary != null ){
	$businessFeedbackValue = $businessFeedbackSummary->getStarCount() / $businessFeedbackSummary->getId
	();
}

$businessContacts = $businessContactTypeController->getByBusinessId($businessId);
$businessTags = $businessTagController->getByBusinessId($businessId);
$businessProducts = $businessProductController->getByBusinessId($businessId);
$businessTimings = $businessTimingController->getByBusinessId($businessId);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("head.php"); ?>
	<title><?php echo $business->getName(); ?> | O2in | Business Listing and Booking Management</title>
</head>

<body>


	<div class="main-wrapper innerpagebg">

		<?php include("menu.php"); ?>
		<br><br><br>
		<!--Details Description  Section-->
		<section class="details-description">
			<div class="container">
				<div class="about-details">
					<div class="about-headings">
						<div class="author-img">
							<img src="<?php echo $businessLogo; ?>" alt="authorimg" />
						</div>
						<div class="authordetails">
							<h5><?php echo $business->getName(); ?></h5>
							<p><?php echo $business->getDescriptionShort(); ?></p>
							<p><?php echo "@ " . $business->getCity()->getName(); ?></p>
							<div class="rating">
								<?php
								for($i = 1; $i <= 5; $i++){
									$ratingColor = "fas fa-star filled";
									if( round($businessFeedbackValue) < $i ){
										$ratingColor = "fa-regular fa-star rating-color";
									}
								?>
									<i class="<?php echo $ratingColor; ?>"></i>
								<?php
								}
								?>
								
								<?php
								if( $businessFeedbackSummary != null ){
								?>
									<span class="d-inline-block average-rating"> <?php echo $businessFeedbackValue; ?> </span>
								<?php
								}
								else{
								?>
									<span class="d-inline-block average-rating"> No Reviews </span>
								<?php
								}
								?>
							</div>
							<div class="tags">
								<?php
								foreach($businessTags as $businessTag){
								?>
									<span><?php echo $businessTag->getTag()->getName(); ?></span>
								<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>
				<div class="descriptionlinks">
					<div class="row">
						<div class="col-lg-9">
							<ul>
								<!-- 10.829958274206613, 78.62500954447049 -->
								<li><a href="https://www.google.com/maps/place/@10.8061274,78.6923149&mapclient=embed"><i class="feather-map"></i> Get Directions</a></li>
								
								<li><a href="whatsapp://send?text=Start using O2In for finding the best services in your city"><i class="feather-share-2"></i> share</a></li>
								<li><a href="javascript:void(0);"><i class="feather-heart"></i> Save To Bookmark</a></li>
							</ul>
						</div>
						<div class="col-lg-3">
							<div class="callnow">
								<a href="tel: +91<?php echo $business->getMobile(); ?>"> <i class="feather-phone-call"></i> Call Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/Details Description  Section-->

		<!--Details Main  Section-->
		<div class="details-main-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-9 col-sm-8 col-12">
						<div class="card">
							<div class="card-header d-none">
								<span class="bar-icon">
									<span></span>
									<span></span>
									<span></span>
								</span>
								<h4>Appointment</h4>
							</div>
							<div class="card-body d-none">
								<form>
									<div class="form-group">
										<label>Select Doctor</label>
										<select class="form-control">
											<option>Doctor 1</option>
										</select>
									</div>
									<div class="form-group">
										<label>Select Date</label>
										<select class="form-control">
											<option>June 23, 2023</option>
											<option>June 24, 2023</option>
											<option>June 25, 2023</option>
										</select>
									</div>
									<div class="form-group">
										<label>Select Token</label>
										<p class="blog-category">
									   		<a href="javascript:void(0)" class="bg-danger" style="color: #fff"><span>10:30 AM</span></a>
											<a href="javascript:void(0)" ><span>11:00 AM</span></a>
											<a href="javascript:void(0)"><span>12:00 PM</span></a>
											<a href="javascript:void(0)" class="bg-success" style="color: #fff"><span>12:30 PM</span></a>
											<a href="javascript:void(0)"><span>13:00 PM</span></a>
										</p>
									</div>
									<div class="form-group">
										<br>
										<button type="button" class="btn btn-success"> Confirm My Booking </button>
									</	>
								</form>
							</div>
						</div>

						<?php
						if( sizeof($businessProducts) > 0 ){
						?>
							<div class="card ">
								<div class="card-header">
									<span class="bar-icon">
										<span></span>
										<span></span>
										<span></span>
									</span>
									<h4>Our Products / Services</h4>
								</div>
								<div class="card-body">
									<div style="overflow: auto;">
										<table class="table table-bordered">
											<thead>
												<tr>
													<th>Name</th>
													<th>Price</th>
													<th>Discount</th>
													<th>Special Price</th>
													<th>+ GST</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach($businessProducts as $businessProduct){
													$price = $businessProduct->getPrice();
													$discountPercentage = $businessProduct->getDiscountPercentage();
													$discountAmount = $price * ($discountPercentage / 100);
													$specialPrice = $price - $discountAmount;
												?>
													<tr>
														<td><?php echo $businessProduct->getName(); ?></td>
														<td><?php echo "Rs. " . $price; ?></td>
														<td><?php echo $discountPercentage . " %"; ?></td>
														<td><?php echo "Rs. " . $specialPrice; ?></td>
														<td><?php echo $businessProduct->getTaxPercentage() , " %"; ?></td>
													</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						<?php
						}
						?>

						<?php
						if( strlen($descriptionLong) > 0 ){
						?>
							<div class="card ">
								<div class="card-header">
									<span class="bar-icon">
										<span></span>
										<span></span>
										<span></span>
									</span>
									<h4>About Us</h4>
								</div>
								<div class="card-body">
									<p><?php echo $descriptionLong; ?></p>
								</div>
							</div>
						<?php
						}
						?>
						
						<?php
						if( sizeof($businessImages) > 0 ){
						?>
							<!--Gallery Section-->
							<div class="card gallery-section ">
								<div class="card-header ">
									<img src="assets/img/galleryicon.svg" alt="gallery">
									<h4>Gallery</h4>
								</div>
								<div class="card-body">
									<div class="gallery-content">
										<div class="row">
											<?php
											foreach($businessImages as $businessImage){
												$businessImageLink = "images/businessimage/" . $businessImage->getId() . "." . $businessImage->getImage();
											?>
												<div class="col-lg-3 col-md-3 col-sm-3">
													<div class="gallery-widget">
														<a href="#" data-fancybox="gallery1">
															<img class="img-fluid" alt="Image" src="<?php echo $businessImageLink; ?>">
														</a>
													</div>
												</div>
											<?php
											}
											?>
										</div>
									</div>
								</div>
							</div>
							<!--/Gallery Section-->
						<?php
						}
						?>

						<?php
						if( sizeof($businessTimings) > 0 ){
						?>
							<div class="card ">
								<div class="card-header">
									<span class="bar-icon">
										<span></span>
										<span></span>
										<span></span>
									</span>
									<h4>Our Timings</h4>
								</div>
								<div class="card-body">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>Day</th>
												<th>From</th>
												<th>To</th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach($businessTimings as $businessTiming){
											?>
												<tr>
													<td><?php echo PF_ConvertNumberToDay($businessTiming->getDayNumber()); ?></td>

													<?php
													if( $businessTiming->getIsFullDay() == 1 ){
													?>
														<td colspan="2" class="bg-success"> 24 x 7 Available </td>
													<?php
													}
													else if( $businessTiming->getIsFullDay() == 1 ){
													?>
														<td colspan="2" class="bg-danger" > Holiday </td>
													<?php
													}
													else{
													?>
														<td><?php echo PF_getManualDateTimeFormat($businessTiming->getFromTime(), "h:i A"); ?> </td>
														<td><?php echo PF_getManualDateTimeFormat($businessTiming->getToTime(), "h:i A"); ?> </td>
													<?php
													}
													?>
												</tr>
											<?php
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						<?php
						}
						?>

						<!--Ratings Section-->
						<div class="card ">
							<div class="card-header  align-items-center">
								<i class="feather-star"></i>
								<h4>Ratings</h4>
							</div>
							<div class="card-body">
								<div class="ratings-content">
									<div class="row">
										<div class="col-lg-3">
											<div class="ratings-info">
												<p class="ratings-score"><span><?php echo $businessFeedbackValue; ?></span>/5</p>
												<p>OVERALL</p>
												<p>
													<?php
													for($i = 1; $i <= 5; $i++){
														$ratingColor = "fas fa-star filled";
														if( round($businessFeedbackValue) < $i ){
															$ratingColor = "fa-regular fa-star rating-color";
														}
													?>
														<i class="<?php echo $ratingColor; ?>"></i>
													<?php
													}
													?>
												</p>
												<p>Based on Listing</p>
											</div>
										</div>
										<!--
										<div class="col-lg-9">
											<div class="ratings-table table-responsive">
												<table class="">
													<tr>
														<td class="star-ratings"><i class="fas fa-star filled"></i>
															<i class="fas fa-star filled"></i>
															<i class="fas fa-star filled"></i>
															<i class="fas fa-star filled"></i>
															<i class="fas fa-star filled"></i>
														</td>
														<td class="scrore-width"><span> </span></td>
														<td> 0</td>
													</tr>
													<tr>
														<td class="star-ratings"><i class="fas fa-star filled"></i>
															<i class="fas fa-star filled"></i>
															<i class="fas fa-star filled"></i>
															<i class="fas fa-star filled"></i>
															<i class="fa-regular fa-star rating-color"></i>
														<td class="scrore-width selected"><span> </span></td>
														<td> 1</td>
													</tr>
													<tr>
														<td class="star-ratings"><i class="fas fa-star filled"></i>
															<i class="fas fa-star filled"></i>
															<i class="fas fa-star filled"></i>
															<i class="fa-regular fa-star rating-color"></i>
															<i class="fa-regular fa-star rating-color"></i>
														</td>
														<td class="scrore-width"><span> </span></td>
														<td> 0</td>
													</tr>
													<tr>
														<td class="star-ratings"><i class="fas fa-star filled"></i>
															<i class="fas fa-star filled"></i>
															<i class="fa-regular fa-star rating-color"></i>
															<i class="fa-regular fa-star rating-color"></i>
															<i class="fa-regular fa-star rating-color"></i>
														<td class="scrore-width"><span> </span></td>
														<td> 0</td>
													</tr>
													<tr>
														<td class="star-ratings"><i class="fas fa-star filled"></i>
															<i class="fa-regular fa-star rating-color"></i>
															<i class="fa-regular fa-star rating-color"></i>
															<i class="fa-regular fa-star rating-color"></i>
															<i class="fa-regular fa-star rating-color"></i>
														</td>
														<td class="scrore-width"><span> </span></td>
														<td> 0</td>
													</tr>
												</table>
											</div>
										</div>
										-->
									</div>
								</div>
							</div>
						</div>
						<!--/Ratings Section-->
						
						<div class="rightsidebar">
							<div class="card">
								<h4><img src="assets/img/breifcase.svg" alt=""> Business Info</h4>
								<div class="map-details">
									<ul class="info-list">
										<?php
										if( $businessDetail != null ){
										?>
											<li><i class="feather-map-pin"></i> <?php echo $businessDetail->getAddressLine1() . " " . $businessDetail->getAddressLine2() . " " . $business->getCity()->getName() , " - " . $businessDetail->getPincode(); ?></li>
										<?php
										}


										foreach($businessContacts as $businessContact){
										?>
											<li>
												<img src=" <?php echo "images/contacttype/" . $businessContact->getContactType()->getId() . "." . $businessContact->getContactType()->getImage(); ?>" style="width: 25px; height: 25px" /> 
												<b><?php echo $businessContact->getContact(); ?></b>
											</li>
										<?php
										}
										?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Details Main Section -->

		<?php include("footer.php"); ?>

</body>

</html>