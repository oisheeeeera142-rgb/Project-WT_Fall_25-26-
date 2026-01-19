<?php
include "../model/db.php";

$success = $error = "";
$editRoom = null;
if (isset($_POST['add'])) {
    $room_no = trim($_POST['room_no'] ?? "");
    $type    = trim($_POST['type'] ?? "");
    $floor   = trim($_POST['floor'] ?? "");
    $view    = trim($_POST['view'] ?? "");
    $status  = trim($_POST['status'] ?? "");
    $price   = trim($_POST['price'] ?? "");

    if ($room_no=="" || $type=="" || $floor=="" || $view=="" || $status=="" || $price=="") {
        $error = "All fields are required!";
    } else {
        $sql = "INSERT INTO rooms (room_no, type, floor, view, status, price)
                VALUES ('$room_no','$type','$floor','$view','$status','$price')";
        if (mysqli_query($conn, $sql)) {
            $success = "Room added successfully!";
        } else {
            $error = "Error: " . mysqli_error($conn);
        }
    }
}


if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    if (mysqli_query($conn, "DELETE FROM rooms WHERE id=$id")) {
        header("Location: ../view/roomlisth.php");
        exit;
    } else {
        $error = "Delete failed: " . mysqli_error($conn);
    }
}

if (isset($_POST['update'])) {
    $id      = (int)$_POST['id'];
    $room_no = trim($_POST['room_no']);
    $type    = trim($_POST['type']);
    $floor   = trim($_POST['floor']);
    $view    = trim($_POST['view']);
    $status  = trim($_POST['status']);
    $price   = trim($_POST['price']);

    if ($room_no=="" || $type=="" || $floor=="" || $view=="" || $status=="" || $price=="") {
        $error = "All fields are required for update!";
    } else {
        $sql = "UPDATE rooms SET 
                room_no='$room_no',
                type='$type',
                floor='$floor',
                view='$view',
                status='$status',
                price='$price'
                WHERE id=$id";
        if (mysqli_query($conn, $sql)) {
            header("Location: ../view/roomlisth.php");
            exit;
        } else {
            $error = "Update failed: " . mysqli_error($conn);
        }
    }
}

if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM rooms WHERE id=$id");
    if ($result && mysqli_num_rows($result) > 0) {
        $editRoom = mysqli_fetch_assoc($result);
    } else {
        $error = "Room not found!";
    }
}
$rooms = mysqli_query($conn, "SELECT * FROM rooms");
if (!$rooms) {
    $error = "Failed to fetch rooms: " . mysqli_error($conn);
}
?>
