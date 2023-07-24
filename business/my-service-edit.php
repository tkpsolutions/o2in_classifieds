<?php
include('init.php');

$businessServiceId = 0;
if (isset($_GET['id'])) {
    $businessServiceId = $_GET['id'];
}
$businessService = $businessServiceController->getById($businessServiceId);

$businessId = "";
$name = "";
$status = "";

if ($businessService != null) {
    $businessId = $businessService->getBusinessId();
    $name = $businessService->getName();
    $status = $businessService->getStatus();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Business Service Management | <?php echo $websiteTitle; ?></title>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php include('head.php'); ?>

</head>

<body>
    <div class="main-wrapper">
        <?php include("menu.php"); ?>
        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-5 mx-auto">
                        <div class="profile-sidebar">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Business Service
                                    <a href="my-service-view.php" class="btn btn-danger btn-sm" style="float:right"> Back </a></h4>
                                </div>
                                <div class="card-body">
                                    <form id="form-1">
                                        <input type="text" id="business_service_id" name="business_service_id" class="form-control d-none"
                                                   autocomplete="off" value="<?php echo $businessService->getId(); ?>"/>
                                        <input type="text" id="business_id" name="business_id" class="form-control d-none"
                                                   autocomplete="off" value="<?php echo $loggedBusiness->getId(); ?>"/>
                                        <div class="form-group">
                                            <label> Name </label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                   autocomplete="off" value="<?php echo $name; ?>"/>
                                        </div>
                                        <button class="btn btn-primary" type="submit"> Update</button>
                                 </form>
                            </tbody>
                            </table>
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

           

            //waitingDialog.show('Please wait. Action in progress..!!');
            // AJAX request
            $.ajax({
                url: "my-service-update.php",
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(data) {
                    if (isNaN(data)) {
                        alert("Error: " + data);
                        //waitingDialog.hide();
                    } else {
                        if (data > 0) {
                            alert("Serivce updated successfully");
                            //waitingDialog.hide();
                            window.location = "my-service-edit.php?id=<?php echo $businessService->getId(); ?>";
                        } else {
                            alert("Error: " + data);
                            //waitingDialog.hide();
                        }
                    }
                },
                error: function() {
                    alert("Oops something went wrong. Please try later.");
                    //waitingDialog.hide();
                }
            });
        });
    });
</script>

</body>

</html>


