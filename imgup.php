<?php
include 'db_connection.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
</head>
<body>
    <h1>Upload Image</h1>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="image" id="image">
        <input type="submit" value="Upload Image" name="submit">
    </form>
    <?php
    if(isset($_POST["submit"])) {
        // Get file details
        $fileName = $_FILES['image']['name'];
        $fileType = $_FILES['image']['type'];
        $fileTmpName = $_FILES['image']['tmp_name'];
        $fileError = $_FILES['image']['error'];
        $fileSize = $_FILES['image']['size'];
    
        // Check if file is selected and no errors occurred
        if($fileError === 0) {
            // Read file content
            $imageData = file_get_contents($fileTmpName);
            // Escape special characters in file content
            $escapedImageData = $conn->real_escape_string($imageData);
    
            // Insert image data into database
            $sql = "INSERT INTO img(image_name, image_data) VALUES ('$fileName', '$escapedImageData')";
            if ($conn->query($sql) === TRUE) {
                echo "Image uploaded successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error uploading file.";
        }
    }
    
    // Close connection
    $conn->close();
    ?>
</body>
</html>
