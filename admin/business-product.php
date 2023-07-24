<?php
include('init.php');

$businessproductId = 0;
if (isset($_GET['id'])) {
    $businessproductId = $_GET['id'];
}
$businessproduct = $businessProductController->getById($businessproductId);

$businessId = "";
$name = "";
$price = "";
$discountPercentage = "";
$taxPercentage = "";
$createdDateTime = "";
$updatedDateTime = "";
$status = "";

if ($businessproduct != null) {
    $businessId = $businessproduct->getBusinessId();
    $name = $businessproduct->getName();
    $price = $businessproduct->getPrice();
    $discountPercentage = $businessproduct->getDiscountPercentage();
    $taxPercentage = $businessproduct->getTaxPercentage();
    $createdDateTime = $businessproduct->getCreatedDateTime();
    $updatedDateTime = $businessproduct->getUpdatedDateTime();
    $status = $businessproduct->getStatus();
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

    <title>Business Product Management | <?php echo $websiteTitle; ?></title>

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
                                if ($businessproductId > 0) {
                                    ?>
                                    Edit Business Product Information
                                    <a href="business-product-view.php" class="btn btn-xs btn-danger pull-right"><i
                                                class="fas fa-backward fa-fw"></i> Back </a>
                                    <?php
                                } else {
                                    ?>
                                    Add Business Product Information
                                    <a href="business-product-view.php" class="btn btn-xs btn-danger pull-right"><i
                                                class="fas fa-backward fa-fw"></i> Back </a>
                                    <?php
                                }
                                ?>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <form id="form-1">
                                <input type="text" id="id" name="id" value="<?php echo $businessproductId; ?>" class="hidden"
                                       readonly/>
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label> Business ID </label>
                                            <select id="businessId" name="businessId" class="form-control">
                                                    <option value="">Select Business</option>
                                                    <?php foreach ($businesses as $business) { ?>
                                                        <option value="<?php echo $business->getId(); ?>" <?php if ($businessId == $business->getId()) echo 'selected'; ?>><?php echo $business->getName(); ?></option>
                                                    <?php } ?>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label> Name </label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                   autocomplete="off" value="<?php echo $name; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label> Price </label>
                                            <input type="text" id="price" name="price" class="form-control"
                                                   autocomplete="off" value="<?php echo $price; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label> Discount Percentage </label>
                                            <input type="text" id="discountPercentage" name="discountPercentage"
                                                   class="form-control" autocomplete="off"
                                                   value="<?php echo $discountPercentage; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label> Tax Percentage </label>
                                            <input type="text" id="taxPercentage" name="taxPercentage"
                                                   class="form-control" autocomplete="off"
                                                   value="<?php echo $taxPercentage; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label> Created Date Time </label>
                                            <input type="Datetime-local" id="createdDateTime" name="createdDateTime"
                                                   class="form-control" autocomplete="off"
                                                   value="<?php echo $createdDateTime; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label> Updated Date Time </label>
                                            <input type="Datetime-local" id="updatedDateTime" name="updatedDateTime"
                                                   class="form-control" autocomplete="off"
                                                   value="<?php echo $updatedDateTime; ?>"/>
                                        </div>
                                    </div>
                                    <?php if ($businessproductId > 0) { ?>
                                            <div class="col-md-6 col-xs-12">
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
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <?php
                                            if ($businessproductId > 0) {
                                                ?>
                                                <button type="submit" class="btn btn-md btn-success">Update</button>
                                                <?php
                                            } else {
                                                ?>
                                                <button type="submit" class="btn btn-md btn-success">Add</button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                            </form>
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
<script>
    $(document).ready(function() {
        // Form submission
        $("#form-1").on('submit', function(e) {
            e.preventDefault();

            var value = document.getElementById("businessId");
            if (value.selectedIndex === 0) {
                showAlert("2", "Please select a business");
                value.focus();
                return false;
            }

            value = document.getElementById("name").value.trim();
            if (value === "") {
                showAlert("2", "Please enter a name");
                document.getElementById("name").focus();
                return false;
            }

            value = document.getElementById("price").value.trim();
            if (value === "") {
                showAlert("2", "Please enter a price");
                document.getElementById("price").focus();
                return false;
            }

            value = document.getElementById("discountPercentage").value.trim();
            if (value === "") {
                showAlert("2", "Please enter a discount percentage");
                document.getElementById("discountPercentage").focus();
                return false;
            }

            value = document.getElementById("taxPercentage").value.trim();
            if (value === "") {
                showAlert("2", "Please enter a tax percentage");
                document.getElementById("taxPercentage").focus();
                return false;
            }

            value = document.getElementById("createdDateTime").value.trim();
            if (value === "") {
                showAlert("2", "Please enter a created date and time");
                document.getElementById("createdDateTime").focus();
                return false;
            }

            value = document.getElementById("updatedDateTime").value.trim();
            if (value === "") {
                showAlert("2", "Please enter an updated date and time");
                document.getElementById("updatedDateTime").focus();
                return false;
            }

            waitingDialog.show('Please wait. Action in progress..!!');
            // AJAX request
            $.ajax({
                url: "business-product-insert.php",
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
                            window.location = "business-product-view.php";
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


