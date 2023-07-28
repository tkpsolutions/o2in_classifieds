<?php
include('init.php');
$cities = $cityController->getAll();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>City | <?php echo $websiteTitle; ?></title>
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
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel app-panel-1">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    List of Cities
                                    <a href="city.php" class="btn btn-xs btn-success pull-right"><i class="fas fa-plus-circle fa-fw"></i> Add New City</a>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered app-table data-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>State</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($cities as $city) {
                                            $id = $city->getId();
                                            $image = $city->getImage();
                                            $imagePath = "../images/city/" . $id . "." . $image;
                                        ?>
                                            <tr>
                                                <td><?php echo $city->getId(); ?></td>
                                                <td><?php echo $city->getState()->getName(); ?></td>
                                                <td><?php echo $city->getName(); ?></td>
                                                <td><img src="<?php echo $imagePath; ?>" alt="Image" width="50"></td>
                                                <td><?php echo $city->getLat(); ?></td>
                                                <td><?php echo $city->getLng(); ?></td>
                                                <td>
                                                    <a href="city.php?id=<?php echo $city->getId(); ?>" class="btn btn-primary btn-xs">Edit</a>
                                                    </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>

</html>
