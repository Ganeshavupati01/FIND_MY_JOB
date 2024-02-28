<?php
// Include database connection
include 'db_connection.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Login</title>
<link rel="stylesheet" href="log.css">
</head>
<body>

<h3>User Login</h3>

<form class="signup-form" method="POST">
  <div class="container">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username" required><br><br>

  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" required><br><br>

  <input type="submit" value="Login" class="signup">
  <span>don't have an account?<a href="signup.php">Sign-up</a></span>
</div>
</form>
<?php
// Include database connection
//include 'db_connection.php';

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];
//$hpassword=password_hash($password, PASSWORD_DEFAULT);
// Retrieve user data from database
$sql = "SELECT * FROM sign_in WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // User found, verify password
  $row = $result->fetch_assoc();
  if ($password== $row['password']) {
    // Start session and store username
    session_start();
    $_SESSION['username'] = $username;
    // Redirect to home page
    header("Location: homee.html");
    exit();
  } else {
    // Incorrect password
    echo "Incorrect password. <a href='alogin.php'>Try again</a>";
  }
} else {
  // User not found
  echo "<a href='signup.php'></a>";
}

$conn->close();
?>
</body>
</html>