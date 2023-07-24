<?php
include('init.php');

$id = 0;
$cityId = 0;
$postCategoryId = 0;
$title = "";
$description = "";
$createdDateTime = "";
$updatedDateTime = "";
$image = "";
$status = "";
$imageRequired = "required";
if (isset($_GET['id'])) {
    $postId = $_GET['id'];
    $post = $postController->getById($postId);

    if ($post != null) {
        $id = $post->getId();
        $cityId = $post->getCityId();
        $postCategoryId = $post->getPostCategoryId();
        $title = $post->getTitle();
        $description = $post->getDescription();
        $createdDateTime = $post->getCreatedDateTime();
        $updatedDateTime = $post->getUpdatedDateTime();
        $image = "../images/post/" . $post->getId() . "." . $post->getImage();
        if (is_file($image)) {
            $imageRequired = "";
        }
        $status = $post->getStatus();
    }
}

$posts = $postController->getAll();
$cities = $cityController->getAll();
$postCategories = $postCategoryController->getAll();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>post | <?php echo $websiteTitle; ?></title>
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

                    <div class="col-md-4 col-sm-10 col-xs-12">
                        <div class="panel app-panel-1">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <?php
                                    if ($id > 0) {
                                    ?>
                                        Edit post Information

                                        <a href="post-view.php" class="btn btn-xs btn-danger pull-right"><i class="fas fa-backward fa-fw"></i> Back </a>
                                    <?php
                                    } else {
                                    ?>
                                        Add post Information
                                        <a href="post-view.php" class="btn btn-xs btn-danger pull-right"><i class="fas fa-backward fa-fw"></i> Back </a>
                                    <?php
                                    }
                                    ?>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <form id="form-1">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Select City</label>
                                                <select name="cityId" id="cityId" class="form-control select2">
                                                    <option value="0">Select</option>
                                                    <?php
                                                    foreach ($cities as $city) {
                                                        $selected = ($city->getId() == $cityId) ? "selected" : "";
                                                        echo '<option value="' . $city->getId() . '" ' . $selected . '>' . $city->getName() . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Select post category</label>
                                                <select name="postCategoryId" id="postCategoryId" class="form-control select2">
                                                    <option value="0">Select</option>
                                                    <?php
                                                    foreach ($postCategories as $postCategory) {
                                                        $selected = ($postCategory->getId() == $postCategoryId) ? "selected" : "";
                                                        echo '<option value="' . $postCategory->getId() . '" ' . $selected . '>' . $postCategory->getName() . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title">post Title</label>
                                                <input type="text" id="title" name="title" class="form-control" value="<?php echo $title; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">post Description</label>
                                                <textarea id="description" name="description" class="form-control" rows="4"><?php echo $description; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> Image </label>
                                                <input <?php echo $imageRequired; ?> type="file" id="image" name="image" class="form-control" />
                                                <?php
                                                if( is_file($image) ){
                                                ?>
                                                    <img src="<?php echo $image; ?>" style="width: 100px; height: 100px" />
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <?php if ($id > 0) { ?>
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
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?php if ($id > 0) { ?>
                                                    <button type="submit" class="btn btn-md btn-success">Update</button>
                                                <?php } else { ?>
                                                    <button type="submit" class="btn btn-md btn-success">Add</button>
                                                <?php } ?>
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
    <?php include('footer.php'); ?>

    <script>
        $(document).ready(function(e) {
            //form-content
            $("#form-1").on('submit', (function(e) {
                e.preventDefault();

                // city_id
                value = document.getElementById("cityId");
                if (value.selectedIndex == 0) {
                    showAlert("2", "Please select City");
                    value = document.getElementById("cityId").focus();
                    return false;
                }
                // postcategory_id
                value = document.getElementById("postCategoryId");
                if (value.selectedIndex == 0) {
                    showAlert("2", "Please select postcategory");
                    value = document.getElementById("PostCategoryId").focus();
                    return false;
                }
                // title
                value = document.getElementById("title").value.trim();
                if (value == null || value === "") {
                    showAlert("2", "Please enter title ");
                    document.getElementById("title").focus();
                    return false;
                }
                // descriptionShort
                value = document.getElementById("description").value.trim();
                if (value == null || value === "") {
                    showAlert("2", "Please enter Description  ");
                    document.getElementById("description").focus();
                    return false;
                }


                waitingDialog.show('Please wait. Action in progress..!!');
                $.ajax({
                    url: "post-insert.php",
                    type: "POST",
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: new FormData(this),
                    success: function(data) {
                        if (isNaN(data)) {
                            showAlert("2", "Error : " + data);
                            waitingDialog.hide();
                        } else {
                            if (data > 0) {
                                showAlert("1", "Successful update");
                                waitingDialog.hide();
                                window.location = "post.php?id=" + data;
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

            }));

        });
    </script>

</body>

</html>