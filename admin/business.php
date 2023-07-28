<?php
include('init.php');

$businessId = 0;
if (isset($_GET['id'])) {
    $businessId = $_GET['id'];
}
$business = $businessController->getById($businessId);
$name = "";
$descriptionShort = "";
$cityId = 0;
$categoryId = 0;
$createdDateTime = "";
$updatedDateTime = "";
$mobile = "";
$password = "";
$status = "";
$userAgents = $userController->getByRole("agent");

if ($business != null) {
    $id = $business->getId();
    $name = $business->getName();
    $descriptionShort = $business->getDescriptionShort();
    $cityId = $business->getCityId();
    $categoryId = $business->getCategoryId();
    $createdDateTime = $business->getCreatedDateTime();
    $updatedDateTime = $business->getUpdatedDateTime();
    $mobile = $business->getMobile();
    $password = $business->getPassword();
    $status = $business->getStatus();
    
}
$cities = $cityController->getAll();
$categories = $categoryController->getAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Business Management | <?php echo $websiteTitle; ?></title>

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
                                    <?php
                                    if ($businessId > 0) {
                                    ?>
                                        Edit Business Information
                                        <a href="business-view.php" class="btn btn-xs btn-danger pull-right"><i class="fas fa-backward fa-fw"></i> Back </a>
                                    <?php
                                    } else {
                                    ?>
                                        Add Business Information
                                        <a href="business-view.php" class="btn btn-xs btn-danger pull-right"><i class="fas fa-backward fa-fw"></i> Back </a>
                                    <?php
                                    }
                                    ?>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <form id="form-1">
                                    <input type="text" id="id" name="id" value="<?php echo $businessId; ?>" class="hidden" readonly />
                                    <div class="row">
                                        <?php
                                        if( $business == null ){
                                        ?>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label> Agents </label>
                                                    <select id="userId" name="userId" class="form-control">
                                                        <option value="0">Select an agent</option>
                                                        <?php
                                                        foreach($userAgents as $userAgent)
                                                        {
                                                        ?>
                                                            <option value="<?php echo $userAgent->getId(); ?> ?>">
                                                                <?php echo $userAgent->getName() . "(PH: " . $userAgent->getMobile(); ?>
                                                            </option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        else{
                                        ?>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label> Business Agent </label>
                                                    <input class="form-control" readonly value="<?php echo $business->getUser()->getName(); ?>" />

                                                    <input class="hidden" id="userId" name="userId" readonly value="<?php echo $business->getUserId(); ?>" />
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                       <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label> Name </label>
                                                <input type="text" id="name" name="name" class="form-control" value="<?php echo $name; ?>" />
                                            </div>
                                       </div>
                                       <div class="col-md-12 col-xs-12">
                                            <div class="form-group">
                                                <label> DescriptionShort </label>
                                                <input type="text" id="descriptionShort" name="descriptionShort" class="form-control" value="<?php echo $descriptionShort; ?>" />
                                            </div>
                                        </div>   
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label>Select City</label>
                                                <select name="cityId" id="cityId" class="form-control select2">
                                                    <option>Select</option>
                                                    <?php
                                                    foreach ($cities as $city) {
                                                        $selected = "";
                                                        if ($city->getId() == $cityId) {
                                                            $selected = "selected";
                                                        }
                                                    ?>
                                                        <option <?php echo $selected; ?> value="<?php echo $city->getId(); ?>"><?php echo $city->getName(); ?></option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label>Select Category</label>
                                                <select name="categoryId" id="categoryId" class="form-control select2">
                                                    <option>Select</option>
                                                    <?php
                                                    foreach ($categories as $category) {
                                                        $selected = "";
                                                        if ($category->getId() == $categoryId) {
                                                            $selected = "selected";
                                                        }
                                                    ?>
                                                        <option <?php echo $selected; ?> value="<?php echo $category->getId(); ?>"><?php echo $category->getName(); ?></option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label> Mobile </label>
                                                <input type="text" id="mobile" name="mobile" class="form-control" autocomplete="off" value="<?php echo $mobile; ?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label> Password </label>
                                                <input type="password" id="password" name="password" class="form-control" autocomplete="off" value="<?php echo $password; ?>" />
                                            </div>
                                        </div>
                                        <?php if ($businessId > 0) { ?>
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
                                        
                                      
                                    </div>
                                    <div class="clearfix"></div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <?php if ($businessId > 0) { ?>
                                                    <button type="submit" class="btn btn-md btn-success">Update</button>
                                                <?php } else { ?>
                                                    <button type="submit" class="btn btn-md btn-success">Add</button>
                                                <?php } ?> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script>
        $(document).ready(function() {
            // form-content
            $("#form-1").on("submit", function(e) {
                e.preventDefault();

                // userId
                value = document.getElementById("userId");
                if (value.selectedIndex == 0) {
                    showAlert("2", "Please select Agent");
                    value = document.getElementById("userId").focus();
                    return false;
                }

                 // name
                 value = document.getElementById("name").value.trim();
                if (value == null || value === "") {
                    showAlert("2", "Please enter name");
                    document.getElementById("name").focus();
                    return false;
                }
                
                
                 // descriptionShort
                 value = document.getElementById("descriptionShort").value.trim();
                if (value == null || value === "") {
                    showAlert("2", "Please enter DescriptionS hort");
                    document.getElementById("descriptionShort").focus();
                    return false;
                }


                // city_id
                value = document.getElementById("cityId");
                if (value.selectedIndex == 0) {
                    showAlert("2", "Please select City");
                    value = document.getElementById("cityId").focus();
                    return false;
                }
                // category_id
                value = document.getElementById("categoryId");
                if (value.selectedIndex == 0) {
                    showAlert("2", "Please select category");
                    value = document.getElementById("categoryId").focus();
                    return false;
                }

                // mobile
                value = document.getElementById("mobile").value.trim();
                if (value == null || value === "") {
                    showAlert("2", "Please enter Mobile");
                    document.getElementById("mobile").focus();
                    return false;
                }

                // password
                value = document.getElementById("password").value.trim();
                if (value == null || value === "") {
                    showAlert("2", "Please enter Password");
                    document.getElementById("password").focus();
                    return false;
                }


                waitingDialog.show("Please wait. Action in progress..!!");
                $.ajax({
                    url: "business-insert.php",
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
                                showAlert("1", "Successful Updated");
                                waitingDialog.hide();
                                window.location = "business.php?id=" + data;
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