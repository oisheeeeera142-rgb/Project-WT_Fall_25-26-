



<?php
include "../model/paymentmodel.php";

$success = "";
$error = "";
$editPayment = null;

if (isset($_POST['add'])) {
$booking_id = $_POST['booking_id'];
$amount     = $_POST['amount'];
$method     = $_POST['method'];
$status     = $_POST['status'];
$date       = $_POST['payment_date'];
$time       = $_POST['payment_time'];
if (empty($booking_id) || empty($amount) || empty($method) || empty($status) || empty($date) || empty($time)) {
$error = "All fields are required!";
} else {
if (addPayment($conn, $booking_id, $amount, $method, $status, $date, $time)) {
$success = "Payment added successfully!";
} else {
$error = mysqli_error($conn);
}
}
}
if (isset($_POST['update'])) {
$id= $_POST['id']; 
$booking_id = $_POST['booking_id'];
$amount    = $_POST['amount'];
$method    = $_POST['method'];
$status    = $_POST['status'];
$date      = $_POST['payment_date'];
$time     = $_POST['payment_time'];

if (updatePayment($conn, $id, $booking_id, $amount, $method, $status, $date, $time)) {
$success = "Payment updated successfully!";
} else {
$error = mysqli_error($conn);
}
}
if (isset($_GET['delete'])) {
$id = (int)$_GET['delete'];
if (deletePayment($conn, $id)) {
$success = "Payment deleted successfully!";
} else {
$error = "Delete failed: " . mysqli_error($conn);
}
}
if (isset($_GET['edit'])) {
$id = (int)$_GET['edit'];
$editPayment = getPaymentById($conn, $id);
}
$payments = getAllPayments($conn);
?>
