<?php
include 'db_connection.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div{
            width: 500px;
            height: 500px;
        }
    </style>
</head>
<body>
    <div>
    <?php
$sql = "SELECT image_data FROM img";
$result = $conn->query($sql);

// Check if there are rows in the result
if ($result->num_rows > 0) {
    // Output data of the first row
    $row = $result->fetch_assoc();
    // Set the appropriate header for image display
  //  header("Content-type: image/jpeg");
    // Output the image data
    //echo $row["image_data"];
    echo "<img src='data:image/jpeg;base64," . base64_encode($row["image_data"]) . "' width='200px' height='600px' alt='Image'>";

    
} else {
    echo "No image found.";
}

// Close connection
$conn->close();
?>
    </div>
</body>
</html>
