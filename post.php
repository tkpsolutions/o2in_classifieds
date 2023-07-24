<?php
$noLogin = 1;
include("init.php");
$postId = 0;
if( !isset($_GET['id']) ){
	header("location: blog.php");
	exit();
}
$postId = $_GET['id'];
$post = $postController->getById($postId);
if( $post == null ){
	header("location: blog.php");
	exit();
}
$postImage = "images/post/" . $post->getId() . "." . $post->getImage();
$postPrev = $postController->getById($postId - 1);
$postNext = $postController->getById($postId + 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("head.php"); ?>
	<title><?php echo $post->getTitle(); ?> | O2in | Business Listing and Booking Management</title>
</head>

<body>

	
	<div class="main-wrapper innerpagebg">
		<?php include("menu.php"); ?>
		
		<!--Blog Banner-->
		<div class="blogbanner" style="background:linear-gradient(0deg, rgba(184, 195, 255, 0.3), rgba(149, 152, 171, 0.3)), url(<?php echo $postImage; ?>); background-size: cover">
		   
			 <div class="blogbanner-content">
			    <span class="blog-hint"><?php echo $post->getPostCategory()->getName(); ?></span>
				<h1><?php echo $post->getTitle(); ?></h1>
				<ul class="entry-meta meta-item">
				    <li class="date-icon"><i class="fa-solid fa-calendar-days"></i> October 6, 2022</li>
				</ul>
			</div>		            
		</div>	
		<!--/Blog Banner-->
		
		<!--Blog Content-->
		<div class="blogdetail-content">
		    <div class="container">
			    <p><?php echo $post->getDescription(); ?></p>		
				<!--
			    <div class="row">
				   <div class="col-lg-6 col-md-6">
				        <div class="bloginner-img">
							 <img src="assets/img/blog/blogdetailimg-1.jpg" class="img-fluid" alt="">											 
						</div>
				   </div>
				   <div class="col-lg-6 col-md-6">
				         <div class="bloginner-img">
							 <img src="assets/img/blog/blogdetailimg-2.jpg"  class="img-fluid" alt="">					 
						</div>	   
				   </div>				
				</div>
				-->
				<div class="share-postsection">
				     <div class="row">
					    <div class="col-lg-4">
						    <div class="sharelink">
							   <a href="whatsapp://send?text=<?php echo $systemPagelink . "   " . $post->getTitle(); ?>" class="share-img"><i class="fas fa-light fa-share-nodes"></i></a>
							   <a href="whatsapp://send?text=<?php echo $systemPagelink . "   " . $post->getTitle(); ?>" class="share-text">Share With Friends</a>
							</div>
						</div>
					 </div>
				</div>
				<div class="blogdetails-pagination">
				    <ul>
						<?php
						if( $postPrev != null ){
						?>
							<li>
								<a href="post.php?id=<?php echo $postPrev->getId(); ?>" class="prev-link"><i class="fas fa-regular fa-arrow-left"></i> Previous Post</a>
								<a href="post.php?id=<?php echo $postPrev->getId(); ?>"><h3><?php echo $postPrev->getTitle(); ?></h3> </a>
							</li>
						<?php
						}
						else{
							echo "<li></li>";
						}

						if( $postNext != null ){
						?>
							<li>
								<a href="post.phpid=<?php echo $postNext->getId(); ?>" class="next-link">Next Post <i class="fas fa-regular fa-arrow-right"></i> </a>
								<a href="post.php?id=<?php echo $postNext->getId(); ?>"><h3><?php echo $postNext->getTitle(); ?></h3> </a>
							</li>
						<?php
						}
						?>
					</ul>				
				</div>
			</div>		
		</div>   
		<!--/Blog Content-->
		
		<?php include("footer.php"); ?>
	
</body>
</html>