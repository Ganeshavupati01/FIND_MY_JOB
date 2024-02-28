

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <?php
include 'db_connection.php';
error_reporting(0);
session_start();
  if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
  }

// Get the user from the URL query parameter
$user0 = $_GET['work_provider'];

$user1 = $_GET['worker'];
$user2 = $_GET['work_type'];
$user3 = $_GET['description'];
$user4 = $_GET['location'];
$user5 = $_GET['contact'];
$user6 = $_GET['prize'];





// Retrieve detailed information based on the user
//$sql = "SELECT * FROM sentbox WHERE user = '$user'";
//$result = $conn->query($sql);

//if ($result->num_rows > 0) {
    // Output detailed information
  //  $row = $result->fetch_assoc();
  echo "<p><strong>work_provider :</strong> " . $user0 . "</p>";
        echo "<p><strong>worker : </strong>" . $user1 . "</p>";
        echo "<p><strong>Work Type:</strong> " . $user2 . "</p>";
        echo "<p><strong>Description:</strong> " . $user3 . "</p>";
        echo "<p><strong>Location:</strong> " . $user4 . "</p>";
        echo "<p><strong>Contact:</strong> " . $user5 . "</p>";
        echo "<p><strong>ESTIMATED-PRIZE:</strong> " . $user6 . "</p>";

        echo "<p><strong>Image:</strong> </p>";

        $sql = "SELECT images FROM sentbox where user='$user1' and work_type='$user2' and description='$user3' and location='$user4' and contact='$user5'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {

            $row = $result->fetch_assoc();

            echo "<img src='data:image/jpeg;base64," . base64_encode($row["images"]) . "' width='200px' height='200px' alt='Image'>";
        
            
        } else {
            echo "No image found.";
        }
    //}
 //else {
   // echo "<p>No details found for this user</p>";
//}

// Close connection
//$conn->close();

?>
    </div>
    <center>
        <form method="POST">
            <input type="submit" value="completed" name="submit">
        </form>
    </center>

    <?php

if(isset($_POST["submit"])) {


    // Get the user from the URL query parameter
    
    

        //session_start();
        //$from_user = $_SESSION['username'];
        $pri=$_POST['prize'];
    
    
       //$sql = "DELETE FROM sentbox WHERE work_provider='$user0' and worker='$user1' and work_type='$user2' and description='$user3' and location='$user4' and contact='$user5'";
        $sql = "UPDATE accept SET work_status ='completed'  WHERE work_provider='$user0' and worker='$user1' and work_type='$user2' and description='$user3' and location='$user4' and contact='$user5' and prize='$user6'";

        if ($conn->query($sql) === TRUE) {
            echo " row updated successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        
    //echo"not";
}
    $conn->close();

    ?>
</body>
</html>
