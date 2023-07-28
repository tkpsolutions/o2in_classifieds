<?php
include('init.php');

$businessId = 0;
if (isset($_GET['id'])) {
    $businessId = $_GET['id'];
}
$business = $businessController->getById($businessId);

if( $business == null ){
    header("location: business-view.php");
    exit();
}

$id = 0;
$descriptionLong = "";
$addressLine1 = "";
$addressLine2 = "";
$pincode = "";
$lat = $business->getCity()->getLng();
$lng = $business->getCity()->getLat();
$createdDateTime = "";
$updatedDateTime = "";
$status = "";

$logo = "";
$banner = "";
$logoRequired = "required";
$bannerRequired = "required";

$businessDetail = $businessDetailController->getByBusinessId($businessId);
if ($businessDetail != null) {
    $id = $businessDetail->getId();
    //$businessId = $businessDetail->getBusinessId();
    $descriptionLong = $businessDetail->getDescriptionLong();
    $logo = "../images/businesslogo/" . $businessDetail->getId() . "." . $businessDetail->getLogo();
    $banner = "../images/businessbanner/" . $businessDetail->getId() . "." . $businessDetail->getBanner();
    if (is_file($logo)) {
        $logoRequired = "";
    }
    if (is_file($banner)) {
        $bannerRequired = "";
    }
    $addressLine1 = $businessDetail->getAddressLine1();
    $addressLine2 = $businessDetail->getAddressLine2();
    $pincode = $businessDetail->getPincode();
    $lat = $businessDetail->getLat();
    $lng = $businessDetail->getLng();
    if( strlen( trim($lat) ) == 0 ){
        $lat = $business->getCity()->getLng();
        $lng = $business->getCity()->getLat();
    }
    $createdDateTime = $businessDetail->getCreatedDateTime();
    $updatedDateTime = $businessDetail->getUpdatedDateTime();
    $status = $businessDetail->getStatus();
}

$businesses = $businessController->getAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Business Detail | <?php echo $websiteTitle; ?></title>
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
                        <?php include("business-menu.php"); ?>
                        <div class="panel app-panel-1">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    Edit Business Detail - <?php echo $business->getName(); ?>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <form id="form-1" method="post">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="hidden" name="businessId" value="<?php echo $businessId; ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="descriptionLong">Description</label>
                                                <textarea id="descriptionLong" required name="descriptionLong" class="form-control"><?php echo $descriptionLong; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="logo">Logo</label>
                                                <input type="file" <?php echo $logoRequired; ?> id="logo" name="logo" class="form-control">
                                                <?php if ($logo != "") { ?>
                                                    <div>
                                                        <img src="<?php echo $logo; ?>" alt="Logo" width="100" height="100">
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="banner">Banner</label>
                                                <input type="file" <?php echo $bannerRequired; ?> id="banner" name="banner" class="form-control">
                                                <?php if ($banner != "") { ?>
                                                    <div>
                                                        <img src="<?php echo $banner; ?>" alt="Banner" width="100" height="100">
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="addressLine1">Address Line 1</label>
                                                <input type="text" required id="addressLine1" name="addressLine1" class="form-control" value="<?php echo $addressLine1; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="addressLine2">Address Line 2</label>
                                                <input type="text" required id="addressLine2" name="addressLine2" class="form-control" value="<?php echo $addressLine2; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pincode">Pincode</label>
                                                <input type="text" required id="pincode" name="pincode" class="form-control" value="<?php echo $pincode; ?>">
                                            </div>
                                        </div>
                                        <?php if ($businessId > 0) { ?>
                                            <div class="col-md-6 col-xs-12 hidden">
                                                <div class="form-group">
                                                    <label> Status </label>
                                                    <select id="status" name="status" class="form-control">
                                                        <?php if (strcasecmp($status, "Active") == 0) { ?>
                                                            <option value="Active" selected> Active </option>
                                                            <option value="Deactive"> Deactive </option>
                                                        <?php } else { ?>
                                                            <option value="Active"> Active </option>
                                                            <option value="Deactive" selected> Deactive </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="clearfix"></div>


                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="pincode">Pincode</label>
                                                <input type="text" required id="lat" name="lat" class="form-control" readonly value="<?php echo $lat; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="pincode">Pincode</label>
                                                <input type="text" required id="lng" name="lng" class="form-control" readonly value="<?php echo $lng; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <div id="us2" style="width: 100%; height: 400px; border: #000 2px solid"></div>
                                            </div>
                                        </div>

                                        <div class="clearfix"></div>
                                        <div id="somecomponent"></div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <?php if ($businessId > 0) { ?>
                                                    <button type="submit" class="btn btn-md btn-success">Update</button>
                                                <?php } else { ?>
                                                    <button type="submit" class="btn btn-md btn-success">Add</button>
                                                <?php } ?>
                                                <!-- correction for two div -->
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


    <script>
        
    </script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/location-picker@1.1.1/dist/location-picker.min.js"></script>
    <script src="../theme/js/gmap.js"></script>

    <script>

        function loadMap()
        {
            //googleMapPicker(45.5017, -73.5673);
            googleMapPicker(<?php echo $lat; ?>, <?php echo $lng; ?>);
        }

        $(document).ready(function() {
            // Form submission
            $("#form-1").on('submit', function(e) {
                e.preventDefault();

                value = document.getElementById("descriptionLong").value.trim();
                if (value === "") {
                    showAlert("2", "Please enter a description");
                    document.getElementById("descriptionLong").focus();
                    return false;
                }

                value = document.getElementById("addressLine1").value.trim();
                if (value === "") {
                    showAlert("2", "Please enter an Address Line 1");
                    document.getElementById("addressLine1").focus();
                    return false;
                }

                value = document.getElementById("addressLine2").value.trim();
                if (value === "") {
                    showAlert("2", "Please enter an Address Line 2");
                    document.getElementById("addressLine2").focus();
                    return false;
                }

                value = document.getElementById("pincode").value.trim();
                if (value === "") {
                    showAlert("2", "Please enter a Pincode");
                    document.getElementById("pincode").focus();
                    return false;
                }

                waitingDialog.show('Please wait. Action in progress..!!');
                // AJAX request
                $.ajax({
                    url: "business-detail-insert.php",
                    type: "POST",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (isNaN(data)) {
                            showAlert("2", "Error: " + data);
                            waitingDialog.hide();
                        } else {
                            if (data > 0) {
                                showAlert("1", "Successfully inserted");
                                waitingDialog.hide();
                                window.location = "business-detail.php?id=" + data;
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

<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyBpJ-1-6A67HL_x2UzmsBB4NrT8pd-3oLs&callback=loadMap"></script>