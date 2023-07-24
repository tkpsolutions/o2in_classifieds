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
                <a href="#" class="navbar-brand logo">
                    <img src="assets/img/logo.png" class="img-fluid" alt="Logo" style="width: 100px">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="index.php" class="menu-logo">
                        <img src="assets/img/logo.png" class="img-fluid" alt="Logo" style="width: 100px">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);"> <i class="fas fa-times"></i></a>
                </div>
                <ul class="main-nav">
                    <li>
                        <a href="index.php">Home <i class="fas fa-home"></i></a>
                    </li>
                    <li>
                        <a href="events.php">Events <i class="fas fa-calendar"></i></a>
                    </li>
                    <li>
                        <a href="blog.php">Posts <i class="fas fa-th"></i></a>
                    <li>
                    <?php
                    if( isset($loggedUser) && $loggedUser != null ){
                    ?>
                        <li>
                            <a href="my-bookings.php">Bookings <i class="fas fa-calendar-alt"></i></a>
                        </li>
                        <li>
                            <a href="my-profile.php">My Profile <i class="fas fa-user"></i></a>
                        </li>
                        <li>
                            <a href="my-wallet.php">My Wallet <i class="fas fa-wallet"></i></a>
                        </li>
                        <li>
                            <a href="logout.php">Logout <i class="fas fa-sign-out-alt"></i></a>
                        </li>
                    <?php
                    }
                    ?>
                    <?php
                    if( !isset($loggedUser) || $loggedUser == null ){
                    ?>
                            <li class="nav-item d-md-none d-lg-none">
                                <a class="nav-link header-login" href="login.php"><i class="fa-solid fa-sign-in-alt"></i> Sign In</a>
                            </li>
                            <li class="nav-item d-md-none d-lg-none">
                                <a class="nav-link header-login add-listing" href="register.php"><i class="fa-solid fa-plus"></i> Create Free Account</a>
                            </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <?php
            if( !isset($loggedUser) || $loggedUser == null ){
            ?>
                <ul class="nav header-navbar-rht">
                    <li class="nav-item">
                        <a class="nav-link header-login" href="login.php"> Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link header-login add-listing" href="register.php"><i class="fa-solid fa-plus"></i> Create Free Account</a>
                    </li>
                </ul>
            <?php
            }
            ?>
        </nav>
    </div>
</header>
<!-- /Header -->