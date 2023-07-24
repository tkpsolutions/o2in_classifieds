<?php
include('init.php');

$tagId = 0;
if (isset($_GET['id'])) {
    $tagId = $_GET['id'];
}
$tag = $tagController->getById($tagId);
$categoryId = 0;
$name = "";

$status = "";


if ($tag != null) {
    $id = $tag->getId();
    $categoryId = $tag->getCategoryId();
    $name = $tag->getName();
    $status = $tag->getStatus();
    
}

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
                                    if ($tagId > 0) {
                                    ?>
                                        Edit tag Information
                                        <a href="tag-view.php" class="btn btn-xs btn-danger pull-right"><i class="fas fa-backward fa-fw"></i> Back </a>
                                    <?php
                                    } else {
                                    ?>
                                        Add tag Information
                                        <a href="tag-view.php" class="btn btn-xs btn-danger pull-right"><i class="fas fa-backward fa-fw"></i> Back </a>
                                    <?php
                                    }
                                    ?>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <form id="form-1">
                                    <input type="text" id="id" name="id" value="<?php echo $tagId; ?>" class="hidden" readonly />
                                    <div class="row">
                                       
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
                                                <label> Name </label>
                                                <input type="text" id="name" name="name" class="form-control" value="<?php echo $name; ?>" />
                                            </div>
                                       </div>
                                        
                                       
                                        

                                        
                                        
                                        <?php if ($tagId > 0) { ?>
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
                                                <?php if ($tagId > 0) { ?>
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

                 // name
                 value = document.getElementById("name").value.trim();
                if (value == null || value === "") {
                    showAlert("2", "Please enter name");
                    document.getElementById("name").focus();
                    return false;
                }
                
                
              
                // category_id
                value = document.getElementById("categoryId");
                if (value.selectedIndex == 0) {
                    showAlert("2", "Please select category");
                    value = document.getElementById("categoryId").focus();
                    return false;
                }

                

               


                

                waitingDialog.show("Please wait. Action in progress..!!");
                $.ajax({
                    url: "tag-insert.php",
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
                                window.location = "tag-view.php";
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