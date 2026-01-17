<?php
include "db.php"; // DB connection

function getRooms($conn) {
    $result = mysqli_query($conn, "SELECT * FROM rooms ORDER BY id DESC");
    $rooms = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $rooms[] = $row;
        }
    }
    return $rooms;
}

function getRoom($conn, $id) {
    $result = mysqli_query($conn, "SELECT * FROM rooms WHERE id=$id");
    return $result ? mysqli_fetch_assoc($result) : null;
}

function addRoom($conn, $roomNumber, $floor, $view, $type, $status) {
    $sql = "INSERT INTO rooms (room_number, floor, view, type, status)
            VALUES ('$roomNumber', '$floor', '$view', '$type', '$status')";
    return mysqli_query($conn, $sql);
}

function updateRoom($conn, $id, $roomNumber, $floor, $view, $type, $status) {
    $sql = "UPDATE rooms SET 
        room_number='$roomNumber', 
        floor='$floor', 
        view='$view', 
        type='$type', 
        status='$status' 
        WHERE id=$id";
    return mysqli_query($conn, $sql);
}

function deleteRoom($conn, $id) {
    $sql = "DELETE FROM rooms WHERE id=$id";
    return mysqli_query($conn, $sql);
}
?>
