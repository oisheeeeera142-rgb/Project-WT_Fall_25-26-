<?php
include "../model/db.php";

$success = "";
$error = "";
$editBooking = null;
$bookings = null;


if (isset($_POST['add'])) {
    $guest_name = $_POST['guest_name'];
    $room_id    = $_POST['room_id'];
    $checkin    = $_POST['checkin'];
    $checkout   = $_POST['checkout'];
    $status     = $_POST['status'];

    if (empty($guest_name) || empty($room_id) || empty($checkin) || empty($checkout) || empty($status)) {
        $error = "All fields are required!";
    } else {
        $checkSql = "SELECT * FROM bookings 
                    WHERE room_id = '$room_id' 
                    AND LOWER(status) = 'confirmed'
                    AND (checkin <= '$checkout' AND checkout >= '$checkin')";
        $checkRes = mysqli_query($conn, $checkSql);

        if ($checkRes && mysqli_num_rows($checkRes) > 0) {
            $error = "This room is already booked for the selected dates!";
        } else {
            $sql = "INSERT INTO bookings (guest_name, room_id, checkin, checkout, status)
                    VALUES ('$guest_name','$room_id','$checkin','$checkout','$status')";
            if (mysqli_query($conn, $sql)) {
                $success = "Booking added successfully!";
                mysqli_query($conn, "UPDATE rooms SET status='Occupied' WHERE id='$room_id'");
            } else {
                $error = mysqli_error($conn);
            }
            if (!$roomRes || mysqli_num_rows($roomRes) == 0) {
    $error = "Invalid Room ID!";
}

        }
    }
}

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $roomRes = mysqli_query($conn, "SELECT room_id FROM bookings WHERE id=$id");
    if ($roomRes) {
        $room = mysqli_fetch_assoc($roomRes);
        mysqli_query($conn, "UPDATE rooms SET status='Available' WHERE id=".$room['room_id']);
    }
    if (mysqli_query($conn, "DELETE FROM bookings WHERE id=$id")) {
        $success = "Booking deleted successfully!";
    } else {
        $error = "Delete failed: " . mysqli_error($conn);
    }
}


if (isset($_POST['update'])) {
    $id        = $_POST['id'];
    $guest_name= $_POST['guest_name'];
    $room_id   = $_POST['room_id'];
    $checkin   = $_POST['checkin'];
    $checkout  = $_POST['checkout'];
    $status    = $_POST['status'];

    $sql = "UPDATE bookings SET 
            guest_name='$guest_name',
            room_id='$room_id',
            checkin='$checkin',
            checkout='$checkout',
            status='$status'
            WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        $success = "Booking updated successfully!";
    } else {
        $error = mysqli_error($conn);
    }
}


if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $result = mysqli_query($conn, "
        SELECT b.*, r.room_no 
        FROM bookings b 
        JOIN rooms r ON b.room_id = r.id
        WHERE b.id=$id
    ");
    $editBooking = mysqli_fetch_assoc($result);
}


$bookings = mysqli_query($conn, "
    SELECT b.*, r.room_no, r.type, r.floor, r.view, r.price 
    FROM bookings b 
    JOIN rooms r ON b.room_id = r.id
");


?>
