<!DOCTYPE html>
<html>

<head>
    <title>Room Management</title>
    <link rel="stylesheet" href="roomlist.css">
</head>

<body>

    <h2>Room Management</h2>

    <table>
        <thead>
            <tr>
                <th>Room Number</th>
                <th>Floor</th>
                <th>View</th>
                <th>Type</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody id="roomTableBody">
            <tr>
                <td>101</td>
                <td>1</td>
                <td>Sea View</td>
                <td>Deluxe</td>
                <td>Available</td>
                <td>

                    <button type="button" class="editBtn" data-room="101">Edit</button>
                    <button type="button" class="deleteBtn">Delete</button>
                </td>
            </tr>

            <tr>
                <td>202</td>
                <td>2</td>
                <td>Garden View</td>
                <td>Standard</td>
                <td>Occupied</td>
                <td>

                    <button type="button" class="editBtn" data-room="202">Edit</button>
                    <button type="button" class="deleteBtn">Delete</button>
                </td>
            </tr>

            <tr>
                <td>302</td>
                <td>3</td>
                <td>Hill View</td>
                <td>Balcony</td>
                <td>Cleaning</td>
                <td>
                    <button type="button" class="editBtn" data-room="302">Edit</button>
                    <button type="button" class="deleteBtn">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>

    <div id="addRoomForm" style="display:none;">
        <h3>Add New Room</h3>
        <form method="POST" action="Manage -Rooms.php">
            <label>Room Number:</label>
            <input type="text" name="roomNumber" />

            <label>Floor:</label>
            <input type="text" name="floor" />

            <label>View:</label>
            <input type="text" id="view" />

            <label>Type:</label>
            <input type="text" id="type" />

            <label>Status:</label>
            <select name="status" required>
                <option value="">----Select status----</option>
                <option value="Available">Available</option>
                <option value="Occupied">Occupied</option>
                <option value="Cleaning">Cleaning</option>
                <option value="Maintenance">Maintenance</option>
            </select>

            <button type="submit">Save Room</button>
        </form>
    </div>
    <button id="switchmotion" onclick="toggleForm()">Add Room</button>

    <script src="Manage -Rooms.js"></script>
</body>

</html>