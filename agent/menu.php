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
				Hi, <span class="hidden-xs"> <?php echo $loggedAgent->getName(); ?> </span>
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

			

			
			

			

			
		</ul>
	</div>
	<!-- /.navbar-collapse -->
</nav>