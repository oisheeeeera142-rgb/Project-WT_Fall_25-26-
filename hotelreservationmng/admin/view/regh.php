<!DOCTYPE html>
<html>
<head>
    <title>Register - Hotel Reservation</title>
    <link rel="stylesheet" href="reg.css">
    <script src="../js/reg.js" defer></script>
</head>
<body>
<div>
    <h2>Registration</h2>
    <form id="regForm">
    <label>Name:</label>
    <input type="text" id="name" name="name"><br>
    <label>Email:</label>
    <input type="email" id="email" name="email"><br>
    <label>Password:</label>
    <input type="password" id="password" name="password"><br>
        <label>Role:</label>
        <select id="role" name="role">
<option value="">--role--</option>
            <option value="Guest">Guest</option>
            <option value="Admin">Admin</option>
        </select><br>
        <button type="submit">Register</button>
    </form>
    <div id="msgBox" style="display:none;"></div>
</div>
</body>
</html>
