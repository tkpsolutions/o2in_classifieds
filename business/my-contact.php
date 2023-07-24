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

$businessContacts = $businessContactTypeController->getByBusinessId($loggedBusiness->getId());
$contactTypes = $contactTypeController->getByStatus("active");
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
                                    <h4> Add Business Contact</h4>
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
                                            <label class="col-form-label">Contact Type</label>
                                            <div class="pass-group group-img">
                                                <!-- <span class="lock-icon"><i class="feather-lock"></i></span> -->
                                                <select name="contact_type_id" id="contact_type_id" class="form-control select2">
                                                    <option> Select </option>
                                                    <?php
                                                    foreach ($contactTypes as $contactType) 
													{  
                                                    ?>
                                                        <option value="<?php echo $contactType->getId(); ?>"><?php echo $contactType->getName(); ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Contact</label>
                                            <div class="pass-group group-img">
                                                <!-- <span class="lock-icon"><i class="feather-lock"></i></span> -->
                                                <input type="text"  id="contact" name="contact" class="form-control" autocomplete="off" />
                                                <!-- <span class="toggle-password feather-eye-off"></span> -->
                                            </div>
                                        </div>

                                        <button class="btn btn-primary" type="submit"> Add Contact</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md8 col-sm-8 col-xs-12">
                        <div class="table-responsive">
                            <table class="listing-table datatable">
                                <thead>
                                    <tr>
                                        <th>Sl.no</th>
                                        <th>Contact Type</th>
                                        <th>Contact</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($businessContacts as $businessContact) 
									{
                                        $id = $businessContact->getId();
                                        $contactType = $businessContact->getContactType()->getName();
                                        $contact = $businessContact->getContact();
										
                                        $deleteContact = "my-contact-delete.php?id=" . $id;                                                   
                                              
                                       
                                    ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $contactType; ?></td>
                                            <td><?php echo $contact; ?></td>
                                            <td>
                                                <a href="<?php echo $deleteContact; ?>" class="btn btn-sm btn-danger"onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
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
    $(document).ready(function(e) {
        $("#form-1").on('submit', function(e) {
            e.preventDefault();
            
            value = document.getElementById("contact_type_id");
           if (value.selectedIndex == 0) {
                alert("Please select contact type");
                value = document.getElementById("contact_type_id").focus();
                return false;
            }
            value = document.getElementById("contact").value.trim();
            if (value == null || value == "") {
                alert("Please enter contact");
                document.getElementById("contact").focus();
                return false;
            }


            // Perform AJAX request
            //waitingDialog.show('Please wait. Action in progress..!!');
            $.ajax({
                url: "my-contact-insert.php",
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
                            alert("Contact added successfully");
                            //waitingDialog.hide();
                            window.location = "my-contact.php";
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