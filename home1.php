<?php
    include 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home Page</title>
</head>
<body>

<h2>Welcome to the Home Page</h2>

<div id="userDetails">
  <?php
  // Start session to retrieve username
  session_start();
  if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    // Include database connection
    // Retrieve user account details from database
    $sql = "SELECT username, email FROM sign_in WHERE username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // Output user account details
      $row = $result->fetch_assoc();
      echo "<p>Username: " . $row["username"]. "</p><p>Email: " . $row["email"]. "</p>";
    } else {
      echo "User details not found.";
    }
    $conn->close();
  } else {
    echo "You are not logged in.";
  }
  ?>
</div>

</body>
</html>