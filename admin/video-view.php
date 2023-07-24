<?php
include('init.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tag | <?php echo $websiteTitle; ?></title>

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
                                    List of Video
                                    <a href="video.php" class="btn btn-xs btn-success pull-right"><i class="fas fa-plus-circle fa-fw"></i> Add New Video</a>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table class="table table-bordered app-table data-table">
                                            <thead>
                                                <tr>
                                                    <th>Video ID</th>
                                                  
                                                    <th>Youtube Link</th>
                                                    <th> Title </th>
                                                    <th> Description </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $videos = $videoController->getAll();
                                                foreach ($videos as $video) {
                                                    $videoId = $video->getId();
                                                    $youtubeLink = $video->getYoutubeLink();
                                                    $title = $video->getTitle();
                                                    $description = $video->getDescription();
                                                    $status = $video->getStatus();
                                                 
                                                    $editVideo = "video.php?id=" . $videoId;
                                                    $deleteVideo = "video-delete.php?id=" . $videoId;
                                                   
                                                ?>
                                                    <tr>
                                                        <td><?php echo $videoId; ?></td>
                                                        <td><?php echo $youtubeLink; ?></td>
                                                        <td><?php echo $title; ?></td>
                                                        <td><?php echo $description; ?></td>
                                                        
                                                        <td>
                                                            <a href="<?php echo $editVideo; ?>" class="btn btn-sm btn-info">Edit</a> 
                                                            <a href="<?php echo $deleteVideo; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
                                                        
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
            <!-- /.admin-panel-content -->
            <?php include('footer.php'); ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
</body>

</html>