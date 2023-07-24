<?php
include('init.php');

$videos = $hostVideoController->getAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Host Videos | <?php echo $websiteTitle; ?></title>
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
                    <div class="col-md-12">
                        <div class="panel app-panel-1">
                            <div class="panel-heading">
                                <h3 class="panel-title">List of Host Videos
                                <a href="host-video.php" class="btn btn-xs btn-success pull-right"><i class="fas fa-plus-circle fa-fw"></i> Add New Host Video</a>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered app-table data-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Video</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($videos as $video) { 
                                            $id = $video->getId();
                                             $video1 = $video->getVideo();
                                             $videoPath = "../images/hostvideos/" . $id . "." . $video1;
                                            ?>
                                            <tr>
                                                <td><?php echo $id; ?></td>
                                                <td><?php echo $video->getTitle(); ?></td>
                                                <td><?php echo $video->getDescription(); ?></td>
                                                <td>
                                                <video width="320" height="240" controls preload="auto">
                                                        <source src="<?php echo $videoPath; ?>" type="video/mp4">
                                                       
                                                    </video>
                                                </td>
                                                <td>
                                                    <a href="host-video.php?id=<?php echo $video->getId(); ?>" class="btn btn-primary btn-xs">Edit</a>
                                                    <a href="host-video-delete.php?id=<?php echo $video->getId(); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this video?')">Delete</a>
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
</body>

</html>
