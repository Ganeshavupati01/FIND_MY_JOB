<?php
include 'db_connection.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Account Creation</title>
<link rel="stylesheet" href="log.css">
</head>
<body>
<h3>SIGN UP PAGE</h3>


<form  method="POST" class="signup-form">
  <div class="container">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username" required><br><br>

  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required><br><br>

  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" required><br><br>

  <input type="submit" value="Create Account" class="signup">
  <span>already have an account?<a href="alogin.php">Login</a></span>
</div>
</form>
<?php
// Include database connection

// Get form data
$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];

// Hash password
//$hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

// Insert user data into database
$sql = "INSERT INTO sign_in (username, email, password) VALUES ('$username', '$email', '$pass')";

if ($conn->query($sql) === TRUE) {
  // Redirect to home page or display success message
  header("Location: alogin.php");
  exit();
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
</body>
</html>