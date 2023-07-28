<?php
include('init.php');

$businessId = $_POST['business_id'];
$contactTypeId = $_POST['contact_type_id'];
$contact = str_replace("'", "\'", $_POST['contact']);
$createdDateTime = null;
$updatedDateTime = null;

$businessContact = new BusinessContactType(0, $businessId, $contactTypeId, $contact, $createdDateTime, $updatedDateTime, 'Active');
$id = $businessContactTypeController->add($businessContact);
echo $businessId;
exit();

?>
