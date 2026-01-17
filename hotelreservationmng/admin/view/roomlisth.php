<?php 
include("../controller/roomlist.php");
?>


<!DOCTYPE html>
<html>
<head>
    <title>Room Management</title>
<script src="../js/roomlist.js"></script>


</head>
<div class="mb-3">
    <a href="admindashboardh.php" class="btn btn-primary">Back to Dashboard</a>
</div>

<body>

<h2>Room Management</h2>
<button id="switchmotion" onclick="toggleForm()">Add Room</button>
<div id="addRoomForm" style="display:none;">

    <form method="post" action="roomlisth.php">

    Room No:<input type="text" name="room_no" value="<?php echo $editRoom['room_no'] ?? ''; ?>"><br><br>
Type:<input type="text" name="type" value="<?php echo $editRoom['type'] ?? ''; ?>"><br><br>
Floor:<input type="text" name="floor" value="<?php echo $editRoom['floor'] ?? ''; ?>"><br><br>
View:
    <input type="text" name="view" value="<?php echo $editRoom['view'] ?? ''; ?>"><br><br>
    Status:
<select name="status">
    <option value="" disabled selected>Select Status</option>
    <option value="Available" <?php if(($editRoom['status'] ?? '') === 'Available') echo 'selected'; ?>>Available</option>
    <option value="Occupied" <?php if(($editRoom['status'] ?? '') === 'Occupied') echo 'selected'; ?>>Occupied</option>
    <option value="Cleaning" <?php if(($editRoom['status'] ?? '') === 'Cleaning') echo 'selected'; ?>>Cleaning</option>
    <option value="Maintenance" <?php if(($editRoom['status'] ?? '') === 'Maintenance') echo 'selected'; ?>>Maintenance</option>
</select>
    </select><br><br>

    Price:
    <input type="number" name="price" value="<?php echo $editRoom['price'] ?? ''; ?>"><br><br>

    <?php if ($editRoom): ?>
        <input type="hidden" name="id" value="<?php echo $editRoom['id']; ?>">
        <input type="submit" name="update" value="Update Room">
    <?php else: ?>
        <input type="submit" name="add" value="Add Room">
    <?php endif; ?>
</form>
    </div>

<p style="color:green;"><?php echo $success; ?></p>
<p style="color:red;"><?php echo $error; ?></p>

<hr>

<h2>Available Rooms</h2>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Room No</th>
    <th>Type</th>
    <th>Floor</th>
    <th>View</th>
    <th>Status</th>
    <th>Price</th>
    <th>Action</th>
</tr>

<?php
if ($rooms && mysqli_num_rows($rooms) > 0) {
    while ($row = mysqli_fetch_assoc($rooms)) {
?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['room_no']; ?></td>
    <td><?php echo $row['type']; ?></td>
    <td><?php echo $row['floor']; ?></td>
    <td><?php echo $row['view']; ?></td>
    <td><?php echo $row['status']; ?></td>
    <td><?php echo $row['price']; ?></td>
    <td>
    <a href="roomlisth.php?edit=<?php echo $row['id']; ?>">Edit</a> |
<a href="roomlisth.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>

    </td>
</tr>
<?php
    }
} else {
    echo "<tr><td colspan='8'>No rooms found.</td></tr>";
}
?>
</table>

</body>
</html>
