<?php
include('init.php');

$videoId = 0;
if (isset($_GET['id'])) {
    $videoId = $_GET['id'];
}
$video = $videoController->getById($videoId);
$title = "";
$youtubeLink = "";
$description = "";
$status = "";


if ($video != null) {
    $id = $video->getId();
    $youtubeLink = $video->getYoutubeLink();
    $title = $video->getTitle();
    $description = $video->getDescription();
    $status = $video->getStatus();
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

    <title>Tag Management | <?php echo $websiteTitle; ?></title>

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
                                    if ($videoId > 0) {
                                    ?>
                                        Edit Video Information
                                        <a href="video-view.php" class="btn btn-xs btn-danger pull-right"><i class="fas fa-backward fa-fw"></i> Back </a>
                                    <?php
                                    } else {
                                    ?>
                                        Add Video Information
                                        <a href="video-view.php" class="btn btn-xs btn-danger pull-right"><i class="fas fa-backward fa-fw"></i> Back </a>
                                    <?php
                                    }
                                    ?>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <form id="form-1">
                                    <input type="text" id="id" name="id" value="<?php echo $videoId; ?>" class="hidden" readonly />
                                    <div class="row">

                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label> Youtube Link </label>
                                                <input type="link" id="youtubeLink" name="youtubeLink" class="form-control" value="<?php echo $youtubeLink; ?>" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label> Title </label>
                                                <input type="text" id="title" name="title" class="form-control" value="<?php echo $title; ?>" />
                                            </div>
                                        </div>

                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label> Description </label>
                                                <textarea id="description" name="description" class="form-control" rows="4"><?php echo $description; ?></textarea>
                                            </div>
                                        </div>

                                        <?php if ($videoId > 0) { ?>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select id="status" name="status" class="form-control">
                                                        <?php if (strcasecmp($status, "active") == 0) { ?>
                                                            <option value="Active" selected>Active</option>
                                                            <option value="Deactive">Deactive</option>


                                                        <?php } else { ?>
                                                            <option value="Active" selected>Active</option>
                                                            <option value="Deactive">Deactive</option>

                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php } ?>


                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <?php if ($videoId > 0) { ?>
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

    <script src="//cdn.ckeditor.com/4.14.0/basic/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('description', {});

        $(document).ready(function() {
            // form-content
            $("#form-1").on("submit", function(e) {
                e.preventDefault();

                //updating CKEditors
                for (var instanceName in CKEDITOR.instances)
                    CKEDITOR.instances[instanceName].updateElement();

                // youtubeLink
                value = document.getElementById("youtubeLink").value.trim();
                if (value == null || value === "") {
                    showAlert("2", "Please enter youtubeLink");
                    document.getElementById("youtubeLink").focus();
                    return false;
                }

                // title
                value = document.getElementById("title").value.trim();
                if (value == null || value == "") {
                    showAlert("2", "Please enter title");
                    document.getElementById("title").focus();
                    return false;
                }


                // description
                value = document.getElementById("description").value.trim();
                if (value == null || value == "") {
                    showAlert("2", "Please enter description");
                    document.getElementById("description").focus();
                    return false;
                }

                waitingDialog.show("Please wait. Action in progress..!!");
                $.ajax({
                    url: "video-insert.php",
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
                                window.location = "video.php?id=" + data;
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