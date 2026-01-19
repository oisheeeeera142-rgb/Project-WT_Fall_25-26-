<!DOCTYPE>
<html>
<head>
<title>Register - Hotel Reservation</title>
<link rel="stylesheet" href="reg.Css">
<script src="../reg.js"></script>
</head>
<body>
<div>
<h2> Registration</h2>
<form action="../Controller/reg.php" method="post" onsubmit="return validateForm();">
<label>Name:</label>
<input type="text" name="name" required><br>
<label>Email:</label>
<input type="email" name="email" required><br>
<label>Password:</label>
<input type="password" name="password" required><br>
<label>Role:</label>
<select name="role" required>
<option value="">--role--</option>
<option value="Guest">Guest</option>
<option value="Admin">Admin</option>
</select><br>
<button type="submit">Register</button>
</form>
</div>
</body>
</html>