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

$businessTags = $businessTagController->getByBusinessId($businessId);
$tags = $tagController->getByStatus("active");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Business Tag Management | <?php echo $websiteTitle; ?></title>

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
                <div class="col-xs-12">
                <?php include("business-menu.php"); ?>
                    <div class="panel app-panel-1">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                List of Business Tag : <?php echo $business->getName(); ?>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <form id="form-1">
                                        <input type="text" id="businessId" name="businessId" value="<?php echo $businessId; ?>" class="hidden" readonly />
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Select Tag</label>
                                                    <select name="tagId" id="tagId" class="form-control select2">
                                                        <option>Select</option>
                                                        <?php
                                                        foreach ($tags as $tag) {
                                                            $selected = "";
                                                            if ($tag->getId() == $tagId) {
                                                                $selected = "selected";
                                                            }
                                                        ?>
                                                            <option <?php echo $selected; ?> value="<?php echo $tag->getId(); ?>"><?php echo $tag->getName(); ?></option>
                                                        <?php
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-md btn-success">Add Tag</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-8 col-sm-12 col-xs-12">
                                    <table class="table table-bordered app-table data-table">
                                        <thead>
                                            <tr>
                                                <th>Business Name</th>
                                                <th>Tag Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;

                                            foreach ($businessTags as $businessTag) {
                                                $businessTagId = $businessTag->getId();

                                                $businessName = $businessTag->getBusiness()->getName();
                                                $tagName = $businessTag->getTag()->getName();
                                                $deleteLink = "business-tag-delete.php?id=" . $businessTagId . "&businessId=" . $businessId;
                                            ?>
                                                <tr>


                                                    <td><?php echo $businessName; ?></td>
                                                    <td><?php echo $tagName; ?></td>
                                                    <td>
                                                        <a href="<?php echo $deleteLink; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                                                    </td>




                                                </tr>
                                            <?php
                                                $i++;
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
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script>
        $(document).ready(function() {
            // form-content
            $("#form-1").on("submit", function(e) {
                e.preventDefault();
                // category_id
                value = document.getElementById("tagId");
                if (value.selectedIndex == 0) {
                    showAlert("2", "Please select tag");
                    value = document.getElementById("tagId").focus();
                    return false;
                }
                waitingDialog.show("Please wait. Action in progress..!!");
                $.ajax({
                    url: "business-tag-insert.php",
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
                                window.location = "business-tag.php?id=" + data;
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