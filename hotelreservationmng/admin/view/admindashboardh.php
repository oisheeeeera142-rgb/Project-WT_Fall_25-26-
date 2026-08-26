<!DOCTYPE html>
<html >
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admindashboard.css">
    <script src="admindashboard.js" defer></script>
</head>
<body>

<h1>Admin Dashboard</h1>

<div id="admin"></div>

<div class="buttons">
    <button onclick="location.href='roomlisth.php'">Manage Rooms</button>
    <button onclick="location.href='booking.php'">Booking Management</button>
    <button onclick="location.href='payment.php'">Payment Management</button>
    <button onclick="location.href='housekeeping.php'">Housekeeping Management</button>
    <button onclick="location.href='guestreview.php'">Guest Review Management</button>
    <button onclick="location.href='report.php'">Reports</button>
</div>

<br>
<button onclick="location.href='../controller/logout.php'">Logout</button>

</body>
</html>
