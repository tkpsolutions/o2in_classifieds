<?php
include('init.php');
$users = $userController->getAll(null);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Uers List | <?php echo $websiteTitle; ?></title>

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
										Item Master
									</h3>
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-xs-12">
											<table class="table table-bordered app-table data-table">
												<thead>
													<tr>
														<th> Name </th>
														<th> Email </th>
														<th> Mobile </th>
														<th> Whatsapp </th>
													</tr>
												</thead>
												<tbody>
													<?php
													foreach($users as $user){
													?>
														<tr>
															<td><?php echo $user->getName(); ?></td>
															<td><?php echo $user->getEmail(); ?></td>
															<td><?php echo $user->getMobile(); ?></td>
															<td><?php echo $user->getWhatsappNo(); ?></td>
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
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

    </body>

</html>