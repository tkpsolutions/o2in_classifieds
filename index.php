<?php
$noLogin = 1;
include("init.php");
$citys = $cityController->getByStatus("active");
$categorys = $categoryController->getByLimit(0, 6, "active");
$categoryAlls = $categoryController->getByStatus("active");
$events = $eventController->getByStatus("active");
$businesss = $businessController->getByLimit(null, 0, 7);
$businessIds = PF_getIds($businesss);
$businessDetails = $businessDetailController->getByBusinessIds($businessIds);
$posts = $postController->getByLimit(null, 0, 7);
$businessCityWiseCounts = $businessController->getCountCityWise();
$businessCategoryWiseCounts = $businessController->getCountCategoryWise();
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

		<!-- Banner Section -->
		<section class="banner-section">
			<div class="banner-circle">
				<img src="assets/img/bannerbg.png" class="img-fluid" alt="bannercircle">
			</div>
			<div class="container">
				<div class="home-banner">
					<div class="row align-items-center">
						<div class="col-lg-7">
							<div class="section-search aos" data-aos="fade-up">
								<p class="explore-text"> <span>Explore top-rated businesses</span></p>
								<img src="assets/img/arrow-banner.png" class="arrow-img" alt="arrow">
								<h1>Let us help you <br>
									<span>Find</span> & Contact
								</h1>
								<div class="search-box">
									<form action="search.php" method="GET" class="d-flex">
										<div class="search-input">
											<div class="form-group">
												<div class="group-img">
													<select class="form-control select loc-select" name="lid">
														<option value="0">Choose Location</option>
														<?php
														foreach ($citys as $city) {
														?>
															<option value="<?php echo $city->getId(); ?>">
																<?php echo $city->getName(); ?>
															</option>
														<?php
														}
														?>
													</select>
												</div>
											</div>
										</div>
										<div class="search-input line">
											<div class="form-group">
												<select class="form-control select category-select" name="cid">
													<option value="0">Choose Category</option>
													<?php
													foreach ($categoryAlls as $category) {
													?>
														<option value="<?php echo $category->getId(); ?>">
															<?php echo $category->getName(); ?>
														</option>
													<?php
													}
													?>
												</select>
											</div>
										</div>
										<div class="search-btn">
											<button class="btn btn-primary" type="submit"> <i class="fa fa-search" aria-hidden="true"></i> Search</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-lg-5">
							<div class="banner-imgs">
								<img src="assets/img/Right-img.png" class="img-fluid" alt="bannerimage">
							</div>
						</div>
					</div>
				</div>
			</div>
			<img src="assets/img/bannerellipse.png" class="img-fluid banner-elipse" alt="arrow">
			<img src="assets/img/banner-arrow.png" class="img-fluid bannerleftarrow" alt="arrow">
		</section>
		<!-- /Banner Section -->

		<!-- Category Section -->
		<section class="category-section">
			<div class="container">
				<div class="section-heading">
					<div class="row align-items-center">
						<div class="col-md-6 aos aos-init aos-animate" data-aos="fade-up">
							<h2><span class="title-left">Cat</span>egories</h2>
							<p>Find Everything from your location</p>
						</div>
					</div>
				</div>
				<div class="row">
					<?php
					foreach($categorys as $category){
						$categoryImage = "images/category/images/" . $category->getId() . "." . $category->getImage();
						$count = 0;
						foreach($businessCategoryWiseCounts as $businessCategoryWiseCount){
							if( $category->getId() == $businessCategoryWiseCount->getCategoryId() ){
								$count = $businessCategoryWiseCount->getId();
							}
						}
					?>
						<div class="col-lg-2 col-md-3 col-sm-6 col-6">
							<a href="search.php?cid=<?php echo $category->getId(); ?>" class="category-links">
								<h5><?php echo $category->getName(); ?></h5>
								<span><?php echo $count; ?> Ads</span>
								<img src="<?php echo $categoryImage; ?>" alt="icons">
							</a>
						</div>
					<?php
					}
					?>
					<div class="col-12 text-center aos aos-init aos-animate" data-aos="fade-up">
						<a href="categories.php" class="btn  btn-view">View All</a>
					</div>
				</div>
			</div>
		</section>
		<!-- /Category Section -->

		<!-- Featured ADS Section -->
		<section class="featured-section">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6 aos aos-init aos-animate" data-aos="fade-up">
						<div class="section-heading">
							<h2>Latest Events</h2>
							<p>Checkout these latest near by events</p>
						</div>
					</div>
					<div class="col-md-6 text-md-end aos" data-aos="fade-up">
						<div class="owl-nav mynav2"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="owl-carousel featured-slider grid-view">
							<?php
							foreach($events as $event) {
								$eventImage = "images/event/" . $event->getId() . "." . $event->getImage();
							?>
								<div class="card aos" data-aos="fade-up">
									<div class="blog-widget">
										<div class="blog-img">
											<a href="event.php?id=<?php echo $event->getId(); ?>">
												<img src="<?php echo $eventImage; ?>" class="img-fluid" alt="blog-img">
											</a>
											<div class="fav-item">
												<span class="Featured-text"><?php echo $event->getCity()->getName(); ?> </span>
											</div>
										</div>
										<div class="bloglist-content">
											<div class="card-body">
												<div class="blogfeaturelink">
													<div class="blog-features">
													<a href="event.php?id=<?php echo $event->getId(); ?>"><span> <i class="fa-regular fa-circle-stop"></i> <?php echo $event->getEventCategory()->getName(); ?></span></a>
													</div>
												</div>
												<h6><a href="event.php?id=<?php echo $event->getId(); ?>"><?php echo $event->getTitle(); ?></a></h6>
												<div class="blog-location-details">
													<div class="location-info">
														<i class="fa-regular fa-calendar-days"></i> <?php echo PF_getManualDateTimeFormat($event->getEventDate(), "d-M-Y"); ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /Featured ADS Section -->

		<!-- Popular Location Section -->
		<section class="popular-locations d-none">
			<div class="popular-circleimg">
				<img class="img-fluid" src="assets/img/popular-img.png" alt="Popular-sections">
			</div>
			<div class="container">
				<div class="section-heading">
					<h2>Popular <span>Loc</span>ations</h2>
					<p>Start by selecting your favuorite location and explore the information</p>
				</div>
				<div class="location-details d-flex">
					<div class="row">
						<?php
						foreach($citys as $city){
							$count = 0;
							foreach($businessCityWiseCounts as $businessCityWiseCount){
								if( $city->getId() == $businessCityWiseCount->getCityId() ){
									$count = $businessCityWiseCount->getId();
								}
							}
						?>
							<div class="location-info col-lg-4 col-md-6">
								<div class="location-info-details d-flex align-items-center">
									<div class="location-img">
										<a href="search.php?lid=<?php echo $city->getId(); ?>"><img class="img-fluid" src="assets/img/locations/usa.jpg" alt="locations"></a>
									</div>
									<div class="location-content">
										<a href="search.php?lid=<?php echo $city->getId(); ?>"><?php echo $city->getName(); ?></a>
										<p><?php echo $count; ?> Ads Posted</p>
										<a href="search.php?lid=<?php echo $city->getId(); ?>" class="view-detailsbtn">View Details</a>
									</div>
								</div>
							</div>
						<?php
						}
						?>
					</div>
				</div>
				<div class="align-items-center"><a href="search.php" class="browse-btn">Browse Ads</a></div>
			</div>
		</section>
		<!-- /Popular Locations Section -->

		<!-- Latest Ads Section -->
		<section class="latestad-section grid-view featured-slider d-none">
			<div class="container">
				<div class="section-heading">
					<div class="row align-items-center">
						<div class="col-md-6 aos aos-init aos-animate" data-aos="fade-up">
							<h2>Lat<span class="title-right">est</span> Members</h2>
							<p>checkout these latest our members</p>
						</div>
						<div class="col-md-6 text-md-end aos aos-init aos-animate" data-aos="fade-up">
							<a href="search.php" class="btn  btn-view">View All</a>
						</div>
					</div>
				</div>
				<div class="lateestads-content">
					<div class="row justify-content-center">
						<?php
						foreach($businesss as $business) {
							$businessBannerImage = "";
							foreach($businessDetails as $businessDetail){
								if( $business->getId() == $businessDetail->getBusinessId() ){
									$businessBannerImage = "images/businessbanner/" . $business->getId() . "." . $businessDetail->getBanner();
								}
							}
							if( !is_file($businessBannerImage) ){
								$businessBannerImage = $systemImage404;
							}
						?>
							<div class="col-lg-3 col-md-4 col-sm-6 d-flex">
								<div class="card aos flex-fill" data-aos="fade-up">
									<div class="blog-widget">
										<div class="blog-img">
											<a href="single.php?id=<?php echo $business->getId(); ?>">
												<img src="<?php echo $businessBannerImage; ?>" class="img-fluid" alt="blog-img">
											</a>
										</div>
										<div class="bloglist-content">
											<div class="card-body">
												<div class="blogfeaturelink">
													<div class="blog-features">
														<a href="javascript:void(0)"><span> <i class="fa-regular fa-circle-stop"></i> <?php echo $business->getCategory()->getName(); ?></span></a>
													</div>
												</div>
												<h6><a href="single.php?id=<?php echo $business->getId(); ?>"><?php echo $business->getName(); ?></a></h6>
												<div class="blog-location-details">
													<div class="location-info">
														<i class="feather-map-pin"></i> <?php echo $business->getCity()->getName(); ?>
													</div>
													<div class="location-info">
														<i class="fa-solid fa-calendar-days"></i> <?php echo PF_getManualDateTimeFormat($business->getUpdatedDateTime(), "d-M-Y"); ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php
						}
						?>
					</div>
				</div>
			</div>
		</section>
		<!-- /Latest Ads Section -->

		<!-- Blog  Section -->
		<section class="blog-section">
			<div class="section-heading">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-6 aos aos-init aos-animate" data-aos="fade-up">
							<h2>Lat<span class="title-right">est</span> Posts</h2>
							<p>people are giving these information for free so check them out</p>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<?php
					foreach($posts as $post){
						$postImage = "images/post/" . $post->getId() . "." . $post->getImage();
					?>
						<div class="col-lg-4 col-md-4 d-flex">
							<div class="blog grid-blog">
								<div class="blog-image">
									<a href="post.php?id=<?php echo $post->getId(); ?>"><img class="img-fluid" src="<?php echo $postImage; ?>" alt="Post Image"></a>
								</div>
								<div class="blog-content">
									<p class="blog-category">
										<a href="javascript:void(0);"><span><?php echo $post->getPostCategory()->getName(); ?></span></a>
									</p>
									<ul class="entry-meta meta-item">
										<li class="date-icon"><i class="fa-solid fa-calendar-days"></i> <?php echo PF_getManualDateTimeFormat($post->getUpdatedDateTime(), "d-M-Y"); ?></li>
									</ul>
									<h3 class="blog-title"><a href="post.php?id=<?php echo $post->getId(); ?>"><?php echo $post->getTitle(); ?></a></h3>
									<!--
									<p class="blog-description"></p>
									-->
									<p class="viewlink"><a href="post.php?id=<?php echo $post->getId(); ?>">View Details <i class="feather-arrow-right"></i></a></p>
								</div>
							</div>
						</div>
					<?php
					}
					?>
					<div class="col-12 text-end aos aos-init aos-animate" data-aos="fade-up">
						<a href="blog.php" class="btn  btn-view">View All</a>
					</div>
				</div>
			</div>
		</section>
		<!-- /Blog  Section -->

		<?php include("footer.php"); ?>

</body>

</html>