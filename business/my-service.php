<?php
include("init.php");

if (!isset($_SESSION['login_business_id'])) {
    header("Location: logged-user-detail.php");
    exit();
}

$business = $businessController->getById($loggedBusiness->getId());

if ($business == null) {
    echo "Error: Failed to fetch business profile.";
    exit();
}

$businessServices = $businessServiceController->getByBusinessId($loggedBusiness->getId());
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php include("head.php"); ?>
    <title>O2in | Business Listing and Booking Management</title>
</head>

<body>
    <div class="main-wrapper">
        <?php include("menu.php"); ?>
        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-12">
                        <div class="profile-sidebar">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Add Business Services</h4>
                                </div>
                                <div class="card-body">
                                    <form id="form-1">
                                        <div class="form-group" style="display: none;">
                                            <label class="col-form-label">BusinessId</label>
                                            <div class="pass-group group-img">
                                                <input type="text" id="businessId" name="businessId" value="<?php echo $business->getId(); ?>" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Name</label>
                                            <div class="pass-group group-img">
                                                <input type="text" id="name" name="name" class="form-control pass-input" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Price</label>
                                            <div class="pass-group group-img">
                                                <input type="number" id="price" name="price" class="form-control pass-input" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Tax (%)</label>

                                            <div class="pass-group group-img">
                                                <input type="number" id="tax" name="tax" class="form-control pass-input" autocomplete="off" />
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-form-label">Discount (%)</label>
                                            <div class="pass-group group-img">
                                                <input type="number" id="discount" name="discount" class="form-control pass-input" autocomplete="off" />
                                            </div>
                                        </div>

                                        <button class="btn btn-primary" type="submit"> Add Services</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md8 col-sm-8 col-xs-12">
                        <div class="table-responsive">
                            <table class="listing-table datatable" id="listdata-table">
                                <thead>
                                    <tr>
                                        <th> Sl.no </th>
                                        <th> Name </th>
                                        <th> Price </th>
                                        <th> Tax </th>
                                        <th> Discount </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
									$i = 1;
									foreach ($businessServices as $businessService) 
									{
                                        $id = $businessService->getId();
										
										$deleteService = "my-service-delete.php?id=" . $id;
                                    ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $businessService->getName(); ?></td>
                                            <td><?php echo $businessService->getPrice(); ?></td>
                                            <td><?php echo $businessService->getTax(); ?></td>
                                            <td><?php echo $businessService->getDiscount(); ?></td>
                                            <td>
                                            <a href="<?php echo $deleteService; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
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
            <!-- /Dashboard Content -->
            <?php include("footer.php"); ?>
        </div>
        </div>
        <script>
            $(document).ready(function() {
                // Form submission
                $("#form-1").on('submit', function(e) {
                    e.preventDefault();


                    value = document.getElementById("name").value.trim();
                    if (value === "") {
                        alert("Please enter a name");
                        document.getElementById("name").focus();
                        return false;
                    }

                    value = document.getElementById("price").value.trim();
                    if (value === "") {
                        alert("Please enter a price");
                        document.getElementById("price").focus();
                        return false;
                    }

                    value = document.getElementById("tax").value.trim();
                    if (value === "") {
                        alert("Please enter a tax percentage");
                        document.getElementById("tax").focus();
                        return false;
                    }

                    value = document.getElementById("discount").value.trim();
                    if (value === "") {
                        alert("Please enter a discount percentage");
                        document.getElementById("discount").focus();
                        return false;
                    }

                   

                   

                    //waitingDialog.show('Please wait. Action in progress..!!');
                    // AJAX request
                    $.ajax({
                url: "my-service-insert.php",
                type: "POST",
                contentType: false,
                cache: false,
                processData: false,
                data: new FormData(this),
                success: function(data) {
                    if (isNaN(data)) {
                        alert("Error: " + data);
                        //  waitingDialog.hide();
                    } else {
                        if (data > 0) {
                            alert("Services added successfully");
                            //waitingDialog.hide();
                            window.location = "my-service.php";
                        } else {
                            alert("Error: " + data);
                            // waitingDialog.hide();
                        }
                    }
                },
                error: function() {
                    alert("2", "Oops something went wrong. Please try later.");
                    //  waitingDialog.hide();
                }
            });
        });
    });
</script>