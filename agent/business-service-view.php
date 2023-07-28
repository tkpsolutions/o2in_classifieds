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
$businessServiceId = 0;
if (isset($_GET['service_id'])) {
    $businessServiceId = $_GET['service_id'];
}
$businessService = $businessServiceController->getById($businessServiceId);

$name = "";
$price = "";
$discount = "";
$tax = "";
$status ="";

if ($businessService != null) {
    $name = $businessService->getName();
    $price = $businessService->getPrice();
    $tax = $businessService->getTax();
    $discount = $businessService->getDiscount();
        $status = $businessService->getStatus();
    
}

$businessServices = $businessServiceController->getByBusinessId($businessId); 

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Business Services | <?php echo $websiteTitle; ?></title>

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
                                    List of Business Services : <?php echo $business->getName(); ?>
                                    <?php if ($businessServiceId > 0) { ?>
                                        Edit Business Service Information
                                        <a href="business-service-view.php?id=<?php echo $businessId; ?>" class="btn btn-xs btn-danger pull-right"><i class="fas fa-backward fa-fw"></i> Back </a>
                                    <?php } else { ?>
                                        Add Business Service
                                    <?php } ?>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <form id="form-1">
                                        <input type="text" id="id" name="id" value="<?php echo $businessServiceId; ?>" class="hidden" readonly />
                                            <input type="text" id="businessId" name="businessId" value="<?php echo $businessId; ?>" class="hidden" readonly />
                                            <div class="row">
                                                <div class="col-md-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label> Name </label>
                                                        <input type="text" id="name" name="name" class="form-control" autocomplete="off" value="<?php echo $name; ?>" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label> Price </label>
                                                        <input type="number" id="price" name="price" class="form-control" autocomplete="off" value="<?php echo $price; ?>" required />
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label> Tax Percentage </label>
                                                        <input type="number" id="tax" name="tax" class="form-control" autocomplete="off" value="<?php echo $tax; ?>" required />
                                                    </div>
                                                </div>
                                               
                                                <div class="col-md-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label> Discount Percentage </label>
                                                        <input type="number" id="discount" name="discount" class="form-control" autocomplete="off" value="<?php echo $discount; ?>" required />
                                                    </div>
                                                </div>

                                                <?php if ($businessServiceId > 0) { ?>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select id="status" name="status" class="form-control">
                                                        <?php if (strcasecmp($status, "Active") == 0) { ?>
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
                                        
                                                <div class="clearfix"></div>
                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                    <button type="submit" class="btn btn-md btn-success"><?php echo ($businessServiceId > 0) ? 'Update' : 'Add'; ?></button>
                                                  </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="col-md-8 col-sm-12 col-xs-12">
                                        <table class="table table-bordered app-table data-table">
                                            <thead>
                                                <tr>
                                                    <th> Sl.no </th>
                                                    <th> Business </th>
                                                    <th> Name </th>
                                                    <th> Price </th>
                                                    <th> Tax </th>
                                                    <th> Dicount </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($businessServices as $businessService) {
                                                    $businessName = $businessService->getBusiness()->getName();
                                                    $name = $businessService->getName();
                                                    $price = $businessService->getPrice();
                                                    $tax = $businessService->getTax();
                                                    $discount = $businessService->getDiscount();

                                                    $editBusinessService = "business-service-view.php?id=" . $businessId . "&service_id=" . $businessService->getId();
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $businessName; ?></td>
                                                        <td><?php echo $name; ?></td>
                                                        <td><?php echo $price; ?></td>
                                                        <td><?php echo $tax; ?></td>
                                                        <td><?php echo $discount; ?></td>
                                                        <td>
                                                    <a href="<?php echo $editBusinessService; ?>" class="btn btn-sm btn-success"> Edit </a>
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

<script>
    $(document).ready(function() {
        // Form submission
        $("#form-1").on('submit', function(e) {
            e.preventDefault();

            value = document.getElementById("name").value.trim();
            if (value === "") {
                showAlert("2", "Please enter a name");
                document.getElementById("name").focus();
                return false;
            }

            

            waitingDialog.show('Please wait. Action in progress..!!');
            // AJAX request
            $.ajax({
                url: "business-service-insert.php",
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
                            window.location = "business-service-view.php?id=" + data;
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

