<?php
include('init.php');

$id = 0;
$cityId = 0;
$eventCategoryId = 0;
$eventDate = "";
$title = "";
$description = "";
$image = "";
$address = "";
$createdDateTime = "";
$updatedDateTime = "";
$status = "";
if (isset($_GET['id'])) {
    $businessId = $_GET['id'];
}
$imageRequired = "required";
if (isset($_GET['id'])) {
    $eventId = $_GET['id'];
    $event = $eventController->getById($eventId);

    if ($event != null) {
        $id = $event->getId();
        $cityId = $event->getCityId();
        $eventCategoryId = $event->getEventCategoryId();
        $eventDate = $event->getEventDate();
        $title = $event->getTitle();
        $description = $event->getDescription();
        $image = "../images/event/" . $event->getId() . "." . $event->getImage();
        if (is_file($image)) {
            $imageRequired = "";
        }
        $address = $event->getAddress();
        $createdDateTime = $event->getCreatedDateTime();
        $updatedDateTime = $event->getUpdatedDateTime();
        $status = $event->getStatus();
    }
}

$events = $eventController->getAll();
$cities = $cityController->getAll();
$eventCategories = $eventCategoryController->getAll();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Event | <?php echo $websiteTitle; ?></title>
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
                        <!-- <?php include("event-menu.php"); ?> -->
                        <div class="panel app-panel-1">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <?php
                                    if ($id > 0) {
                                    ?>
                                        Edit Event Information

                                        <a href="event-view.php" class="btn btn-xs btn-danger pull-right"><i class="fas fa-backward fa-fw"></i> Back </a>
                                    <?php
                                    } else {
                                    ?>
                                        Add Event Information
                                        <a href="event-view.php" class="btn btn-xs btn-danger pull-right"><i class="fas fa-backward fa-fw"></i> Back </a>
                                    <?php
                                    }
                                    ?>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <form id="event-form" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <div class="row">
                                        <div class="col-md-6">
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
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>Select Event category</label>
                                                <select name="eventCategoryId" id="eventCategoryId" class="form-control select2">
                                                    <option value="0">Select</option>
                                                    <?php
                                                    foreach ($eventCategories as $eventCategory) {
                                                        $selected = ($eventCategory->getId() == $eventCategoryId) ? "selected" : "";
                                                        echo '<option value="' . $eventCategory->getId() . '" ' . $selected . '>' . $eventCategory->getName() . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="eventDate">Event Date</label>
                                                <input type="date" id="eventDate" name="eventDate" class="form-control" value="<?php echo $eventDate; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">Event Title</label>
                                                <input type="text" id="title" name="title" class="form-control" value="<?php echo $title; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">Event Description</label>
                                                <textarea id="description" name="description" class="form-control" rows="4"><?php echo $description; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> Image </label>

                                                <input type="file" <?php echo $imageRequired; ?> id="image" name="image" class="form-control" />
                                                <?php if ($image != "") { ?>
                                                    <div>
                                                        <img src="<?php echo $image; ?>" alt="Category Image" width="100" height="100" />
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="address">Event Address</label>
                                                <input type="text" id="address" name="address" class="form-control" value="<?php echo $address; ?>">
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
    </div>
    <?php include('footer.php'); ?>
    <script>
        $(document).ready(function() {
            $("#event-form").on('submit', function(e) {
                e.preventDefault();

                var value = document.getElementById("eventCategoryId");
                if (value.selectedIndex === 0) {
                    showAlert("2", "Please select Event Category");
                    eventCategoryId.focus();
                    return false;
                }

                value = document.getElementById("cityId");
                if (value.selectedIndex === 0) {
                    showAlert("2", "Please select City");
                    cityId.focus();
                    return false;
                }

                value = document.getElementById("eventDate").value.trim();
                if (value === "") {
                    showAlert("2", "Please enter Event Date");
                    document.getElementById("eventDate").focus();
                    return false;
                }

                value = document.getElementById("title").value.trim();
                if (value === "") {
                    showAlert("2", "Please enter Title");
                    document.getElementById("title").focus();
                    return false;
                }

                value = document.getElementById("description").value.trim();
                if (value === "") {
                    showAlert("2", "Please enter Description");
                    document.getElementById("description").focus();
                    return false;
                }
                value = document.getElementById("address").value.trim();
                if (value === "") {
                    showAlert("2", "Please enter Address");
                    document.getElementById("address").focus();
                    return false;
                }
                // Perform AJAX request
                waitingDialog.show('Please wait. Action in progress..!!');
                $.ajax({
                    url: "event-insert.php",
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
                                window.location = "event.php?id=" + data;
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