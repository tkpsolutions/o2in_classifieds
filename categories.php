<?php
$noLogin = 1;
include("init.php");
$categorys = $categoryController->getByStatus("active");
$businessCategoryWiseCounts = $businessController->getCountCategoryWise();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("head.php"); ?>
	<title>O2in Categories | Business Listing and Booking Management</title>

</head>

<body>


	<div class="main-wrapper innerpagebg">

		<?php include("menu.php"); ?>

		<!-- Categories Section -->
		<div class="categorieslist-section" style="margin-top: 50px;">
			<div class="container">
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
						<div class="col-lg-2 col-md-3 col-sm-4 col-6">
							<div class="categories-content">
								<a href="search.php?cid=<?php echo $category->getId(); ?>" class="text-center aos aos-init aos-animate" data-aos="fade-up">
									<img src="<?php echo $categoryImage; ?>" alt="car1">
									<h6><?php echo $category->getName(); ?></h6>
									<span class="ads"><?php echo $count; ?> Ads</span>
								</a>
							</div>
						</div>
					<?php
					}
					?>
				</div>
			</div>
		</div>
		<!-- /Categories Section -->

		<?php include("footer.php"); ?>

</body>

</html>