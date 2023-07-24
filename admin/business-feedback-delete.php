<?php
include('init.php');
if (isset($_GET['id'])) {
    $businessFeedbackId = $_GET['id'];
    $businessFeedback = $businessFeedbackController->getById($businessFeedbackId);

    if ($businessFeedback) {
        $businessFeedbackController->deleteById($businessFeedbackId);
        header("Location: business-feedback-view.php");
        exit();
    } else {
        header("Location: error.php");
        exit();
    }
} else {
    header("Location: error.php");
    exit();
}
?>