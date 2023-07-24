<?php
include('init.php');

$id = $_POST['id'];
$name = str_replace("'","\'",$_POST['name']);
$image = $_FILES['image']['name'];

if (isset($_FILES['image'])) {
    $imageExtension = explode(".", $image);
    $imageExt = end($imageExtension);
} else {
    $image = null;
    $imageExt = null;
}

$existingContactType = $contactTypeController->getById($id);

if ($id > 0) {
    $status = $_POST['status'];
    $selectedName = $contactTypeController->getByName($name);
    if ($selectedName != null && $selectedName->getId() != $id) {
        echo "Contact type already exists";
        exit();
    } else {

        if ( $image == null){
            $imageExt = $existingContactType->getImage();
        }

        $contactType = new ContactType($id, $name, $imageExt, $status);
        $contactTypeController->update($contactType);

        if ( $image != null ) {
            $imageSourcePath = $_FILES['image']['tmp_name'];
            $imageFilepath = "../images/contacttype/" . $id . '.' . $imageExt;
            move_uploaded_file($imageSourcePath, $imageFilepath);
        }

        echo $id;
        exit();
    }
} else {
    $selectedName = $contactTypeController->getByName($name);
    if ($selectedName != null) {
        echo "Contact Type already exists";
        exit();
    } else {
        $contactType = new ContactType("", $name, $imageExt, "Active");
        $contactTypeId = $contactTypeController->add($contactType);

        if ( $image != null ) {
            $imageSourcePath = $_FILES['image']['tmp_name'];
            $imageFilepath = "../images/contacttype/" . $contactTypeId . '.' . $imageExt;
            move_uploaded_file($imageSourcePath, $imageFilepath);
        }

        echo $contactTypeId;
        exit();
    }
}

echo "Operation Failed";
exit();
?>
