<?php
include('init.php');
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
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel app-panel-1">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    List of events
                                    <a href="event.php" class="btn btn-xs btn-success pull-right"><i class="fas fa-plus-circle fa-fw"></i> Add New Event</a>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered app-table data-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Image</th>
                                            <th>Date</th>
                                            <th>City</th>
                                            <th>Address</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($events as $event) {
                                            $id = $event->getId();
                                            $image = $event->getImage();
                                            $imagePath = "../images/event/" . $id . "." . $image;
                                        ?>
                                            <tr>
                                                <td><?php echo $event->getId(); ?></td>
                                                <td><?php echo $event->getTitle(); ?></td>
                                                <td><?php echo $event->getEventCategory()->getName(); ?></td>
                                                <td><img src="<?php echo $imagePath; ?>" alt="Image" width="50"></td>
                                                <td><?php echo $event->getEventDate(); ?></td>
                                                <td><?php echo $event->getCity()->getName(); ?></td>
                                                <td><?php echo $event->getAddress(); ?></td>
                                                <td>
                                                    <a href="event.php?id=<?php echo $event->getId(); ?>" class="btn btn-primary btn-xs">Edit</a>
                                                    <a href="event-delete.php?id=<?php echo $event->getId(); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this event?')">Delete</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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
                                window.location = "event.php";
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