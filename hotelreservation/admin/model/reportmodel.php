<?php
include "db.php";

// মোট কত টাকা এসেছে
function getTotalIncome($conn) {
    $sql = "SELECT SUM(amount) AS total_income FROM payments WHERE status='Completed'";
    $res = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($res)['total_income'] ?? 0;
}

// Cash/Card/Online income
function getIncomeByMethod($conn) {
    $sql = "SELECT method, SUM(amount) AS total FROM payments WHERE status='Completed' GROUP BY method";
    return mysqli_query($conn, $sql);
}

// Daily income
function getDailyIncome($conn) {
    $sql = "SELECT payment_date, SUM(amount) AS total FROM payments WHERE status='Completed' GROUP BY payment_date";
    return mysqli_query($conn, $sql);
}

// Monthly income
function getMonthlyIncome($conn) {
    $sql = "SELECT DATE_FORMAT(payment_date,'%Y-%m') AS month, SUM(amount) AS total 
            FROM payments WHERE status='Completed' GROUP BY month";
    return mysqli_query($conn, $sql);
}

// Yearly income
function getYearlyIncome($conn) {
    $sql = "SELECT YEAR(payment_date) AS year, SUM(amount) AS total 
            FROM payments WHERE status='Completed' GROUP BY year";
    return mysqli_query($conn, $sql);
}

// Completed vs Pending payment
function getPaymentStatusSummary($conn) {
    $sql = "SELECT status, COUNT(*) AS count FROM payments GROUP BY status";
    return mysqli_query($conn, $sql);
}

// Booking summary (total booking, room-wise booking)
function getBookingSummary($conn) {
    $sql = "SELECT r.room_no, COUNT(b.id) AS total_bookings 
            FROM bookings b 
            JOIN rooms r ON b.room_id = r.id 
            GROUP BY r.room_no";
    return mysqli_query($conn, $sql);
}
$totalIncome = 0;
foreach($payments as $payment){
    if($payment['Status'] == 'Complete' || $payment['Status'] == 'Overpaid'){
        $totalIncome += $payment['Amount'];
    }
}
echo number_format($totalIncome) . " ৳";
foreach($paymentsByMethod as $row){
    echo $row['Method'] . " : " . number_format($row['total']) . " ৳<br>";
}

?>
