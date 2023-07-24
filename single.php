<?php
$noLogin = 1;
include("init.php");
if (!isset($_GET['id'])) {
	header("location: index.php");
	exit();
}
$businessId = $_GET['id'];
$business = $businessController->getById($businessId);
if ($business == null) {
	header("location: index.php");
	exit();
}
$businessDetail = $businessDetailController->getByBusinessId($businessId);
if( $businessDetail == null ){
	header("location: index.php");
	exit();
}
$businessLogo = $systemImage404;
$descriptionLong = "";
if ($businessDetail != null) {
	$businessLogo = "images/businesslogo/" . $businessDetail->getId() . "." . $businessDetail->getLogo();
	$descriptionLong = $businessDetail->getDescriptionLong();
}
$businessImages = $businessImageController->getByBusinessId($businessId);
$businessFeedbackSummary = $businessFeedbackController->getSummaryByBussinessId($businessId);

$businessFeedbackValue = 0;
if ($businessFeedbackSummary != null) {
	$businessFeedbackValue = $businessFeedbackSummary->getStarCount() / $businessFeedbackSummary->getId();
}

$businessContacts = $businessContactTypeController->getByBusinessId($businessId);
$businessTags = $businessTagController->getByBusinessId($businessId);
$businessProducts = $businessProductController->getByBusinessId($businessId);
$businessTimings = $businessTimingController->getByBusinessId($businessId);
$businessServices = $businessServiceController->getByBusinessId($businessId);

//business service selection
$businessServiceId  = 0;
$busienssTokenDates = null;
if (isset($_GET['businessServiceId'])) {
	$businessServiceId = $_GET['businessServiceId'];
	$busienssTokenDates = $businessTokenController->getAvailableDates($businessId, null, 0, $businessServiceId);
}

//date selection
$busienssTokenDateSelected = "";
$businessTokens = null;
if (isset($_GET['businessTokenDate'])) {
	$busienssTokenDateSelected = $_GET['businessTokenDate'];
	$businessTokens = $businessTokenController->search($businessId, $busienssTokenDateSelected, $busienssTokenDateSelected, null, $businessServiceId);
}

//token selection
$businessTokenIdSelected = 0;
$businessTokenSelected = null;
if (isset($_GET['businessTokenId'])) {
	$businessTokenIdSelected = $_GET['businessTokenId'];
	$businessTokenSelected = $businessTokenController->getById($businessTokenIdSelected);
}

//checking old feedback
$businessFeedbackByUser = null;
if( $loggedUser != null ){
	$businessFeedbackByUser = $businessFeedbackController->getByBusinessIdUserId($businessId, $loggedUser->getId());
}
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
								for ($i = 1; $i <= 5; $i++) {
									$ratingColor = "fas fa-star filled";
									if (round($businessFeedbackValue) < $i) {
										$ratingColor = "fa-regular fa-star rating-color";
									}
								?>
									<i class="<?php echo $ratingColor; ?>"></i>
								<?php
								}
								?>

								<?php
								if ($businessFeedbackSummary != null) {
								?>
									<span class="d-inline-block average-rating"> <?php echo $businessFeedbackValue; ?> </span>
								<?php
								} else {
								?>
									<span class="d-inline-block average-rating"> No Reviews </span>
								<?php
								}
								?>
							</div>
							<div class="tags">
								<?php
								foreach ($businessTags as $businessTag) {
									if( $businessTag->getTag() == null ){
										continue;
									}
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
						<section id="booking">
							<div class="card">
								<?php
								if ($loggedUser != null) {
								?>
									<div class="card-header">
										<span class="bar-icon">
											<span></span>
											<span></span>
											<span></span>
										</span>
										<h4>Appointment</h4>
									</div>
									<div class="card-body">
										<form method="POST" action="booking-wallet-confirm.php">
											<input type="text" value="<?php echo $businessId; ?>" id="businessId" name="businessId" class="d-none" />
											<div class="form-group">
												<label>Select Service / Reason</label>
												<select class="form-control" id="businessServiceId" name="businessServiceId" onchange="loadDate()">
													<option value="0">Select a option to book</option>
													<?php
													foreach ($businessServices as $businessService) {
														$selected = "";
														if ($businessService->getId() == $businessServiceId) {
															$selected = "selected";
														}
													?>
														<option <?php echo $selected; ?> value="<?php echo $businessService->getId(); ?>">
															<?php echo $businessService->getName(); ?>
														</option>
													<?php
													}
													?>
												</select>
											</div>
											<?php
											if ($businessServiceId > 0) {
											?>
												<div class="form-group">
													<label>Select Date</label>
													<select class="form-control" id="businessTokenDate" onchange="loadToken()">
														<option value="0">Select a date</option>
														<?php
														foreach ($busienssTokenDates as $busienssTokenDate) {
															$selected = "";
															if (strcasecmp($busienssTokenDateSelected, $busienssTokenDate->getTokenDate()) == 0) {
																$selected = "selected";
															}
														?>
															<option <?php echo $selected; ?> value="<?php echo $busienssTokenDate->getTokenDate(); ?>">
																<?php echo $busienssTokenDate->getTokenDate(); ?>
															</option>
														<?php
														}
														?>
													</select>
												</div>
												<?php
												if ($busienssTokenDateSelected != 0) {
												?>
													<div class="form-group">
														<label>Select Your Slot / Token </label>
														<div class="token-grid">
															<?php
															foreach ($businessTokens as $businessToken) {

																$tokenBookingLink = "single.php?id=" . $businessId . "&businessServiceId=" . $businessServiceId . "&businessTokenDate=" . $busienssTokenDateSelected . "&businessTokenId=" . $businessToken->getId() . "#booking";
																$tokenBookedClass = "";

																if (strcasecmp($businessToken->getStatus(), "Booked") == 0) {
																	$tokenBookingLink = "";
																	$tokenBookedClass = "booked";
																}

																$tokenSelectedClass = "";
																if ($businessTokenIdSelected == $businessToken->getId()) {
																	$tokenSelectedClass = "active";
																}
															?>
																<a href="<?php echo $tokenBookingLink; ?>" class="token-element <?php echo $tokenBookedClass; ?> <?php echo $tokenSelectedClass; ?>">
																	<?php echo $businessToken->getFromTime(); ?>
																</a>
															<?php
															}
															?>
														</div>
													</div>
											<?php
												}
											}
											?>
											<?php
											if ($businessTokenIdSelected > 0) {
												//form values
											?>
												<div class="form-group">
													<label> Remarks / Additional Info </label>
													<textarea required class="form-control" name="bookingRemarks"></textarea>
												</div>

												<div class="form-group">
													<input type="text" class="d-none" value="<?php echo $businessTokenIdSelected; ?>" readonly required name="busienssTokenId" />
													<button type="submit" class="btn btn-success"> Confirm My Booking </button>
												</div>
											<?php
											}
											?>
										</form>
									</div>
								<?php
								}
								?>
							</div>
						</section>

						<?php
						if (sizeof($businessProducts) > 0) {
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
												foreach ($businessProducts as $businessProduct) {
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
														<td><?php echo $businessProduct->getTaxPercentage(), " %"; ?></td>
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
						if (strlen($descriptionLong) > 0) {
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
						if (sizeof($businessImages) > 0) {
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
											foreach ($businessImages as $businessImage) {
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
						if (sizeof($businessTimings) > 0) {
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
											foreach ($businessTimings as $businessTiming) {
											?>
												<tr>
													<td><?php echo PF_ConvertNumberToDay($businessTiming->getDayNumber()); ?></td>

													<?php
													if ($businessTiming->getIsFullDay() == 1) {
													?>
														<td colspan="2" class="bg-success"> 24 x 7 Available </td>
													<?php
													} else if ($businessTiming->getIsFullDay() == 1) {
													?>
														<td colspan="2" class="bg-danger"> Holiday </td>
													<?php
													} else {
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
													for ($i = 1; $i <= 5; $i++) {
														$ratingColor = "fas fa-star filled";
														if (round($businessFeedbackValue) < $i) {
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
										<div class="col-lg-9">
											<?php
											if( $loggedUser != null ){
												if( $businessFeedbackByUser == null ){
												?>
													<!-- feedback Form -->
													<form id="form-1">
														<input type="text" value="<?php echo $businessId; ?>" name="businessId" readonly required class="d-none" />
														<div class="form-group">
															<select class="form-control" id="starCount" name="starCount">
																<option value="0"> Select a rating </option>
																<option value="5"> Best </option>
																<option value="4"> Good </option>
																<option value="3"> Average </option>
																<option value="2"> Below Average </option>
																<option value="1"> Not Good </option>
															</select>
														</div>
														<div class="form-group">
															<textarea class="form-control pass-input" placeholder="Feedback description" name="message" id="message" required></textarea>
														</div>
														<button class="btn btn-primary w-100 login-btn" type="submit">Submit Feedback</button>
													</form>
													<!-- /feedback Form -->
												<?php
												}
												else{
													?>
													<h4 style="text-align: center;"> You have already provided feedback</h4>
													<?php
												}
											}
											?>
											<!--
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
											-->
										</div>
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
										if ($businessDetail != null) {
										?>
											<li><i class="feather-map-pin"></i> <?php echo $businessDetail->getAddressLine1() . " " . $businessDetail->getAddressLine2() . " " . $business->getCity()->getName(), " - " . $businessDetail->getPincode(); ?></li>
										<?php
										}


										foreach ($businessContacts as $businessContact) {
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

<script>
	function loadDate() {
		var businessServiceId = document.getElementById("businessServiceId").value;
		if (businessServiceId == 0) {
			alert("Please select a service");
			return false;
		}
		var businessId = document.getElementById("businessId").value;
		window.location = "single.php?id=" + businessId + "&businessServiceId=" + businessServiceId + "#booking";
	}

	function loadToken() {
		var businessServiceId = document.getElementById("businessServiceId").value;
		if (businessServiceId == 0) {
			alert("Please select a service");
			return false;
		}
		var businessTokenDate = document.getElementById("businessTokenDate").value;
		if (businessTokenDate == 0) {
			alert("Pleasee select a date");
			return false;
		}
		var businessId = document.getElementById("businessId").value;
		window.location = "single.php?id=" + businessId + "&businessServiceId=" + businessServiceId + "&businessTokenDate=" + businessTokenDate + "#booking";
	}

	$(document).ready(function(e)
	{
		//form-content
		$("#form-1").on('submit',(function(e)
		{
			e.preventDefault();
			
			//mobile
			value = document.getElementById("starCount").value.trim();
			if( value == 0 )	
			{
				alert("Please select a rating");
				document.getElementById("starCount").focus();
				return false;
			}
			
			//waitingDialog.show('Please wait. Action in progress..!!');
			$.ajax
			({
				url: "my-feedback-insert.php",
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
						if( data > 0 )
						{
							alert("Feedback added");
							location.reload();
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