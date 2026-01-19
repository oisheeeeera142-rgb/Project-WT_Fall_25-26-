

<!DOCTYPE html>
<html>
<head>
<title>Login - Hotel Reservation</title>
<link rel="stylesheet" href="../css/login.css">
</head>
<body>
<h2>Login</h2>
<form action="../controller/login.php" method="post" onsubmit="return validateForm();">
<label>Email:</label>
<input type="email" name="email" required><br>
<label>Password:</label>
<input type="password" name="password" required><br>
<label>Role:</label>
<select name="role" required>
<option value="">--Select Role--</option>
<option value="Guest">Guest</option>
<option value="Admin">Admin</option>
</select><br>
<button type="submit">Login</button>
</form>

</body>
</html>
