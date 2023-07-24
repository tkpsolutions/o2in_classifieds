<?php
include('init.php');

if (!isset($_SESSION['login_business_id'])) {
    header("Location: logged-user-detail.php");
    exit();
}

$business = $businessController->getById($loggedBusiness->getId());

if ($business == null) {
    echo "Error: Failed to fetch business profile.";
    exit();
}

$businessImages = $businessImageController->getByBusinessId($loggedBusiness->getId());
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("head.php"); ?>
	<title>O2in | Business Listing and Booking Management</title>
</head>

<body>


	<div class="main-wrapper">

		<?php include("menu.php"); ?>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-12">
                        <div class="profile-sidebar">
                            <div class="card">
                                <div class="card-header">
                                    <h4> Add Business Gallery</h4>
                                </div>
                                <div class="card-body">
                                    <form id="form-1">
                                        <div class="form-group" style="display: none;">
                                            <label class="col-form-label">BusinessId</label>
                                            <div class="pass-group group-img">
                                                <input type="text" id="business_id" name="business_id" value="<?php echo $business->getId(); ?>" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Image</label>
                                            <div class="pass-group group-img">
                                                <!-- <span class="lock-icon"><i class="feather-lock"></i></span> -->
                                                <input type="file" id="image" name="image" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Caption</label>
                                            <div class="pass-group group-img">
                                                <!-- <span class="lock-icon"><i class="feather-lock"></i></span> -->
                                                <input type="text" id="caption" name="caption" class="form-control" autocomplete="off" />
                                                <!-- <span class="toggle-password feather-eye-off"></span> -->
                                            </div>
                                        </div>
                                         <button class="btn btn-primary" type="submit">Add Gallery</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-12">
                        <div class="table-responsive">
                            <table class="listing-table datatable">
                                <thead>
                                    <tr>
                                        <th>Sl.no</th>
                                        <th>Image</th>
                                        <th>Caption</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($businessImages as $businessImage) 
									{
                                        $id = $businessImage->getId();
                                        $image = $businessImage->getImage();
                                        $caption = $businessImage->getCaption();
                                        $deleteImage = "my-gallery-delete.php?id=" . $id;                                                   
                                              
                                        $imagePath = "../images/businessimage/" . $id . "." . $image;
                                    ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><img src="<?php echo $imagePath; ?>" alt="Image" style="width:50px;height:50px"></td>
                                            <td><?php echo $caption; ?></td>
                                            <td>
                                                <a href="<?php echo $deleteImage; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
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
            <!-- /Dashboard Content -->

            <?php include("footer.php"); ?>

        </div>
</body>

</html>

<script>
    $(document).ready(function(e) 
	{
        $("#form-1").on('submit', function(e) 
		{
            e.preventDefault();
			
			
			//reading image
			value = document.getElementById("image").value.trim();		
			var allowedFiles = [".png", ".jpg", ".jpeg", ".gif", ".bmp", ".PNG", ".JPG", ".JPEG", ".GIF", ".BMP"];
			var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
			if( value == null || value == "" )	
			{
				alert("Please select image");
				document.getElementById("image").focus();
				return false;
			}
			else if(!regex.test(value))
			{
				alert("Allowed Only  .jpg, .JPG, .jpeg, .JPEG, .png, .PNG, .bmp, .BMP, .gif, .GIF Files.");
				document.getElementById("image").focus();
				return false;
			}
			
			value = document.getElementById("caption").value.trim();
			if (value == null || value == "") {
				alert("Please enter caption");
				document.getElementById("caption").focus();
				return false;
			}

            // Perform AJAX request
            //waitingDialog.show('Please wait. Action in progress..!!');
            $.ajax({
                url: "my-gallery-insert.php",
                type: "POST",
                contentType: false,
                cache: false,
                processData: false,
                data: new FormData(this),
                success: function(data) {
                    if (isNaN(data)) {
                        alert("Error: " + data);
                        //  waitingDialog.hide();
                    } else {
                        if (data > 0) {
                            alert("Gallery added successfully");
                            //waitingDialog.hide();
                            window.location = "my-gallery.php";
                        } else {
                            alert("Error: " + data);
                            // waitingDialog.hide();
                        }
                    }
                },
                error: function() {
                    alert("2", "Oops something went wrong. Please try later.");
                    //  waitingDialog.hide();
                }
            });
        });
    });
</script>