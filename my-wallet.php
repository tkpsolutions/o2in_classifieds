<?php
include("init.php");
$wallets = $walletController->getByUserId($loggedUser->getId());
$totalDeposit = 0;
$totalUsed = 0;
foreach($wallets as $wallet){
	$totalDeposit = $totalDeposit + $wallet->getDeposit();
	$totalUsed = $totalUsed + $wallet->getUsed();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("head.php"); ?>
	<title>My Wallet | O2in | Business Listing and Booking Management</title>
</head>

<body>


	<div class="main-wrapper innerpagebg">

		<?php include("menu.php"); ?>

		<!-- Dashboard Content -->
		<div class="dashboard-content">
			<div class="container">
				<div class="dash-listingcontent dashboard-info">
					<div class="dash-cards card">
						<div class="card-header">
							<h4>My Wallet</h4>
						</div>
						<div class="card-body">
							<h5>Total deposited : <?php echo $totalDeposit; ?> </h5>
							<h5>Total used : <?php echo $totalUsed; ?> </h5>
							<h5>Balance : <?php echo $totalDeposit - $totalUsed; ?> </h5>
							<div class="profile-form">
								<form method="GET" action="my-wallet-rp-deposit.php">
									<div class="row">
										<div class="col-md-4 col-sm-6 col-12">
											<div class="form-group">
												<input type="number" class="form-control" value="" required id="amount" name="amount" placeholder="Enter Amount">
											</div>
										</div>
										<div class="col-md-4 col-sm-6 col-12">
											<button type="submit" class="btn btn-success btn-lg">Add To Wallet</button>
										</div>
									</div>
								</form>
							</div>
							<hr>
							<div class="listing-search d-none">
								<div class="sorting-div">
									<div class="sortbyset">
										<span class="sortbytitle">Sort by</span>
										<div class="sorting-select">
											<select class="form-control select">
												<option>Newest</option>
												<option>Oldest</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="table-responsive">
								<table class="listing-table datatable" id="listdata-table">
									<thead>
										<tr>
											<th class="no-sort">Details</th>
											<th>Deposit</th>
											<th>Used</th>
											<th class="no-sort">Ref Id</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($wallets as $wallet) {
										?>
											<tr>
												<td><?php echo $wallet->getActionDateTime(); ?></td>
												<td><?php echo $wallet->getDeposit(); ?></td>
												<td><?php echo $wallet->getUsed(); ?></td>
												<td><?php echo $wallet->getReference(); ?></td>
											</tr>
										<?php
										}
										?>
									</tbody>
								</table>
							</div>
							<div class="blog-pagination d-none">
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
												</ul>
											</div>
										</li>
										<li class="page-item nextlink">
											<a class="page-link" href="#">Next <i class="fas fa-regular fa-arrow-right"></i></a>
										</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Dashboard Content -->

		<?php include("footer.php"); ?>

</body>

</html>