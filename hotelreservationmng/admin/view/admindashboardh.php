<?php
session_start();

if (
    empty($_SESSION['loggedin']) ||
    $_SESSION['loggedin'] !== true ||
    empty($_SESSION['role']) ||
    $_SESSION['role'] !== 'Admin'
) {
    header("Location: loginh.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="admindashboard.css">
    <script src="admindashboard.js" defer></script>
</head>
<body>

<h1>Admin Dashboard</h1>

<div class="buttons">
    <button onclick="location.href='roomlisth.php'">Manage Rooms</button>
    <button onclick="location.href='bookingrooms.php'">Booking</button>
    <button onclick="location.href='payment.php'">Payment</button>
    <button onclick="location.href='housekeeping.php'">Housekeeping</button>
    <button onclick="location.href='guestreview.php'">Guest Review</button>
</div>

<br>

<button onclick="location.href='../controller/logout.php'">Logout</button>

</body>
</html>
