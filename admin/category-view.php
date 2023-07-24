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

    <title>Categories | <?php echo $websiteTitle; ?></title>

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
                                    List of Categories
                                    <a href="category.php" class="btn btn-xs btn-success pull-right"><i class="fas fa-plus-circle fa-fw"></i> Add New </a>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table class="table table-bordered app-table data-table">
                                            <thead>
                                                <tr>
                                                    <th> Sl.no </th>
                                                    <th> ID </th>
                                                    <th> Name </th>
                                                    <th> Image </th>
                                                    <th> Booking </th>
                                                    <th> Gallery </th>
                                                    <th> Product </th>
                                                    <th> Ride </th>
                                                    <th> Feedback </th>
                                                    <th> Contact Count </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $categories = $categoryController->getAll();
                                                foreach ($categories as $category) {
                                                    $id = $category->getId();
                                                    $name = $category->getName();
                                                    $image = $category->getImage();
                                                    $isBooking = $category->getIsBooking();
                                                    $isGallery = $category->getIsGallery();
                                                    $isProduct = $category->getIsProduct();
                                                    $isRide = $category->getIsRide();
                                                    $isFeedback = $category->getIsFeedback();
                                                    $contactCount = $category->getContactCount();
                                                    $editCategory = "category.php?id=" . $category->getId();
                                                    $imagePath = "../images/category/images/" . $id . "." . $image;
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $id; ?></td>
                                                        <td><?php echo $name; ?></td>
                                                        <td><img src="<?php echo $imagePath; ?>" alt="Image" width="50"></td>
                                                        <td><?php echo $isBooking; ?></td>
                                                        <td><?php echo $isGallery; ?></td>
                                                        <td><?php echo $isProduct; ?></td>
                                                        <td><?php echo $isRide; ?></td>
                                                        <td><?php echo $isFeedback; ?></td>
                                                        <td><?php echo $contactCount; ?></td>
                                                       
                                                        <td>
                                                            <a href="<?php echo $editCategory; ?>" class="btn btn-sm btn-success"> Edit </a>
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
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

</body>

</html>
