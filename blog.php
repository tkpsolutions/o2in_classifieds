<?php
$noLogin = 1;
include("init.php");
$posts = $postController->getAll();
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

		<!-- Breadscrumb Section -->
		<div class="breadcrumb-bar">
			<div class="container">
				<div class="row align-items-center text-center">
					<div class="col-md-12 col-12">
						<h2 class="breadcrumb-title">O2in-POSTS</h2>
					</div>
				</div>
			</div>
		</div>
		<!-- /Breadscrumb Section -->

		<!-- Blog List -->
		<div class="bloglist-section blog-gridpage">
			<div class="container">
				<div class="row">
					<?php
					foreach ($posts as $post) {
						$postImage = "images/post/" . $post->getId() . "." . $post->getImage();
					?>
						<div class="col-lg-4 col-md-4 d-lg-flex">
							<div class="blog grid-blog">
								<div class="blog-image">
									<a href="post.php?id=<?php echo $post->getId() ?>"><img class="img-fluid" src="<?php echo $postImage; ?>" alt="Post Image"></a>
								</div>
								<div class="blog-content">
									<p class="blog-category">
										<a href="post.php?id=<?php echo $post->getId() ?>""><span><?php echo $post->getPostCategory()->getName(); ?></span></a>
									</p>
									<h3 class="blog-title"><a href="post.php?id=<?php echo $post->getId() ?>""><?php echo $post->getTitle(); ?></a></h3>
									<p class="blog-description"></p>
								</div>
							</div>
						</div>
					<?php
					}
					?>
				</div>

				<!--Pagination-->
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
				<!--/Pagination-->

			</div>
		</div>
		<!-- /Blog List -->

		<?php include("footer.php"); ?>

</body>

</html>