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

    <title>Contact Types | <?php echo $websiteTitle; ?></title>

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
                                    List of Contact Types
                                    <a href="contact-type.php" class="btn btn-xs btn-success pull-right"><i class="fas fa-plus-circle fa-fw"></i> Add New </a>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table class="table table-bordered app-table data-table">
                                            <thead>
                                                <tr>
                                                    <th> Sl.no </th>
                                                    <th> Name </th>
                                                    <th> Image </th>
                                                   
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $contactTypes = $contactTypeController->getAll();
                                                foreach ($contactTypes as $contactType) {
													$id = $contactType->getId();
                                                    $name = $contactType->getName();
                                                    $image = $contactType->getImage();
                                                
                                                    $editContactType = "contact-type.php?id=" . $contactType->getId();
													$imagePath = "../images/contacttype/" . $id . "." . $image;
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $name; ?></td>
														<td><img src="<?php echo $imagePath; ?>" alt="Image" width="50"></td>
                                                      
                                                        <td>
                                                            <a href="<?php echo $editContactType; ?>" class="btn btn-sm btn-success"> Edit </a>
                                                        </td>
                                                    </tr>
                                                <?php
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
