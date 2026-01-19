<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" href="login.css">
  <script src="login.js" defer></script>
</head>
<body>
  <div class="login-container">
    <h2>Log In</h2>
    <form action="login.php" method="post" onsubmit="return validateForm()">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" placeholder="Enter username">

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="Enter password">

    <button type="submit">Log In</button>
    </form>
  </div>
</body>
</html>
