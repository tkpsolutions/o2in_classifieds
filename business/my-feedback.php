<?php
include('init.php');

if (!isset($_SESSION['login_business_id'])) {
    header("Location: logged-user-detail.php");
    exit();
}

$business = $businessController->getById($loggedBusiness->getId());

if ($business == null) {
    echo "Error: Failed to fetch business profile.";
    exit();
}

$businessFeedbacks = $businessFeedbackController->getByBusinessId($loggedBusiness->getId());
$users = $userController->getAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("head.php"); ?>
	<title>O2in | Business Listing and Booking Management</title>
</head>

<body>


	<div class="main-wrapper">

		<?php include("menu.php"); ?>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <div class="container">
                <div class="row">
                <div class="col-md-2 col-sm-4 col-12">
                        <div class="profile-sidebar">
                            
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-8 col-xs-12">
                        <div class="table-responsive">
                            <table class="listing-table datatable">
                                <thead>
                                    <tr>
                                        <th>Sl.no</th>
                                        <th>UserName</th>
                                        <th>StarCount</th>
                                        <th>Feedback Date & Time</th>
                                        <th>Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($businessFeedbacks as $businessFeedback) 
									{
                                        $id = $businessFeedback->getId();
                                        $userName = $businessFeedback->getUser()->getName();
                                        $starCount = $businessFeedback->getStarCount();
                                        $message = $businessFeedback->getMessage(); 
										$createdDateTime = $businessFeedback->getCreatedDateTime();
                                        
                                    ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $userName; ?></td>
											<td><?php echo $starCount; ?></td>
											<td><?php echo $createdDateTime; ?></td>
											<td><?php echo $message; ?></td>
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
            <!-- /Dashboard Content -->

            <?php include("footer.php"); ?>

        </div>
</body>

</html>

