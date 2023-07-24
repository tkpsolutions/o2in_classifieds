<?php
include('init.php');
$videoId= $_POST['id'];
$youtubeLinkId= $_POST['youtubeLink'];
$title = str_replace("'","\'",$_POST['title']);
$description = str_replace("'","\'",$_POST['description']);

$tempTitle = str_replace("'","\'",$title);



$selectedTitle = $videoController->getByTitle($tempTitle);

if($videoId > 0)
{	
	 
	if($selectedTitle != null && $selectedTitle->getId() != $videoId)
	{	
		echo "Video already exist";
		exit();
	}
	else
	{ 
		$status = $_POST['status']; 
		$video = new Video ($videoId, $youtubeLinkId, $tempTitle,$description,"","", $status);
		$videoId = $videoController->update($video);
		echo $videoId;
		exit();
	}
}
else
{
	
	if($selectedTitle != null)
	{
		echo "Video already exist";
		exit();
	}
	else
	{
        $video = new Video ("", $youtubeLinkId, $tempTitle,$description,"","","active");
		$id = $videoController->add($video);
		echo $id;
		exit();
	}
}

echo "Operation Failed";
exit();

?>

	
    


