<?php
include('init.php');
$posts = $postController->getAll();
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

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel app-panel-1">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    List of posts
                                </h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered app-table data-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>City</th>
                                            <th>PostCategory</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($posts as $post) {
                                            $id = $post->getId();
                                            $image = $post->getImage();
                                            $imagePath = "../images/post/" . $id . "." . $image;
                                        ?>
                                            <tr>

                                                <td><?php echo $post->getId(); ?></td>
                                                <td><?php echo $post->getCity()->getName(); ?></td>
                                                <td><?php echo $post->getPostCategory()->getName(); ?></td>
                                                <td><?php echo $post->getTitle(); ?></td>
                                                <td><img src="<?php echo $imagePath; ?>" alt="Image" width="50"></td>
                                                <td>
                                                    <a href="post.php?id=<?php echo $post->getId(); ?>" class="btn btn-primary btn-xs">Edit</a>
                                                    <a href="post-delete.php?id=<?php echo $post->getId(); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
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