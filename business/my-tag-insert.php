<?php
include('init.php');
$businessId = $_POST['businessId'];
$tagId = $_POST['tag_id'];


$businessTag = new BusinessTag("", $businessId, $tagId, 'active');

$businessTagId = $businessTagController->add($businessTag);
echo $businessId;
exit();
?>