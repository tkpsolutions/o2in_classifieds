<!-- Header -->
<header class="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
                <a href="index.php" class="navbar-brand logo">
                    <img src="../assets/img/logo.png" class="img-fluid" alt="Logo" style="width: 100px">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="index.php" class="menu-logo">
                        <img src="../assets/img/logo.png" class="img-fluid" alt="Logo" style="width: 100px">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);"> <i class="fas fa-times"></i></a>
                </div>
				
				<ul class="main-nav">
					<?php
					if($loggedBusiness != null)
					{
						?>
						<li>
							<a href="index.php">Dashboard <i class="fas fa-home"></i></a>
						</li>
						<li>
							<a href="my-timings.php">Timings <i class="fas fa-tag"></i></a>
						</li>
						<li>
							<a href="my-gallery.php">Gallery <i class="fas fa-image"></i></a>
						</li>
						<li class="has-submenu">
							<a href="">Bookings <i class="fas fa-calendar"></i></a>
							<ul class="submenu">
								<li><a href="my-token.php">Create Single Tokens</a></li>
								<li><a href="my-token-bulk.php">Create Bulk Tokens</a></li>
								<li><a href="my-tokens.php">Filter Tokens</a></li>
							</ul>
						</li>
						<li>
							<a href="my-catalogue.php">Catalogue <i class="fas fa-th"></i></a>
						</li>
						<li>
							<a href="my-service.php">Service <i class="fas fa-check-square"></i></a>
						</li>
						<li class="has-submenu">
							<a href="">Business <i class="fas fa-chevron-down"></i></a>
							<ul class="submenu">
								<li><a href="my-tag.php">Tags</a></li>
								<li><a href="my-contact.php">Contacts</a></li>
								<li><a href="my-feedback.php">Feedback</a></li>
							</ul>
						</li>
						<li class="has-submenu">
							<a href="">My Profile <i class="fas fa-chevron-down"></i></a>
							<ul class="submenu">
								<li><a href="my-profile.php">My Profile Details</a></li>
								<li><a href="my-profile-image.php">Edit Profile Images</a></li>
								<li><a href="change-password.php">Update Password</a></li>
							</ul>
						</li>
						<li class="has-submenu">
							<a href="#" class="business-name">Hi, .. <?php echo substr($loggedBusiness->getName(), 0, 10); ?> <i class="fas fa-chevron-down"></i></a>
							<ul class="submenu">
								<li><a href="logout.php" onclick="return confirm('Are you sure you want to logout?')">Logout</a></li>
							</ul>
						</li>
						<?php
					}
					?>
				</ul>
            </div>
            <ul class="nav header-navbar-rht">
				<?php
				if($loggedBusiness == null)
				{
				?>
					<li class="nav-item">
						<a class="nav-link header-login" href="login.php"> Sign In</a>
					</li>
					<li class="nav-item">
						<a class="nav-link header-login add-listing" href="register.php"><i class="fa-solid fa-plus"></i> Create Free Account</a>
					</li>
				<?php
				}
				?>
            </ul>
        </nav>
    </div>
</header>
<!-- /Header -->