<!-- Navigation -->
<nav class="navbar navbar-dark bg-inverse navbar-fixed-top">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header" align="right">
		<button class="navbar-toggler hidden-sm hidden-md hidden-lg pull-xs-right btn" type="button" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			&#9776; Menu
		</button>
		<a class="navbar-brand" href="index.php">
			<img src="<?php echo $websiteLogo; ?>" class="img-responsive" style="padding: 0px 5px" />
		</a>

	</div>



	<ul class="nav navbar-nav top-nav navbar-right">



		<li class="dropdown nav-item ">
			<a href="javascript:;" class="nav-link dropdown-toggle" data-toggle="dropdown">
				<i class="fas fa-user red"></i>
				Hi, <span class="hidden-xs"> <?php echo $loggedUser->getName(); ?> </span>
				<b class="caret"></b>
			</a>
			<ul class="dropdown-menu">
				<li class="dropdown-item">
					<a href="#">Update Profile</a>
				</li>
				<li class="dropdown-item">
					<a href="#">Update Password</a>
				</li>
				<li class="dropdown-item">
					<a href="logout.php">Logout</a>
				</li>
			</ul>
		</li>
		<!--
		<li class="dropdown nav-item">
			<a href="javascript:;" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-gear "></i></a>
			<ul class="dropdown-menu">
				<li class="dropdown-item">
					<a href="#" target="_blank">Mail Configuration</a>
				</li>
				<li class="dropdown-item">
					<a href="#" target="_blank">System Settings</a>
				</li>
			</ul>
		</li>
		-->
	</ul>
	<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
	<div class="collapse navbar-collapse navbar-toggleable-sm navbar-ex1-collapse">
		<ul class="nav navbar-nav side-nav list-group">
			<li class="list-group-item">
				<a href="index.php">
					<i class="fas fa-tachometer-alt fa-fw"></i> Quick Dashboard
				</a>
			</li>

			<li class="list-group-item">
				<a href="business-view.php">
					<i class="fas fa-tachometer-alt fa-fw"></i> Businesses
				</a>
			</li>

			<li>
				<a href="contact-type-view.php">
					<i class="fa-regular fa-address-book"></i> Contact Type
				</a>
			</li>

			<li>
				<a href="category-view.php">
					<i class="fas fa-th"></i> Category
				</a>
			</li>

			<li>
				<a href="tag-view.php">
					<i class="fa-solid fa-tag fa-fw"></i> Tags
				</a>
			</li>

			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-list fa-fw"></i> Posts <span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li><a href="post-category-view.php"> <i class="fas fa-circle fa-fw"></i> List Categories</a></li>
					<li><a href="post-category.php"> <i class="fas fa-circle fa-fw"></i> New Category</a></li>
					<li><a href="post-view.php"> <i class="fas fa-circle fa-fw"></i> List Posts</a></li>
					<li><a href="post.php"> <i class="fas fa-circle fa-fw"></i> New Post</a></li>
				</ul>
			</li>

			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-list-alt fa-fw"></i> Events <span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li><a href="event-category-view.php"> <i class="fas fa-circle fa-fw"></i> List Categories</a></li>
					<li><a href="event-category.php"> <i class="fas fa-circle fa-fw"></i> New Category</a></li>
					<li><a href="event-view.php"> <i class="fas fa-circle fa-fw"></i> List Events</a></li>
					<li><a href="event.php"> <i class="fas fa-circle fa-fw"></i> New Event</a></li>
				</ul>
			</li>

			<li>
				<a href="video-view.php">
					<i class="fab fa-youtube fa-fw"></i> YT Videos
				</a>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-list-alt fa-fw"></i> Host Video <span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li><a href="host-video-view.php"> <i class="fas fa-circle fa-fw"></i> List Host Video</a></li>
					<li><a href="host-video.php"> <i class="fas fa-circle fa-fw"></i> New Host video</a></li>
					
				</ul>
			</li>
		</ul>
	</div>
	<!-- /.navbar-collapse -->
</nav>