
<?php
session_start();
include("../controller/reportmng.php"); ?>
<!DOCTYPE html>
<html>
<head>
<title>Reports</title>
<script src="../js/report.js"></script>
</head>
<body>
<h2>Payment & Booking Reports</h2>

<h3>Total Income: <?php echo $totalIncome; ?> ৳</h3>

<h3>Income by Method</h3>
<table border="1" cellpadding="10">
<tr><th>Method</th><th>Total</th></tr>
<?php while($row = mysqli_fetch_assoc($incomeByMethod)) { ?>
<tr><td><?php echo $row['method']; ?></td><td><?php echo $row['total']; ?></td></tr>
<?php } ?>
</table>

<h3>Payment Status Summary</h3>
<table border="1" cellpadding="10">
<tr><th>Status</th><th>Count</th></tr>
<?php while($row = mysqli_fetch_assoc($paymentStatus)) { ?>
<tr><td><?php echo $row['status']; ?></td><td><?php echo $row['count']; ?></td></tr>
<?php } ?>
</table>

<h3>Booking Summary (Room-wise)</h3>
<table border="1" cellpadding="10">
<tr><th>Room No</th><th>Total Bookings</th></tr>
<?php while($row = mysqli_fetch_assoc($bookingSummary)) { ?>
<tr><td><?php echo $row['room_no']; ?></td><td><?php echo $row['total_bookings']; ?></td></tr>
<?php } ?>
</table>

<button onclick="exportCSV()">Export CSV</button>
<button onclick="exportPDF()">Export PDF</button>

</body>
</html>
