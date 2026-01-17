<?php
include "db.php";

function getAllBookings($conn) {
    $sql = "SELECT b.id AS booking_id, b.guest_name, b.room_id, b.checkin, b.checkout, b.status
            FROM bookings b";
    return mysqli_query($conn, $sql);
}

function getPaymentById($conn, $id) {
    $sql = "SELECT * FROM payments WHERE id=$id";
    $res = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($res);
}

function addPayment($conn, $booking_id, $amount, $method, $status, $date, $time) {
    $sql = "INSERT INTO payments (booking_id, amount, method, status, payment_date, payment_time)
            VALUES ('$booking_id','$amount','$method','$status','$date','$time')";
    return mysqli_query($conn, $sql);
}

function updatePayment($conn, $id, $booking_id, $amount, $method, $status, $date, $time) {
    $sql = "UPDATE payments SET 
            booking_id='$booking_id',
            amount='$amount',
            method='$method',
            status='$status',
            payment_date='$date',
            payment_time='$time'
            WHERE id=$id";
    return mysqli_query($conn, $sql);
}

function deletePayment($conn, $id) {
    $sql = "DELETE FROM payments WHERE id=$id";
    return mysqli_query($conn, $sql);
}
function getAllPayments($conn) {
    $sql = "SELECT p.id, p.booking_id, p.amount, p.method, p.status, 
                   p.payment_date, p.payment_time, b.guest_name
            FROM payments p
            JOIN bookings b ON p.booking_id = b.id";
    return mysqli_query($conn, $sql);
}



?>
