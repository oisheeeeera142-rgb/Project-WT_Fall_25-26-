<?php
include "db.php"; 
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
function updateRoom($conn, $id, $room_no, $type, $floor, $view, $status, $price) {
    $sql = "UPDATE rooms SET 
            room_no='$room_no',
            type='$type',
            floor='$floor',
            view='$view',
            status='$status',
            price='$price'
            WHERE id=$id";
    return mysqli_query($conn, $sql);
}

function deleteRoom($conn, $id) {
$sql = "DELETE FROM rooms WHERE id=$id";
return mysqli_query($conn, $sql);
}
function getRoomById($conn, $id) {
    $sql = "SELECT * FROM rooms WHERE id = $id";
    $res = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($res);
}

?>
