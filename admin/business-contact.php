<?php
include('init.php');

$businesscontactId = 0;
if (isset($_GET['id'])) {
    $businesscontactId = $_GET['id'];
}
$businessContact =$businessContactTypeController->getById($businesscontactId);

$businessId = 0;
$contactTypeId = 0;
$contact = "";
$createdDateTime = "";
$updatedDateTime = "";
$status = "";

if ($businessContact != null) {
    $businessId = $businessContact->getBusinessId();
    $contactTypeId = $businessContact->getContactTypeId();
    $contact = $businessContact->getContact();
    $createdDateTime = $businessContact->getCreatedDateTime();
    $updatedDateTime = $businessContact->getUpdatedDateTime();
    $status = $businessContact->getStatus();
}
$businesses = $businessController->getAll();
$contactTypes = $contactTypeController->getAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Business Contact Management | <?php echo $websiteTitle; ?></title>

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
                                    <?php if ($businesscontactId > 0) { ?>
                                        Edit Business Contact Information
                                        <a href="business-contact-view.php" class="btn btn-xs btn-danger pull-right"><i class="fas fa-backward fa-fw"></i> Back </a>
                                    <?php } else { ?>
                                        Add Business Contact Information
                                        <a href="business-contact-view.php" class="btn btn-xs btn-danger pull-right"><i class="fas fa-backward fa-fw"></i> Back </a>
                                    <?php } ?>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <form id="form-1">
                                    <input type="text" id="id" name="id" value="<?php echo $businesscontactId; ?>" class="hidden" readonly />
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label>Business ID</label>
                                                <select name="business_id" id="business_id" class="form-control select2">
                                                    <option> Select </option>
                                                    <?php foreach ($businesses as $business) {
                                                        $selected = ($business->getId() == $businessId) ? "selected" : "";
                                                        ?>
                                                        <option value="<?php echo $business->getId(); ?>" <?php echo $selected; ?>><?php echo $business->getName(); ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label>Select Contact Type</label>
                                                <select name="contact_type_id" id="contact_type_id" class="form-control select2">
                                                    <option> Select </option>
                                                    <?php
                                                    foreach ($contactTypes as $contactType) {
                                                        $selected = "";
                                                        if ($contactType->getId() == $contactTypeId) {
                                                            $selected = "selected";
                                                        }
                                                    ?>
                                                        <option <?php echo $selected; ?> value="<?php echo $contactType->getId(); ?>"><?php echo $contactType->getName(); ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label>Contact</label>
                                                <input type="text" id="contact" name="contact" class="form-control" autocomplete="off" value="<?php echo $contact; ?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label>Created Date Time</label>
                                                <input type="DateTime-local" class="form-control" id="createdDateTime" name="createdDateTime" placeholder="Created Date and Time" value="<?php echo $createdDateTime; ?>" >
                                           </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label>Updated Date Time</label>
                                                <input type="DateTime-local" class="form-control" id="updatedDateTime" name="updatedDateTime" placeholder="Updated Date and Time" value="<?php echo $updatedDateTime; ?>" >
                                            </div>
                                        </div>
                                        <?php if ($businesscontactId > 0) { ?>
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
                                    </div>

                                    <div class="clearfix"></div>
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <?php if ($businesscontactId > 0) { ?>
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
        <!-- /.admin-panel-content -->

        <?php include('footer.php'); ?>

    </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

</body>

</html>

<script>
    $(document).ready(function(e) {
        //form-content
        $("#form-1").on('submit', (function(e) {
            e.preventDefault();

            value = document.getElementById("business_id");
            
            if (value.selectedIndex == 0) {
                showAlert("2", "Please select Business");
                value = document.getElementById("business_id").focus();
                return false;
            }

            value = document.getElementById("contact_type_id");
          
            if (value.selectedIndex == 0) {
                showAlert("2", "Please select contact type");
                value = document.getElementById("contact_type_id").focus();
                return false;
            }

            //contact
            value = document.getElementById("contact").value.trim();
            if (value == null || value == "") {
                showAlert("2", "Please enter contact");
                document.getElementById("contact").focus();
                return false;
            }

            waitingDialog.show('Please wait. Action in progress..!!');
            $.ajax({
                url: "business-contact-insert.php",
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
                            showAlert("1", "Successful update");
                            waitingDialog.hide();
                            window.location = "business-contact-view.php";
                        } else {
                            showAlert("2", "Error: " + data);
                            waitingDialog.hide();
                        }
                    }
                },
                error: function() {
                    showAlert("2", "Oops! Something went wrong. Please try again later.");
                    waitingDialog.hide();
                }
            });

        }));

    });
</script>