<?php
include('init.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome Page | <?php echo $websiteTitle; ?></title>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

	<?php include('head.php'); ?>
		
    </head>

    <body>

        <div id="wrapper">

            <?php include('menu.php'); ?>
			
            <div id="page-wrapper">

                <div class="admin-panel-content">
					<div class="row">
						<div class="col-xs-12">
							<div class="panel app-panel-1">
								
                                <div class="panel-heading">
									<h3 class="panel-title">
										Quick Dashboard
									</h3>
								</div>

								<div class="panel-body">
									<div class="dashboard-information">
										<div class="row">
                                            <div class="col-md-3 col-sm-6 col-xs-12">
												<div class="dashboard-information-tile type-1">
													<label>User Customers : </label>
													<p>
														100
													</p>
												</div>
											</div>
											<div class="col-md-3 col-sm-6 col-xs-12">
												<div class="dashboard-information-tile type-1">
													<label>User Agents : </label>
													<p>
														100
													</p>
												</div>
											</div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
												<div class="dashboard-information-tile type-3">
													<label>Business Members : </label>
													<p>
														100
													</p>
												</div>
											</div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
												<div class="dashboard-information-tile type-2">
													<label>Locations : </label>
													<p>
														100
													</p>
												</div>
											</div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
												<div class="dashboard-information-tile type-4">
													<label>Categories : </label>
													<p>
														100
													</p>
												</div>
											</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /#wrapper -->

    </body>

</html>