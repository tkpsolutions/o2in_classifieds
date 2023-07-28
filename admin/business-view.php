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

    <title>Business | <?php echo $websiteTitle; ?></title>

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
                                    List of Business
                                    <a href="business.php" class="btn btn-xs btn-success pull-right"><i class="fas fa-plus-circle fa-fw"></i> Add New Business</a>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table class="table table-bordered app-table data-table">
                                            <thead>
                                                <tr>
                                                    <th>Business ID</th>
                                                    <th>User Name</th>
                                                    <th>Business Name</th>
                                                    <th>City Name</th>
                                                    <th>Category Name</th>
                                                    <th>Mobile</th>
                                                    <th>Action</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $businesses = $businessController->getAll();
                                                foreach ($businesses as $business) {
                                                    $businessId = $business->getId();
                                                    $userName = $business->getUser()->getName();
                                                    $businessName = $business->getName();
                                                    $descriptionShort = $business->getDescriptionShort();
                                                    $cityName = $business->getCity()->getName();
                                                    $categoryName = "-";
                                                    if( $business->getCategory() != null ){
                                                        $categoryName = $business->getCategory()->getName();
                                                    }
                                                    $date = $business->getCreatedDateTime();
                                                    $mobile = $business->getMobile();
                                                    $password = $business->getPassword();
                                                    $status = $business->getStatus();
                                                   

                                                    $businessEditLink = "business.php?id=" . $businessId;
                                                    $businessDetailEditLink = "business-detail.php?id=" . $businessId;
                                                    $businessImageEditLink = "business-images.php?id=" . $businessId;
                                                    $businessContactEditLink = "business-contact-view.php?id=" . $businessId;
                                                    $businessProductEditLink = "business-product-view.php?id=" . $businessId;
                                                    $businessFeedbackEditLink = "business-feedback-view.php?id=" . $businessId;
                                                ?>
                                                    <tr>
                                                        <td><?php echo $businessId; ?></td>
                                                        <td><?php echo $userName; ?></td>
                                                        <td><?php echo $businessName; ?></td>
                                                        <td><?php echo $cityName; ?></td>
                                                        <td><?php echo $categoryName; ?></td>
                                                        <td><?php echo $mobile; ?></td>  
                                                                                                            
                                                        <td>
                                                            <a href="<?php echo $businessEditLink; ?>" class="btn btn-sm btn-info">Edit</a>
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