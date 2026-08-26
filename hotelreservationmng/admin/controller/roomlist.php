<?php

include "../model/roomlistmodel.php";

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
        if (addRoom($conn,$room_no,$type,$floor,$view,$status,$price)) {
            $success = "Room added successfully!";
        } else {
            $error = "Room add failed!";
        }
    }
}

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    if (deleteRoom($conn,$id)) {
        header("Location: ../view/roomlisth.php");
        exit;
    } else {
        $error = "Delete failed!";
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
        if (updateRoom($conn,$id,$room_no,$type,$floor,$view,$status,$price)) {
            header("Location: ../view/roomlisth.php");
            exit;
        } else {
            $error = "Update failed!";
        }
    }
}

if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $editRoom = getRoomById($conn,$id);
}


$rooms = getRooms($conn);
?>
