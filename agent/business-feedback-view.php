<?php
include('init.php');
$businessId = 0;
if (isset($_GET['id'])) {
    $businessId = $_GET['id'];
}
$business = $businessController->getById($businessId);
if ($business == null) {
    header("location: business-view.php");
    exit();
}

$businessFeedbacks = $businessFeedbackController->getByBusinessId($businessId);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BusinessFeedback | <?php echo $websiteTitle; ?></title>

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
                                    List of Business Feedback : <?php echo $business->getName(); ?>                                    
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table class="table table-bordered app-table data-table">
                                            <thead>
                                                <tr>
                                                    <th>user Name</th>
                                                    <th>star Count</th>
                                                    <th>Message</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($businessFeedbacks as $businessFeddback) {
                                                    $businessFeedbackId = $businessFeddback->getId();
                                                    $userName = $businessFeddback->getUserId();
                                                    $starCount = $businessFeddback->getStarCount();
                                                    $message = $businessFeddback->getMessage();
                                                    $createdDateTime = $businessFeddback->getCreatedDateTime();
                                                    $updatedDateTime = $businessFeddback->getUpdatedDateTime();
                                                    $status = $businessFeddback->getStatus();
                                                    $deleteBusinessFeedback = "business-feedback-delete.php?id=" . $businessFeedbackId ."&businessId=". $businessId;                                                   
                                                ?>
                                                    <tr>
                                                        <td><?php echo $userName; ?></td>
                                                        <td><?php echo $starCount; ?></td>
                                                        <td><?php echo $message; ?></td>
                                                        <td>
                                                            <a href="<?php echo $deleteBusinessFeedback; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?')"> Delete </a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $i++;
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