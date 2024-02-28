<?php
include 'db_connection.php';
error_reporting(0);

// Retrieve the user from the URL parameter
$user1 = $_GET['user'];
$user2 = $_GET['work_type'];
$user3 = $_GET['description'];
$user4 = $_GET['location'];
$user5 = $_GET['images'];
$user6= $_GET['file'];
$user7= $_GET['contact'];

// Retrieve details of the user from the database
//$sql = "SELECT * FROM sentbox WHERE user = '$user1'";
//$result = $conn->query($sql);

//if ($result->num_rows > 0) {
    // Output data of the user
  //  $row = $result->fetch_assoc();
        echo "User= " . $user1. "<br>";
        echo "img= " . $user4. "<br>";

        /*echo "work_type: " . $user2. "<br>";
        echo "description: " . $user3. "<br>";
        echo "location: " . $user4. "<br>";
        echo "image: " . $user5. "<br>";
        echo "file: " . $user6. "<br>";
        echo "contact: " . $user7. "<br>";*/
       
    
//} else {
  //  echo "User not found";
//}

// Close connection
$conn->close();
?>