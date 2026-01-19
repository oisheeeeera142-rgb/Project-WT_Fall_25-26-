<?php
include "../model/bookingmodel.php";

$success = "";
$error = "";
$editBooking = null;


if (isset($_POST['add'])) {
    $guest_name = $_POST['guest_name'];
    $room_id    = $_POST['room_id'];
    $checkin    = $_POST['checkin'];
    $checkout   = $_POST['checkout'];
    $status     = $_POST['status'];
    if (empty($guest_name) || empty($room_id) || empty($checkin) || empty($checkout) || empty($status)) {
        $error = "All fields are required!";
    } else {
        if (!isRoomAvailable($conn, $room_id, $checkin, $checkout)) {
            $error = "This room is already booked for the selected dates!";
        } else {
            if (addBooking($conn, $guest_name, $room_id, $checkin, $checkout, $status)) {
                $success = "Booking added successfully!";
                mysqli_query($conn, "UPDATE rooms SET status='Occupied' WHERE id='$room_id'");
            } else {
                $error = mysqli_error($conn);
            }
        }
    }
    }
        if (isset($_POST['update'])) {
    $id        = $_POST['id'];
    $guest_name= $_POST['guest_name'];
    $room_id   = $_POST['room_id'];
    $checkin   = $_POST['checkin'];
    $checkout  = $_POST['checkout'];
    $status    = $_POST['status'];
    if (updateBooking($conn, $id, $guest_name, $room_id, $checkin, $checkout, $status)) {
        $success = "Booking updated successfully!";
    } else {
        $error = mysqli_error($conn);
    }
    }
        if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $roomRes = mysqli_query($conn, "SELECT room_id FROM bookings WHERE id=$id");
    if ($roomRes) {
        $room = mysqli_fetch_assoc($roomRes);
        mysqli_query($conn, "UPDATE rooms SET status='Available' WHERE id=".$room['room_id']);
    }
    if (deleteBooking($conn, $id)) {
        $success = "Booking deleted successfully!";
    } else {
        $error = "Delete failed: " . mysqli_error($conn);
    }
    }
    if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $editBooking = getBookingById($conn, $id);
    }
    $bookings = getAllBookings($conn);
?>
