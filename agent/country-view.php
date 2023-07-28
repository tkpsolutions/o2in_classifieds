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

    <title>Countries | <?php echo $websiteTitle; ?></title>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the country via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

	<?php include('head.php'); ?>
		
    </head>

    <body>

        <div id="wrapper">

            <?php include('menu.php'); ?>
			
            <div id="country-wrapper">

                <div class="admin-panel-content">
					<div class="row">
						<div class="col-xs-12">
							<div class="panel app-panel-1">
								<div class="panel-heading">
									<h3 class="panel-title">
										List of Countries
										<a href="country.php" class="btn btn-xs btn-success pull-right"><i class="fas fa-plus-circle fa-fw"></i> Add New </a>
									</h3>
								</div>
								<div class="panel-body">									
									<div class="row">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<table class="table table-bordered app-table data-table">
												<thead>
													<tr>
														<th> Sl.no </th>
														<th> Name </th>
														<th> Status </th>
														<th> Action </th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													$countrys = $countryController->select();
													foreach($countrys as $country)
													{
														$name = $country->getName();														
														$status = $country->getStatus();
														
														$editCountry = "country.php?id=".$country->getId();
													?>
													<tr>
														<td><?php echo $i++; ?></td>
														<td><?php echo $name; ?></td>
														<td><?php echo $status; ?></td>
														<td>
															<a href="<?php echo $editCountry; ?>" class="btn btn-sm btn-success"> Edit </a>
														</td>
													</tr>
													<?php
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
                </div>
                <!-- /.admin-panel-content -->

				<?php include('footer.php'); ?>

            </div>
            <!-- /#country-wrapper -->

        </div>
        <!-- /#wrapper -->

    </body>

</html>