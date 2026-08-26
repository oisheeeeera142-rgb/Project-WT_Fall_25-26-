<?php
require_once "../db/ReviewModel.php";

$conn = new mysqli("localhost", "root", "", "your_database");
$model = new ReviewModel($conn);

$success = "";
$error   = "";

if (isset($_GET['approve'])) {
    $id = (int)$_GET['approve'];
    if ($model->updateStatus($id, "approved")) {
        $success = "Review approved successfully!";
    } else {
        $error = "Approve failed: " . mysqli_error($conn);
    }
}
if (isset($_GET['reject'])) {
    $id = (int)$_GET['reject'];
    if ($model->updateStatus($id, "rejected")) {
        $success = "Review rejected successfully!";
    } else {
        $error = "Reject failed: " . mysqli_error($conn);
    }
}

if (isset($_POST['respond'])) {
    $id       = (int)$_POST['id'];
    $response = $_POST['response'];
    if ($model->addResponse($id, $response)) {
        $success = "Response added successfully!";
    } else {
        $error = "Response failed: " . mysqli_error($conn);
    }
}
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    if ($model->deleteReview($id)) {
        $success = "Review deleted successfully!";
    } else {
        $error = "Delete failed: " . mysqli_error($conn);
    }
}

if (isset($_POST['add'])) {
    $guest_name = $_POST['guest_name'];
    $rating     = $_POST['rating'];
    $comment    = $_POST['comment'];
    if ($model->addReview($guest_name, $rating, $comment)) {
        $success = "Review added successfully!";
    } else {
        $error = "Add failed: " . mysqli_error($conn);
    }
}
?>
