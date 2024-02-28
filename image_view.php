<?php
include 'db_connection.php';
error_reporting(0);

// Retrieve the user from the URL parameter
$image = $_GET['image'];


// Retrieve details of the user from the database
//$sql = "SELECT * FROM sentbox WHERE user = '$user1'";
//$result = $conn->query($sql);

//if ($result->num_rows > 0) {
    // Output data of the user
  //  $row = $result->fetch_assoc();
  $imageDataEncoded = base64_encode($image);

  // Display the image using the img tag with the src attribute set to the Base64-encoded string
 // echo "<img src='data:image/jpeg;base64," . $imageDataEncoded . "' alt='Image'>";
  echo "<img src='$image' alt='Image'><br>";
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
