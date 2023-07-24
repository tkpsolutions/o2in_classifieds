<?php
$noLogin = 1;
include('init.php');
$eventId = 0;
$event = null;

if( isset($_GET['id']) ){
	$eventId = $_GET['id'];
	$event = $eventController->getById($eventId);
}

if( $event == null ){
	header("location: events.php");
	exit();
}

$eventImage = "images/event/" . $event->getId() . "." . $event->getImage();
$eventPrev = $eventController->getById($eventId - 1);
$eventNext = $eventController->getById($eventId + 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("head.php"); ?>
	<title><?php echo $event->getTitle(); ?> | O2in | Business Listing and Booking Management</title>
</head>

<body>

	
	<div class="main-wrapper innerpagebg">
		<?php include("menu.php"); ?>
		
		<!--Blog Banner-->
		<div class="blogbanner" style="background:linear-gradient(0deg, rgba(184, 195, 255, 0.3), rgba(149, 152, 171, 0.3)), url(<?php echo $eventImage; ?>); background-size: cover">
		   
			 <div class="blogbanner-content">
			    <span class="blog-hint"><?php echo $event->getEventCategory()->getName(); ?></span>
				<h1><?php echo $event->getTitle(); ?></h1>
				<ul class="entry-meta meta-item">
				    <li class="date-icon"><i class="fa-solid fa-calendar-days"></i> <?php echo PF_getManualDateTimeFormat($event->getEventDate(), "d-M-Y"); ?></li>
				</ul>
			</div>		            
		</div>	
		<!--/Blog Banner-->
		
		<!--Blog Content-->
		<div class="blogdetail-content">
		    <div class="container">
			    <p>
					<?php echo $event->getDescription(); ?>
				</p>
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
							   <a href="whatsapp://send?text=<?php echo $systemPagelink . "   " . $event->getTitle(); ?>" class="share-img"><i class="fas fa-light fa-share-nodes"></i></a>
							   <a href="whatsapp://send?text=<?php echo $systemPagelink . "   " . $event->getTitle(); ?>" class="share-text">Share With Friends</a>
							</div>
						</div>
					 </div>
				</div>
				<div class="blogdetails-pagination">
				    <ul>
					<?php
						if( $eventPrev != null ){
						?>
							<li>
								<a href="event.php?id=<?php echo $eventPrev->getId(); ?>" class="prev-link"><i class="fas fa-regular fa-arrow-left"></i> Previous Event</a>
								<a href="post.php?id=<?php echo $eventPrev->getId(); ?>"><h3><?php echo $eventPrev->getTitle(); ?></h3> </a>
							</li>
						<?php
						}
						else{
							echo "<li></li>";
						}

						if( $eventNext != null ){
						?>
							<li>
								<a href="post.php?id=<?php echo $eventNext->getId(); ?>" class="next-link">Next Post <i class="fas fa-regular fa-arrow-right"></i> </a>
								<a href="post.php?id=<?php echo $eventNext->getId(); ?>"><h3><?php echo $eventNext->getTitle(); ?></h3> </a>
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