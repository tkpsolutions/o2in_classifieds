<?php
$noLogin = 1;
include("init.php");

$cityId = 0;
$categoryId = 0;

if( isset($_GET['cid']) )
{
	$categoryId = $_GET['cid'];
}

if( isset($_GET['lid']) )
{
	$cityId = $_GET['lid'];
}

$citys = $cityController->getByStatus("active");
$categorys = $categoryController->getByStatus("active");
$businesss = $businessController->getByCityIdCategoryId(null, $cityId, $categoryId);
$businessIds = PF_getIds($businesss);
if( strlen($businessIds) == 0 ){
	$businessIds = 0;
}
$businessDetails = $businessDetailController->getByBusinessIds($businessIds);
$tags = $tagController->getByCategoryId($categoryId);

$selectedTagId = 0;
if( isset($_GET['tagId']) ){
	$selectedTagId = $_GET['tagId'];
}
$businessTags = $businessTagController->getByBusinessIds($businessIds);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("head.php"); ?>
	<title>O2in | Business Listing and Booking Management</title>
</head>

<body>


	<div class="main-wrapper innerpagebg">

		<?php include("menu.php"); ?>

		<br>

		<!-- Main Content Section -->
		<div class="list-content">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 theiaStickySidebar">
						<div class="listings-sidebar">
							<div class="card">
								<h4><img src="assets/img/details-icon.svg" alt="details-icon"> Search</h4>
								<form action="search.php" method="GET">
									<?php
									if( $cityId == 0 ){
									?>
										<div class="filter-content form-group">
											<select class="form-control select category-select" name="lid">
												<option value="0">Filter By City</option>
												<?php
												foreach ($citys as $city) {
													$selected = "";
													if( $city->getId() == $cityId ){
														$selected = "selected";
													}
												?>
													<option <?php echo $selected; ?> value="<?php echo $city->getId(); ?>">
														<?php echo $city->getName(); ?>
													</option>
												<?php
												}
												?>
											</select>
										</div>
									<?php
									}
									else{
									?>
										<input type="text" readonly required value="<?php echo $cityId; ?>" name="lid" class="d-none" />
									<?php
									}
									if( $categoryId == 0 ){
									?>
										<div class="filter-content form-group">
											<select class="form-control select category-select" name="cid">
												<option value="0">Filter By Category</option>
												<?php
												foreach ($categorys as $category) {
													$selected = "";
													if( $category->getId() == $categoryId ){
														$selected = "selected";
													}
												?>
													<option <?php echo $selected; ?> value="<?php echo $category->getId(); ?>">
														<?php echo $category->getName(); ?>
													</option>
												<?php
												}
												?>
											</select>
										</div>
									<?php
									}
									else{
									?>
										<input type="text" readonly required value="<?php echo $categoryId; ?>" name="cid" class="d-none" />
									<?php
									}
									if( $categoryId > 0 ){
									?>
										<div class="filter-content form-group">
											<select class="form-control select category-select" name="tagId">
												<option value="0">Filter By Tags</option>
												<?php
												foreach ($tags as $tag) {
													$selected = "";
													if( $tag->getId() == $tagId ){
														$selected = "selected";
													}
												?>
													<option <?php echo $selected; ?> value="<?php echo $tag->getId(); ?>">
														<?php echo $tag->getName(); ?>
													</option>
												<?php
												}
												?>
											</select>
										</div>
									<?php
									}
									?>
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
						<div class="grid-view listgrid-sidebar">
							<div class="row">
								<?php
								foreach ($businesss as $business) {
									$businessBannerImage = "";
									foreach ($businessDetails as $businessDetail) {
										if ($business->getId() == $businessDetail->getBusinessId()) {
											$businessBannerImage = "images/businessbanner/" . $businessDetail->getId() . "." . $businessDetail->getBanner();
										}
									}

									if( !is_file($businessBannerImage) ){
										$businessBannerImage = $systemImage404;
									}

									$show = true;
									if( $selectedTagId > 0 ){
										$show = false;
										foreach($businessTags as $businessTag){
											if( $businessTag->getTagId() == $selectedTagId ){
												$show = true;
											}
										}
									}

									if( $show ){
								?>
										<div class="col-lg-6 col-md-4">
											<div class="card">
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
																	<a href="single.php?id=<?php echo $business->getId(); ?>"><span> <i class="fa-regular fa-circle-stop"></i> <?php echo $business->getCategory()->getName(); ?></span></a>
																</div>
																<div class="blog-author text-end">
																	<span> <i class="feather-eye"></i>40 </span>
																</div>
															</div>
															<h6><a href="single.php?id=<?php echo $business->getId(); ?>"><?php echo $business->getName(); ?></a></h6>
															<div class="blog-location-details">
																<div class="location-info">
																	<i class="feather-map-pin"></i> <?php echo $business->getCity()->getName(); ?>
																</div>
																<div class="location-info">
																	<i class="fa-solid fa-calendar-days"></i> 06 Oct, 2022
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
								<?php
									}
								}
								?>
							</div>
						</div>

						<!--Pagination-->
						<div class="blog-pagination d-none">
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
						<!--Pagination-->

					</div>
				</div>
			</div>
		</div>
		<!-- /Main Content Section -->

		<?php include("footer.php"); ?>

</body>

</html>