<?php
// businessToken.php

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

$fromDate = date("Y-m-d");
$toDate = date("Y-m-d");
$cityId = 0;
$businessServiceId = 0;

$businessServices = $businessServiceController->getByBusinessId($businessId);
$cities = $cityController->getAll();

if( isset($_GET['fromDate']) ){
    $fromDate = $_GET['fromDate'];
}
if( isset($_GET['toDate']) ){
    $toDate = $_GET['toDate'];
}
if( isset($_GET['cityId']) ){
    $cityId = $_GET['cityId'];
}
if( isset($_GET['businessServiceId']) ){
    $businessServiceId = $_GET['businessServiceId'];
}


//$businessTokens = $businessTokenController->getByBusinessId($businessId);
$businessTokens = $businessTokenController->search($businessId, $fromDate, $toDate, $cityId, $businessServiceId);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Business Timings | <?php echo $websiteTitle; ?></title>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php include('head.php'); ?>

</head>

<body>

    <!-- ... Previous Code ... -->

    <div id="wrapper">

        <?php include('menu.php'); ?>

        <div id="page-wrapper">

            <div class="admin-panel-content">
                <div class="row">
                    <div class="col-xs-12">
                        <?php include("business-menu.php"); ?>
                        <div class="panel app-panel-1">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    List of Business Timings : <?php echo $business->getName(); ?>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <form action="business-tokens.php" method="GET">
                                        <input type="text" value="<?php echo $businessId; ?>" name="id" class="hidden" />
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="date" value="<?php echo $fromDate; ?>" name="fromDate" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="date" value="<?php echo $toDate; ?>" name="toDate" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="cityId" class="form-control">
                                                    <option value="0">All Cities</option>
                                                    <?php
                                                    foreach ($cities as $city) {
                                                        $selected = "";
                                                        if( $city->getId() == $cityId ){
                                                            $selected = "selected";
                                                        }
                                                    ?>
                                                        <option <?php echo $selected; ?> value="<?php echo $city->getId(); ?>">
                                                            <?php echo $city->getName(); ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="businessServiceId" class="form-control">
                                                    <option value="0">All Services</option>
                                                    <?php
                                                    foreach ($businessServices as $businessService) {
                                                        $selected = "";
                                                        if( $businessService->getId() == $businessServiceId ){
                                                            $selected = "selected";
                                                        }
                                                    ?>
                                                        <option <?php echo $selected; ?> value="<?php echo $businessService->getId(); ?>">
                                                            <?php echo $businessService->getName(); ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success"> Search Tokens </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <hr>
                                        <table class="table table-bordered app-table data-table">
                                            <thead>
                                                <tr>
                                                    <th>Sl.no.</th>
                                                    <th> Business Service </th>
                                                    <th> City</th>
                                                    <th> Token Date </th>
                                                    <th> From Time </th>
                                                    <th> To Time </th>
                                                    <th> Duration(In Mins)</th>

                                                    <!-- <th> Action </th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($businessTokens as $businessToken) { ?>
                                                    <tr>
                                                        <td> <?php echo $i++; ?> </td>
                                                        <td><?php echo $businessToken->getBusinessService()->getName(); ?></td>
                                                        <td><?php echo $businessToken->getCity()->getName(); ?></td>
                                                        <td><?php echo $businessToken->getTokenDate(); ?></td>
                                                        <td><?php echo $businessToken->getFromTime(); ?></td>
                                                        <td><?php echo $businessToken->getToTime(); ?></td>
                                                        <td><?php echo $businessToken->getDuration(); ?></td>

                                                        <!-- <td>
                                                            <a href="<?php echo "business-token.php?id=" . $businessId; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                                                        </td> -->

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
        </div>
    </div>


    <?php include('footer.php'); ?>
</body>

</html>