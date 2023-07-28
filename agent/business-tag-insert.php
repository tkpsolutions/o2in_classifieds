<?php
include('init.php');
$businessId = $_POST['businessId'];
$tagId = $_POST['tagId'];


$businessTag = new BusinessTag(0, $businessId, $tagId, 'Active');

$businessTagId = $businessTagController->add($businessTag);
echo $businessId;
exit();
?>