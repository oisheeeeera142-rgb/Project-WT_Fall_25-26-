<?php
include "../db.php";
include "../model/roomlistmodel.php";

// Edit page load
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $room = getRoom($conn, $id);

    if (!$room) {
        echo "Room not found!";
        exit;
    }

    include "../view/editroomh.php";
    exit;
}

// Update room
if (isset($_POST['updateRoom'])) {
    $id = $_POST['id'];
    $roomNumber = $_POST['roomNumber'];
    $floor = $_POST['floor'];
    $view = $_POST['view'];
    $type = $_POST['type'];
    $status = $_POST['status'];

    updateRoom($conn, $id, $roomNumber, $floor, $view, $type, $status);

    header("Location: roomlisth.php");
    exit;
}
