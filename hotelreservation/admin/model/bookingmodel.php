<?php
include "db.php";

// সব বুকিং আনার ফাংশন
function getAllBookings($conn) {
    $sql = "SELECT b.id AS booking_id, b.guest_name, b.checkin, b.checkout, b.status,
                   r.id AS room_id, r.room_no, r.floor
            FROM bookings b
            JOIN rooms r ON b.room_id = r.id";
    return mysqli_query($conn, $sql);
}

// নির্দিষ্ট বুকিং আনার ফাংশন (edit এর জন্য)
function getBookingById($conn, $id) {
    $sql = "SELECT b.*, r.room_no 
            FROM bookings b 
            JOIN rooms r ON b.room_id = r.id
            WHERE b.id=$id";
    $res = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($res);
}

// রুম ফাঁকা আছে কিনা চেক করার ফাংশন
function isRoomAvailable($conn, $room_id, $checkin, $checkout) {
    $sql = "SELECT * FROM bookings 
            WHERE room_id = '$room_id' 
            AND LOWER(status) = 'confirmed'
            AND (checkin <= '$checkout' AND checkout >= '$checkin')";
    $res = mysqli_query($conn, $sql);
    return ($res && mysqli_num_rows($res) > 0) ? false : true;
}

// নতুন বুকিং যোগ করার ফাংশন
function addBooking($conn, $guest_name, $room_id, $checkin, $checkout, $status) {
    $sql = "INSERT INTO bookings (guest_name, room_id, checkin, checkout, status)
            VALUES ('$guest_name','$room_id','$checkin','$checkout','$status')";
    return mysqli_query($conn, $sql);
}

// বুকিং আপডেট করার ফাংশন
function updateBooking($conn, $id, $guest_name, $room_id, $checkin, $checkout, $status) {
    $sql = "UPDATE bookings SET 
            guest_name='$guest_name',
            room_id='$room_id',
            checkin='$checkin',
            checkout='$checkout',
            status='$status'
            WHERE id=$id";
    return mysqli_query($conn, $sql);
}

// বুকিং ডিলিট করার ফাংশন
function deleteBooking($conn, $id) {
    $sql = "DELETE FROM bookings WHERE id=$id";
    return mysqli_query($conn, $sql);
}
?>
