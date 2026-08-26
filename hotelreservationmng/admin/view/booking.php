<?php 
include("../controller/bookingmng.php");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Management</title>
    <script src="../js/booking.js"></script>
</head>
<div class="mb-3">
    <a href="admindashboardh.php" class="btn btn-primary">Back to Dashboard</a>
</div>

<body>

<h2>Booking Management</h2>
<button id="switchmotion" onclick="toggleForm()">Add Booking</button>
<div id="addBookingForm" style="display:none;">

<form method="post" action="booking.php">
    Guest Name:
    <input type="text" name="guest_name" value="<?php echo $editBooking['guest_name'] ?? ''; ?>"><br><br>

    Room:
<select name="room_id">
    <?php
    $rooms = mysqli_query($conn, "SELECT id, room_no, floor FROM rooms");
    while ($room = mysqli_fetch_assoc($rooms)) {
        $selected = (!empty($editBooking) && $editBooking['room_id'] == $room['id']) ? "selected" : "";
        echo "<option value='{$room['id']}' $selected>ID {$room['id']} - Room {$room['room_no']} (Floor {$room['floor']})</option>";
    }
    ?>
</select><br><br>



    Check-in:
    <input type="date" name="checkin" value="<?php echo $editBooking['checkin'] ?? ''; ?>"><br><br>

    Check-out:
    <input type="date" name="checkout" value="<?php echo $editBooking['checkout'] ?? ''; ?>"><br><br>

    Status:
    <select name="status">
        <option value="" disabled <?php echo empty($editBooking['status']) ? 'selected' : ''; ?>>Select Status</option>
        <option value="Confirmed" <?php if(($editBooking['status'] ?? '') === 'Confirmed') echo 'selected'; ?>>Confirmed</option>
        <option value="Cancelled" <?php if(($editBooking['status'] ?? '') === 'Cancelled') echo 'selected'; ?>>Cancelled</option>
        <option value="Completed" <?php if(($editBooking['status'] ?? '') === 'Completed') echo 'selected'; ?>>Completed</option>
    </select><br><br>

    <?php if (!empty($editBooking)): ?>
        <input type="hidden" name="id" value="<?php echo $editBooking['id']; ?>">
        <input type="submit" name="update" value="Update Booking">
    <?php else: ?>
        <input type="submit" name="add" value="Add Booking">
    <?php endif; ?>
</form>
</div>

<p style="color:green;"><?php echo $success; ?></p>
<p style="color:red;"><?php echo $error; ?></p>

<hr>

<h2>All Bookings</h2>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Guest</th>
    <th>Room No</th>
    <th>Check-in</th>
    <th>Check-out</th>
    <th>Status</th>
    <th>Action</th>
    

</tr>

<?php
if ($bookings && mysqli_num_rows($bookings) > 0) {
    while ($row = mysqli_fetch_assoc($bookings)) {
?>
<td><?php echo $row['booking_id']; ?></td>
<td><?php echo $row['guest_name']; ?></td>
<td><?php echo $row['room_no']; ?></td>
<td><?php echo $row['checkin']; ?></td>
<td><?php echo $row['checkout']; ?></td>
<td><?php echo $row['status']; ?></td>
<td>
    <a href="booking.php?edit=<?php echo $row['booking_id']; ?>">Edit</a> |
    <a href="booking.php?delete=<?php echo $row['booking_id']; ?>" onclick="return confirmDelete()">Delete</a>
</td>


    </td>
</tr>
<?php
    }
} else {
    echo "<tr><td colspan='7'>No bookings found.</td></tr>";
}
?>
</table>

</body>
</html>
