<?php 
include("../controller/housekeeping.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Housekeeping Management</title>
    <script src="../js/housekeeping.js"></script>
</head>
<div class="mb-3">
    <a href="admindashboardh.php" class="btn btn-primary">Back to Dashboard</a>
</div>

<body>

<h2>Housekeeping Management</h2>
<button id="switchmotion" onclick="toggleForm()">Add Task</button>
<div id="addTaskForm" style="display:none;">

<form method="post" action="housekeepingView.php">
    Room ID:
    <input type="text" name="room_id" value="<?php echo $editTask['room_id'] ?? ''; ?>"><br><br>

    Task:
    <input type="text" name="task" value="<?php echo $editTask['task'] ?? ''; ?>"><br><br>

    Assign To:
    <input type="text" name="assigned_to" value="<?php echo $editTask['assigned_to'] ?? ''; ?>"><br><br>

    Status:
    <select name="status">
        <option value="" disabled <?php echo empty($editTask['status']) ? 'selected' : ''; ?>>Select Status</option>
        <option value="Pending" <?php if(($editTask['status'] ?? '') === 'Pending') echo 'selected'; ?>>Pending</option>
        <option value="InProgress" <?php if(($editTask['status'] ?? '') === 'InProgress') echo 'selected'; ?>>In Progress</option>
        <option value="Done" <?php if(($editTask['status'] ?? '') === 'Done') echo 'selected'; ?>>Done</option>
    </select><br><br>

    <?php if (!empty($editTask)): ?>
        <input type="hidden" name="id" value="<?php echo $editTask['id']; ?>">
        <input type="submit" name="update" value="Update Task">
    <?php else: ?>
        <input type="submit" name="add" value="Add Task">
    <?php endif; ?>
</form>
</div>

<p style="color:green;"><?php echo $success; ?></p>
<p style="color:red;"><?php echo $error; ?></p>

<hr>

<h2>All Housekeeping Tasks</h2>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Room</th>
    <th>Task</th>
    <th>Assigned To</th>
    <th>Status</th>
    <th>Start Time</th>
    <th>End Time</th>
    <th>Action</th>
</tr>

<?php
if ($tasks && mysqli_num_rows($tasks) > 0) {
    while ($row = mysqli_fetch_assoc($tasks)) {
?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['room_id']; ?></td>
    <td><?php echo $row['task']; ?></td>
    <td><?php echo $row['assigned_to']; ?></td>
    <td><?php echo $row['status']; ?></td>
    <td><?php echo $row['start_time']; ?></td>
    <td><?php echo $row['end_time']; ?></td>
    <td>
        <a href="housekeeping.php?edit=<?php echo $row['id']; ?>">Edit</a> |
        <a href="housekeeping.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this task?')">Delete</a>
    </td>
</tr>
<?php
    }
} else {
    echo "<tr><td colspan='8'>No tasks found.</td></tr>";
}
?>
</table>

</body>
</html>
