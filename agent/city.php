<?php
include('init.php');

$id = 0;
$stateId = 0;
$name = "";
$image = "";
$lat = "";
$lng = "";
$status = "";
$imageRequired = "required";
if (isset($_GET['id'])) {
    $cityId = $_GET['id'];
    $city = $cityController->getById($cityId);

    if ($city != null) {
        $id = $city->getId();
        $stateId = $city->getStateId();
        $name = $city->getName();
        $image = "../images/city/" . $city->getId() . "." . $city->getImage();
        if (is_file($image)) {
            $imageRequired = "";
        }
        $lat = $city->getLat();
        $lng = $city->getLng();
        $status = $city->getStatus();
    }
}

$cities = $cityController->getAll();
$states = $stateController->getAll('active');
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

                <div class="col-xs-12">
                     
                        <div class="panel app-panel-1">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <?php
                                    if ($id > 0) {
                                    ?>
                                        Edit City Information

                                        <a href="city-view.php" class="btn btn-xs btn-danger pull-right"><i class="fas fa-backward fa-fw"></i> Back </a>
                                    <?php
                                    } else {
                                    ?>
                                        Add City Information
                                        <a href="city-view.php" class="btn btn-xs btn-danger pull-right"><i class="fas fa-backward fa-fw"></i> Back </a>
                                    <?php
                                    }
                                    ?>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <form id="city-form" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label>Select State</label>
                                                <select name="stateId" id="stateId" class="form-control select2">
                                                    <option value="0">Select</option>
                                                    <?php
                                                    
                                                    foreach ($states as $state) {
                                                        $selected = ($state->getId() == $stateId) ? "selected" : "";
                                                        echo '<option value="' . $state->getId() . '" ' . $selected . '>' . $state->getName() . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="name">City Name</label>
                                                <input type="text" id="name" name="name" class="form-control" value="<?php echo $name; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> Image </label>
                                                <input <?php echo $imageRequired; ?> type="file" id="image" name="image" class="form-control" />
                                                <?php
                                                if( is_file($image) ){
                                                ?>
                                                    <img src="<?php echo $image; ?>" style="width: 100px; height: 100px" />
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                         <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="lat">Latitude</label>
                                                <input type="text" id="lat" name="lat" class="form-control" value="<?php echo $lat; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="lng">Longitude</label>
                                                <input type="text" id="lng" name="lng" class="form-control" value="<?php echo $lng; ?>">
                                            </div>
                                        </div>
                                        <?php if ($id > 0) { ?>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select id="status" name="status" class="form-control">
                                                        <?php if (strcasecmp($status, "active") == 0) { ?>
                                                            <option value="Active" selected>Active</option>
                                                            <option value="Deactive">Deactive</option>
                                                        <?php } else { ?>
                                                            <option value="Active">Active</option>
                                                            <option value="Deactive" selected>Deactive</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?php if ($id > 0) { ?>
                                                    <button type="submit" class="btn btn-md btn-success">Update</button>
                                                <?php } else { ?>
                                                    <button type="submit" class="btn btn-md btn-success">Add</button>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
    <script>
        $(document).ready(function() {
            $("#city-form").on('submit', function(e) {
                e.preventDefault();

                var value = document.getElementById("stateId");
                if (value.selectedIndex === 0) {
                    showAlert("2", "Please select State");
                    stateId.focus();
                    return false;
                }

                value = document.getElementById("name").value.trim();
                if (value === "") {
                    showAlert("2", "Please enter City Name");
                    document.getElementById("name").focus();
                    return false;
                }

                value = document.getElementById("lat").value.trim();
                if (value === "") {
                    showAlert("2", "Please enter Latitude");
                    document.getElementById("lat").focus();
                    return false;
                }

                value = document.getElementById("lng").value.trim();
                if (value === "") {
                    showAlert("2", "Please enter Longitude");
                    document.getElementById("lng").focus();
                    return false;
                }

                // Perform AJAX request
                waitingDialog.show('Please wait. Action in progress..!!');
                $.ajax({
                    url: "city-insert.php",
                    type: "POST",
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: new FormData(this),
                    success: function(data) {
                        if (isNaN(data)) {
                            showAlert("2", "Error: " + data);
                            waitingDialog.hide();
                        } else {
                            if (data > 0) {
                                showAlert("1", "Successful Inserted");
                                waitingDialog.hide();
                                window.location = "city-view.php?id=" + data;
                            } else {
                                showAlert("2", "Error: " + data);
                                waitingDialog.hide();
                            }
                        }
                    },
                    error: function() {
                        showAlert("2", "Oops something went wrong. Please try later.");
                        waitingDialog.hide();
                    }
                });
            });
        });
    </script>

</body>

</html>
