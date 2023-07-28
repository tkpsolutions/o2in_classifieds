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

// Retrieve business images
$businessImages = $businessImageController->getByBusinessId($businessId);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Business Images | <?php echo $websiteTitle; ?></title>
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
                                <h3 class="panel-title">List of Business Images - <?php echo $business->getName(); ?></h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <form id="form-1">
                                            <input type="text" id="business_id" name="business_id" value="<?php echo $businessId; ?>" class="hidden" readonly />
                                            <div class="row">
                                                <div class="col-md-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label> Image </label>
                                                        <input type="file" required id="image" name="image" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label> Caption </label>
                                                        <input type="text" id="caption" name="caption" class="form-control" autocomplete="off" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="clearfix"></div>
                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-md btn-success">Add New Image</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-8 col-sm-12 col-xs-12">
                                        <table class="table table-bordered app-table data-table">
                                            <thead>
                                                <tr>
                                                    <th>Sl.no</th>
                                                    <th>Image</th>
                                                    <th>Caption</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($businessImages as $businessImage) {
                                                    $id = $businessImage->getId();
                                                    $image = $businessImage->getImage();
                                                    $caption = $businessImage->getCaption();
                                                    $deleteImage = "business-image-delete.php?id=" . $businessImage->getId(). "&bid=" . $businessId;
                                                    $imagePath = "../images/businessimage/" . $id . "." . $image;
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><img src="<?php echo $imagePath; ?>" alt="Image" width="50"></td>
                                                        <td><?php echo $caption; ?></td>

                                                        <td>
                                                        <a href="<?php echo $deleteImage; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
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
    $(document).ready(function(e) {
    $("#form-1").on('submit', function(e) {
        e.preventDefault();

        value = document.getElementById("business_id");
        if (value.selectedIndex === 0) {
            showAlert("2", "Please select Business");
            businessId.focus();
            return false;
        }

        value = document.getElementById("caption").value.trim();
        if ( value == null ||  value == "") {
            showAlert("2", "Please enter caption");
            document.getElementById("caption").focus();
            return false;
        }

        // Perform AJAX request
        waitingDialog.show('Please wait. Action in progress..!!');
        $.ajax({
            url: "business-image-insert.php",
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
                        window.location = "business-images.php?id=" + data;
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