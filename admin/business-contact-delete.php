<?php
include('init.php');

$businessContactId = $_GET['id'];
$businessContact = $businessContactTypeController->getById($businessContactId);
$businessContactTypeController->deleteById($businessContact);
header("Location: business-contact-view.php?id=".$businessContactId);
exit();

?>



