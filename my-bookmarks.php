<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("head.php"); ?>
	<title>My Bookmarks | O2in | Business Listing and Booking Management</title>
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
							<h4>My Bookmarks</h4>
						</div>
						<div class="card-body">
							<div class="listing-search">
								<div class="sorting-div">
									<div class="sortbyset">
										<span class="sortbytitle">Filter by</span>
										<div class="sorting-select">
											<select class="form-control select">
												<option>Business</option>
												<option>Posts</option>
												<option>Events</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="table-responsive">
								<table class="listing-table datatable" id="listdata-table">
									<thead>
										<tr>
											<th class="no-sort">Type</th>
											<th>Details</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												ABC Hopsital<br>
												June 10, 2023<br>
												Dr. Santhosh
											</td>
											<td><Span class="views-count">1523AD123D</span></td>
										</tr>
										<tr>
											<td>
												ABC Hopsital<br>
												June 10, 2023<br>
												Dr. Santhosh
											</td>
											<td><Span class="views-count">1523AD123D</span></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="blog-pagination">
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