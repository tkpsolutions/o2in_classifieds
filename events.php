<?php
$noLogin = 1;
include("init.php");
$events = $eventController->getByStatus("active");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("head.php"); ?>
	<title>Events | O2in | Business Listing and Booking Management</title>
</head>

<body>


	<div class="main-wrapper innerpagebg">

		<?php include("menu.php"); ?>

		<!-- Breadscrumb Section -->
		<div class="breadcrumb-bar">
			<div class="container">
				<div class="row align-items-center text-center">
					<div class="col-md-12 col-12">
						<h2 class="breadcrumb-title">Events-List</h2>
					</div>
				</div>
			</div>
		</div>
		<!-- /Breadscrumb Section -->

		<!-- Main Content Section -->
		<div class="list-content">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 theiaStickySidebar">
						<div class="listings-sidebar">
							<div class="card">
								<h4><img src="assets/img/details-icon.svg" alt="details-icon"> Filter</h4>
								<form>
									<div class="filter-content form-group">
										<select class="form-control select category-select">
											<option value="">Choose Category</option>
											<option>Job Fairs</option>
											<option>Entertainment</option>
											<option>Politics</option>
											<option>Medical Camps</option>
										</select>
									</div>
									<div class="filter-content form-group region">
										<select class="form-control select region-select">
											<option value="">Location</option>
											<option>Trichy</option>
											<option>Madurai</option>
											<option>Coimbator</option>
										</select>
									</div>
									<div class="filter-content amenities mb-0">
										<div class="search-btn">
											<button class="btn btn-primary" type="submit"> <i class="fa fa-search" aria-hidden="true"></i> Search</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="row sorting-div">
							<div class="col-lg-4 col-sm-4 align-items-center d-flex">
								<div class="count-search">
									<p>Showing <span>1-8</span> of 10 Results</p>
								</div>
							</div>
						</div>
						<div class="blog-listview">
							<div class="card">
								<?php
								foreach ($events as $event) {
									$eventImage = "images/event/" . $event->getId() . "." . $event->getImage();
								?>
									<div class="blog-widget">
										<div class="blog-img">
											<a href="event.php?id=<?php echo $event->getId(); ?>">
												<img src="<?php echo $eventImage; ?>" class="img-fluid" alt="blog-img">
											</a>
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
														<i class="feather-map-pin"></i> <?php echo $event->getCity()->getName(); ?>
													</div>
													<!--
													<div class="location-info">
														<i class="feather-phone-call"></i> +91 9790256734
													</div>
													-->
												</div>
												<p class="ratings">
													<span><?php echo PF_getManualDateTimeFormat($event->getEventDate(), "d-M-Y"); ?></span>
												</p>
											</div>
										</div>
									</div>
								<?php
								}
								?>
							</div>
							<!--
							<div class="blog-pagination">
								<nav>
									<ul class="pagination">
										<li class="page-item previtem">
											<a class="page-link" href="#"><i class="fas fa-regular fa-arrow-left"></i> Prev</a>
										</li>
										<li class="justify-content-center pagination-center"> 
											<div class="pagelink">
											    <ul>
													<li class="page-item">
														<a class="page-link" href="#">1</a>
													</li>
													<li class="page-item active">
														<a class="page-link" href="#">2 <span class="visually-hidden">(current)</span></a>
													</li>
													<li class="page-item">
														<a class="page-link" href="#">3</a>
												   </li>
												   <li class="page-item">
														<a class="page-link" href="#">...</a>
												   </li>
												   <li class="page-item">
														<a class="page-link" href="#">14</a>
												   </li>
											   </ul>
										   </div>													
										</li>													
										<li class="page-item nextlink">
											<a class="page-link" href="#">Next <i class="fas fa-regular fa-arrow-right"></i></a>
										</li>
									</ul>
								</nav>
					        </div>
							-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Main Content Section -->

		<?php include("footer.php"); ?>

</body>

</html>