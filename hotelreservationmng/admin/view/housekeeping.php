<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Housekeeping Management</title>
  <link rel="stylesheet" href="housekeeping.css">
</head>
<body>

  <h2>Housekeeping Management</h2>
  

  <table>
    <thead>
      <tr>
        <th>Task</th>
        <th>Assigned To</th>
        <th>Status</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Time Taken</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="taskTableBody">
      <tr>
        <td>Clean Room 101</td>
        <td>Rahim</td>
        <td class="status">Pending</td>
        <td class="start">—</td>
        <td class="end">—</td>
        <td class="time">—</td>
        <td>
          <button type="button" class="startBtn">Start</button>
          <button type="button" class="doneBtn">Mark Done</button>
          <button type="button" class="deleteBtn">Delete</button>
        </td>
      </tr>
    </tbody>
  </table>


  <div>
    <button id="addTaskBtn">Add Task</button>
  </div>

  <div id="addTaskForm">
    <h3>Add New Task</h3>
    <form id="taskForm">
      <label for="task">Task:</label>
      <input type="text" id="task" name="task" placeholder="e.g. Clean Room 303" required>

      <label for="assignedTo">Assigned To:</label>
      <input type="text" id="assignedTo" name="assignedTo" placeholder="Staff name" required>

      <label for="status">Status:</label>
      <select id="status" name="status" required>
        <option value="">----Select status----</option>
        <option value="Pending">Pending</option>
        <option value="In Progress">In Progress</option>
        <option value="Done">Done</option>
      </select>

      <button type="submit">Save Task</button>
    </form>
  </div>

  <script src="housekeeping.js"></script>
</body>
</html>
